<?php

namespace VetNext\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use VetNext\Front\Services\RegistrationService;

class RegistrationController extends Controller
{
    public function __construct(protected RegistrationService $registrationService)
    {
    }

    public function index()
    {
        return $this->registrationService->index();
    }

    public function show()
    {
    }
}
