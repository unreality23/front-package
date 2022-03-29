<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="author" content=""/>
<meta name="csrf-token" content="{{ csrf_token() }}">

@if(Auth::check())
    <meta name="user-id" content="{{ Auth::user()->id }}">
@endif
@isset($products)
    <meta name="description" content=""/>
@endisset
@isset($content)
    <meta name="title" content="{{ $content->title }}"/>
    <meta name="description" content="{{ $content->description }}"/>
@endisset
