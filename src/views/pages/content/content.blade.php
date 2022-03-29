@extends('vetuk::layouts.base')

@section('title', $content->title)


@section('main')
    <x-vetuk::content_pages.content_main :content="$content"/>
@endsection
