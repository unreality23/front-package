@extends('vetuk::layouts.base')

@section('title', 'VetUk')

@section('main')
    <x-vetuk::base.products  :product="$product" />
@endsection


