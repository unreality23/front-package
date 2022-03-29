@extends('vetuk::layouts.base')

@section('title', 'VetUk Basket')

@section('main')
    <div id="basketApp">
        <x-vetuk::basket_checkout.basket />
    </div>
@endsection




