<?php

namespace VetNext\Front\Services;

use Illuminate\Http\Request;
use VetNext\Front\Models\Product;

class ProductService
{
    public function index($id)
    {
        return view('vetuk::pages.product.index_single', ['product' => Product::findOrFail($id)]);
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

        return view('vetuk::pages.product.index_collection', ['products' => $q->get()]);
    }

    public function basket()
    {
        $q = Product::query();

        return view('vetuk::pages.basket.basket', ['products' => $q->get()]);
    }

    public function checkout()
    {
        $q = Product::query();
        return view('vetuk::pages.basket.checkout', ['products' => $q->get()]);
    }
}
