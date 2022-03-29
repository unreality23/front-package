<?php

namespace VetNext\Front\Services;

use VetNext\Front\Models\Product;

class SessionService
{
    public function index()
    {
        return view('vetuk::pages.entry', ['products' => Product::query()->get()]);
    }
}
