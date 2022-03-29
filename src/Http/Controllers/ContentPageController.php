<?php

namespace VetNext\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use VetNext\Front\Services\ContentService;

use Illuminate\Http\Request;

class ContentPageController extends Controller
{
    public function __construct(protected ContentService $contentService)
    {
    }

    /**
     * Opens up a page by retrieving page name from DB
     *
     */
    public function index(Request $request, $category)
    {
        return $this->contentService->index($request, $category);
    }

    public function show()
    {
        return view('vetuk::layouts.base');
    }
}
