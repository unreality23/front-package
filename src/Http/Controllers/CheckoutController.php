<?php

namespace VetNext\Front\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use VetNext\Front\Services\CheckoutService;

class CheckoutController extends Controller
{
    public function __construct(protected CheckoutService $checkoutService)
    {
    }

    public function index($productId)
    {
        return $this->checkoutService->index($productId);
    }

    /**
     * Basket page
     *
     */
    public function basket()
    {
        return $this->checkoutService->basket();
    }

    /**
     * Checkout page
     *
     */
    public function checkout()
    {
        return $this->checkoutService->checkout();
    }

    /**
     * Confirming all details are filled
     *
     */
    public function paymentConfirmation(Request $request)
    {
        $this->validate($request, [
            'forename' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'country' => 'required',
            'county' => 'required',
            'telephone' => 'required',
            'shipping' => 'required',
            'payment' => 'required',


        ]);

        return $this->checkoutService->paymentConfirmation($request);
    }

    /**
     * Upload prescription in jpg,png,jpeg,pdf formats
     *
     */

    public function uploadPrescription(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:jpg,png,jpeg,pdf|max:5120',
        ]);

        return $request->file('file')->store('public');
    }

    /**
     * Checkout confirmation page
     *
     */

    public function checkout_confirmation()
    {
        return view('vetuk::checkout_confirmation');
    }

    public function show()
    {
    }
}
