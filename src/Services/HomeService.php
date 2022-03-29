<?php

namespace VetNext\Front\Services;

use VetNext\Front\Models\Product;

class HomeService
{
    public function index()
    {
        return view('vetuk::pages.homepage.home', ['products' => Product::query()]);
    }
}
