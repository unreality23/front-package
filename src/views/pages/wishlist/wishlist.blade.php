@extends('vetuk::layouts.base')

@section('main')
    <h1 class="text-4xl font-bold  mx-auto block text-center mt-5 mb-10">Wishlist</h1>

    <div class="flex flex-wrap flex-grow  w-full">
        @foreach ($wishlists as $wishlist)
            <div class="flex flex-col md:w-6/12 lg:w-1/5 p-2 mb-10 xsm:w-full text-center
            border border-transparent group hover:border-gray-300 hover:bg-gray-200 transition-all">
                <a href="/product/{{$wishlist->product->id}}">
                    <div class="mx-auto bg-white p-9 border relative">
                        <img src="/img/product_image.jpg"
                             alt="{{$wishlist->product->title}}">
                    </div>
                </a>
                <div class="mt-5">{{$wishlist->product->title}}</div>
                <div class="font-bold">£{{$wishlist->product->price}}</div>
                    <a href="#"
                       data-id="{{$wishlist->id}}"
                       class="removeFromWishlist bg-red-600 transition
                       hover:bg-red-800 text-white p-2 my-2 block w-2/4 mx-auto">Remove from Wishlist</a>
            </div>
        @endforeach
    </div>

@endsection

