<?php

namespace VetNext\Front\Services;

use Illuminate\Http\Request;
use VetNext\Front\Models\ContentPage;
use VetNext\Front\Models\Product;

class ContentService
{
    public function index(Request $request, $category)
    {
        return view('vetuk::pages.content.content', ['content' => ContentPage::where('category', $category)->firstOrFail()]);
    }
}
