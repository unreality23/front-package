<!-- Language Navigation -->
@include('vetuk::components.language_selector.select_language')
<!-- Navigation -->
<nav class="bg-black">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            @include('vetuk::components.base.navigation.navigation_hamburger')
            @include('vetuk::components.base.navigation.navigation_menu')
            @include('vetuk::components.base.navigation.basket.basket')
        </div>
    </div>
    @include('vetuk::components.base.navigation.navigation_menu_mobile')


</nav>

