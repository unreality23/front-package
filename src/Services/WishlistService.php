<?php

namespace VetNext\Front\Services;

use VetNext\Front\Models\Product;

class WishlistService
{
    public function index()
    {
        return view('vetuk::wishlist.wishlist', ['products' => Product::query()->get()]);
    }
}
