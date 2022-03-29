<div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
    <a href="/">
        <div class="flex-shrink-0 flex items-center">
            <div class="logo block lg:hidden h-8 w-auto text-white">
                Logo
            </div>
            <div class="logo hidden lg:block h-8 w-1/2 text-white">
                <img src="{{ asset('img/VetUK-15-Year-Logo.jpg') }}" alt="15 years - VetUK">
            </div>
        </div>
    </a>

    <div class="hidden -translate-y-full sm:block sm:ml-6">
        <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/products" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Product Collection</a>

            <a href="/about-vetuk"
               class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About Vetuk</a>

            <a href="/privacy"
               class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Privacy</a>

            @if (Route::has('login'))
                    @auth
                        <a href="/wishlist"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Wishlist</a>

                        @else

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                        @endif

                    @endauth
            @endif

        </div>
    </div>
</div>

