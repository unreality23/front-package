<div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
    <!-- Mobile menu button-->
    <button type="button" id="menuHamburgerOpen"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
            aria-controls="mobile-menu" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <!--
          Icon when menu is closed.

          Heroicon name: outline/menu

          Menu open: "hidden", Menu closed: "block"
        -->

        <span id="menuHamburger" class="block h-6 w-6" aria-hidden="true">
           <i class="fas fa-bars"></i>
        </span>
        <!--
          Icon when menu is open.

          Heroicon name: outline/x

          Menu open: "block", Menu closed: "hidden"
        -->
        <span id="menuHamburgerClose" class="hidden h-6 w-6" aria-hidden="true">
            <i class="fas fa-times"></i>
        </span>
    </button>
</div>
