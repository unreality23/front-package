<?php

namespace VetNext\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use VetNext\Front\Models\Account;
use VetNext\Front\Models\BillingAddress;
use VetNext\Front\Models\DeliveryAddress;
use VetNext\Front\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct(protected AccountService $accountService)
    {
    }

    public function index(Request $request)
    {
        return view('vetuk::pages.account.account');
    }

    /**
     * Adding address to account page
     *
     */
    public function addaddress(Request $request)
    {
        $this->validate($request, [
            'forename' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postcode' => 'required',
            'telephone' => 'required'
        ]);

        return $this->accountService->addaddress($request);
    }


    /**
     * Retrieving address from account page
     *
     */
    public function getaddress()
    {
        return $this->accountService->getaddress();
    }


    /**
     * Delete billing address from account page
     *
     */
    public function deletebillingaddress()
    {
        $this->accountService->deletedeliveryaddress();
    }

    /**
     * Add Delivery address from account page
     *
     */
    public function adddeliveryaddress(Request $request)
    {
        $this->validate($request, [
            'forename' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postcode' => 'required',
            'telephone' => 'required'
        ]);

        return $this->accountService->adddeliveryaddress($request);
    }

    /**
     * Delete delivery address from account page
     *
     */

    public function deletedeliveryaddress()
    {
        return $this->accountService->deletedeliveryaddress();
    }


    /**
     * Retrieving delivery address from account page
     *
     */
    public function getdeladdress()
    {
        return $this->accountService->getdeladdress();
    }

    /**
     * Add your pet to your list
     *
     */
    public function adddanimal(Request $request)
    {
        $this->validate($request, [
            'species_type' => 'required',
            'name' => 'required',
            'other_species_type' => 'nullable',
            'weight' => 'nullable',
            'lightest_weight' => 'nullable',
            'heaviest_weight' => 'nullable',
            'date_of_birth' => 'required|date',
            'is_healthy' => 'nullable',
            'is_all_healthy' => 'nullable',
            'on_prescriptions' => 'nullable',
            'any_on_prescriptions' => 'nullable',
            'prescription_details' => 'required',
            'is_lactating' => 'nullable',
            'is_any_lactating' => 'nullable',

        ]);

        return $this->accountService->adddanimal($request);
    }

    /**
     * Retrieving all pets in your list
     *
     */
    public function getanimal()
    {
        return $this->accountService->getanimal();
    }

    /**
     * Remove pet from your list
     *
     */
    public function deletePetFromTheList($petId)
    {
        return $this->accountService->deletePetFromTheList(($petId));
    }


    public function show()
    {
    }
}
