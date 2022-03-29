<?php

namespace VetNext\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use VetNext\Front\Services\SessionService;

class SessionController extends Controller
{
    public function __construct(protected SessionService $sessionService)
    {
    }

    public function index()
    {
        return $this->sessionService->index();
    }

    public function show()
    {
    }
}
