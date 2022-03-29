@if(\Route::is('home'))
    <main class="">
        @include('vetuk::pages.homepage.homepage')
    </main>a
@else

@if(\Route::is('products'))
    @include('vetuk::pages.product.collection.collection_category_info')
@endif
<main class="max-w-screen-xl mx-auto px-3">
    @if(\Route::is('login'))
        @include('vetuk::pages.login.login')
    @endif

    @if(\Route::is('register'))
        @include('vetuk::pages.register.register')
    @endif

    @if(\Route::is('wishlist'))
        @include('vetuk::pages.wishlist.wishlist')
    @endif

    @if(\Route::is('products'))
        @include('vetuk::pages.product.collection.collection_options')f

        <div id="app" class="filtered_products flex flex-wrap py-5 lg:py-20">
            @include('vetuk::pages.product.collection.collection_filter')
            @include('vetuk::pages.product.collection.collection_results')
        </div>
    @endif
</main>

@if(\Route::is('account'))
    <div id="accountPage">
        <account-page/>
    </div>
@endif

@endif








