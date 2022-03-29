<?php

namespace VetNext\Front\Services;

use Illuminate\Http\Request;
use VetNext\Front\Models\BillingAddress;
use VetNext\Front\Models\DeliveryAddress;
use VetNext\Front\Models\Pet;

class AccountService
{
    public function deletePetFromTheList($id)
    {
        return response()->json(['message' => Pet::where('id', $id)->delete()]);
    }

    public function getanimal()
    {
        return response()->json(['message' => Pet::all()]);
    }

    public function adddanimal(Request $request)
    {
        $post = Pet::create([
            'species_type' => $request->input('species_type'),
            'name' => $request->input('name'),
            'other_species_type' => $request->input('other_species_type'),
            'weight' => $request->input('weight'),
            'lightest_weight' => $request->input('lightest_weight'),
            'heaviest_weight' => $request->input('heaviest_weight'),
            'date_of_birth' => $request->input('date_of_birth'),
            'is_healthy' => $request->input('is_healthy'),
            'is_all_healthy' => $request->input('is_all_healthy'),
            'on_prescriptions' => $request->input('on_prescriptions'),
            'any_on_prescriptions' => $request->input('any_on_prescriptions'),
            'prescription_details' => $request->input('prescription_details'),
            'is_lactating' => $request->input('is_lactating'),
            'is_any_lactating' => $request->input('is_any_lactating'),
        ]);

        return response()->json([
            'message' => $post
        ]);
    }

    public function deletedeliveryaddress()
    {
        return response()->json([
            'message' => DeliveryAddress::where('id', 1)->delete()
        ]);
    }

    public function getdeladdress()
    {
        return response()->json([
            'message' => DeliveryAddress::where('id', 1)->get()
        ]);
    }

    public function adddeliveryaddress(Request $request)
    {
        $post = DeliveryAddress::create([
            'forename' => $request->input('forename'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'postcode' => $request->input('postcode'),
            'telephone' => $request->input('telephone')
        ]);

        return response()->json([
            'message' => $post
        ]);
    }

    public function getaddress()
    {
        return response()->json([
            'message' => BillingAddress::where('id', 1)->get()
        ]);
    }

    public function deletebillingaddress()
    {
        return response()->json([
            'message' => BillingAddress::where('id', 1)->delete()
        ]);
    }

    public function addaddress(Request $request)
    {
        $post = BillingAddress::create([
            'forename' => $request->input('forename'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'postcode' => $request->input('postcode'),
            'telephone' => $request->input('telephone')
        ]);

        return response()->json([
            'message' => $post
        ]);
    }
}
