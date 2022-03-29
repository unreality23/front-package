<div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

    <!-- Profile dropdown -->
    <div class="ml-3 relative">
        <div>
            <button type="button" id="shoppingBasket"
                    class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2
                    focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                    id="user-menu-button"
                    aria-expanded="false"
                    aria-haspopup="true">
                <i class="fas fa-shopping-basket text-white"></i>
            </button>
        </div>

        @if (Route::has('login'))
            <div class="hidden fixed top-0 px-6 pl-0 ml-6 py-5 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="text-sm text-white underline cursor-pointer">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-sm text-gray-700 underline cursor-pointer">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="ml-4 text-sm text-gray-700 underline cursor-pointer">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        @endif

    </div>
</div>

