<?php

namespace VetNext\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use VetNext\Front\Services\WishlistService;
use VetNext\Front\Models\Wishlist;
use Illuminate\Http\Request;
use Auth;

class WishlistController extends Controller
{
    public function __construct(protected WishlistService $wishlistService)
    {
        $this->middleware(['auth']);
    }

    /**
     * Get all products in wishlist by correct user
     *
     */
    public function index()
    {
        $user = Auth::user();
        $wishlists = Wishlist::with('product')->
        where('user_id', '=', $user->id)->
        orderby('id', 'desc')->
        paginate(10);
        return view(
            'vetuk::pages.wishlist.wishlist',
            compact('user', 'wishlists')
        );

//        return $this->wishlistService->index();
    }

    /**
     * Add product to wishlist
     *
     */
    public function store(Request $request)
    {
        if (Auth::user()) {
            $product_id = $request->input('product_id');
            $wishlist = new Wishlist;
            $status = Wishlist::where('user_id', Auth::user()->id)
                ->where('product_id', $request->product_id)
                ->first();

            if (isset($status->user_id) and isset($request->product_id)) {
                return response()->json(['status' => 'This item is already in your wishlist!']);
            } else {
                $wishlist->product_id = $product_id;
                $wishlist->user_id = Auth::id();
                $wishlist->save();
                return response()
                    ->json(['status' => 'Product added to Wishlist']);
            }
        } else {
            return response()
                ->json(['status' => 'Login to Add Product into Wishlist']);
        }
    }

    /**
     * Remove product from wishlist page
     *
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $wishlists = Wishlist::with('product')
            ->findOrFail($id);
        $wishlists
            ->delete();

        return response()
            ->json(['status' => 'Product removed from wishlist']);
    }
}
