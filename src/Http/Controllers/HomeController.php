<?php

namespace VetNext\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use VetNext\Front\Models\Product;
use VetNext\Front\Services\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(protected HomeService $homeService)
    {
    }

    /**
     * Homepage view
     *
     */
    public function index()
    {
        return $this->homeService->index();
    }

    public function show()
    {
    }
}
