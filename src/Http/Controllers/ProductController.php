<?php

namespace VetNext\Front\Http\Controllers;

use App\Http\Controllers\Controller;
//use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use VetNext\Front\Models\Product;
use Illuminate\Http\Request;
use VetNext\Front\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService)
    {
    }
    public function index($productId)
    {
        return $this->productService->index($productId);
    }

    /**
     * Sorting products
     *
     */
    public function filterProduct(Request $request)
    {
        return $this->productService->filterProduct($request);
    }

    /**
     * Basket page
     *
     */
    public function basket()
    {
        return $this->productService->basket();
    }

    /**
     * Checkout page
     *
     */
    public function checkout()
    {
        return $this->productService->checkout();
    }

    public function show()
    {
        return view('vetuk::product');
    }
}
