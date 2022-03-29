<?php

Route::group(['namespace'=>'VetNext\Front\Http\Controllers'], function () {
    Route::get('products', 'ProductController@filterProduct')->name('products');
    Route::get('product/{productId}', 'ProductController@index');
    Route::get('basket', 'ProductController@basket')->name('basket');
    Route::get('checkout', 'ProductController@checkout')->name('checkout');
    Route::post('prescription-upload', 'CheckoutController@uploadPrescription');
    Route::get('checkout-confirmation', 'CheckoutController@checkout_confirmation')->name('checkoutConfirmation');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('login', 'SessionController@index')->name('login');
    Route::get('register', 'RegistrationController@index')->name('register');

    Route::post('account/addaddress', 'AccountController@addaddress')->name('addaddress');
    Route::get('account/getaddress', 'AccountController@getaddress')->name('getaddress');
    Route::post('account/deletebillingaddress', 'AccountController@deletebillingaddress')->name('deletebillingaddress');

    Route::post('account/adddeliveryaddress', 'AccountController@adddeliveryaddress')->name('adddeliveryaddress');
    Route::get('account/getdeliveryaddress', 'AccountController@getdeladdress')->name('getdeladdress');
    Route::post('account/deletedeliveryaddress', 'AccountController@deletedeliveryaddress')->name('deletedeliveryaddress');

    Route::post('account/adddanimal', 'AccountController@adddanimal')->name('adddanimal');
    Route::get('account/getanimal', 'AccountController@getanimal')->name('getanimal');
    Route::post('account/deletepetfromthelist/{petId}', 'AccountController@deletePetFromTheList')->name('deletepetfromthelist');

    Route::get('account', 'AccountController@index')->name('account');

    Route::get('wishlist', 'WishlistController@index')->name('wishlist');

    Route::get('{category}', 'ContentPageController@index')->name('category');
});
