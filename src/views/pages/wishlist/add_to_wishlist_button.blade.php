<div id="addToWishlist"
     class="rounded text-center p-4 w-full block bg-black text-white transition-all cursor-pointer hover:bg-gray-600">
{{--    <add-wishlist :product="{{ json_encode($product) }}"/>--}}
    <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
        {{csrf_field()}}
        <input name="user_id" type="text" value="{{Auth::user()->id}}" />
        <input name="product_id" type="text" value="{{$product->id}}" />
    </form>
</div>
