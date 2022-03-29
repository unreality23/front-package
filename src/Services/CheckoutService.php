<?php

namespace VetNext\Front\Services;

use Illuminate\Http\Request;
use VetNext\Front\Models\Product;

class CheckoutService
{
    public function index($id)
    {
        return view('vetuk::product', ['product' => Product::findOrFail($id)]);
    }

    public function filterProduct(Request $request)
    {
        $sort = $request->query('sortBy');
        $minPrice = $request->query('minPrice');
        $maxPrice = $request->query('maxPrice');
        $q = Product::query();

        if ($sort) {
            $q->orderBy($sort);
        }
        if ($minPrice && $maxPrice) {
            $q->whereBetween('price', [$minPrice[0], $maxPrice[0]]);
        }

        return view('vetuk::product', ['products' => $q->get()]);
    }

    public function paymentConfirmation(Request $request)
    {
        $post = Payment::create([
            'forename' => $request->input('forename'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'postcode' => $request->input('postcode'),
            'country' => $request->input('country'),
            'county' => $request->input('county'),
            'telephone' => $request->input('telephone'),
            'shipping' => $request->input('shipping'),
            'payment' => $request->input('payment'),
        ]);

        return response()->json([
            'message' => $post
        ]);
    }

    public function basket()
    {
        return view('vetuk::product');
    }

    public function checkout()
    {
        $q = Product::all();
        return view('vetuk::product', ['products' => $q->get()]);
    }
}
