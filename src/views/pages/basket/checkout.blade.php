@extends('vetuk::layouts.base')

@section('title', 'VetUk')

@section('main')
    <div id="basketApp">
        <x-vetuk::basket_checkout.checkout />
    </div>
@endsection






