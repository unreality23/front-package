<div class="product_filter flex flex-grow w-2/12">
    <div id="product_filter_menu"
         class="flex flex-col w-full lg:pr-4 overflow-hidden lg:overflow-visible transition-all max-h-0 lg:max-h-0 ease-out">
        <div id="priceClick" class="filter_root flex flex-col w-full mb-4 border-b border-gray-300"
             data-attribute="price" tabindex="1">
            <input type="checkbox" id="menu-Price" class="hidden">
            <label for="menu-Price" id="filter-price" class="root_title font-bold tracking-wide text-lg cursor-pointer"><i
                    class="fas fa-angle-right text-red-500"></i> Price</label>
            <ul id="Price"
                class="root_link py-0 px-2 w-full mt-2 transition-all duration-300 max-h-0 overflow-hidden ease-out">
                <li class="py-0.5"><a href="{{url()->current()}}?minPrice[]=0&maxPrice[]=100"
                                      class="hover:text-red-400 cursor-pointer">£0 - £100</a></li>
                <li class="py-0.5"><a href="{{url()->current()}}?minPrice[]=101&maxPrice[]=200"
                                      class="hover:text-red-400 cursor-pointer">£101 - £200</a></li>
                <li class="py-0.5"><a href="{{url()->current()}}?minPrice[]=201&maxPrice[]=300"
                                      class="hover:text-red-400 cursor-pointer">£201 - £300</a></li>
                <li class="py-0.5"><a href="{{url()->current()}}?minPrice[]=301&maxPrice[]=400"
                                      class="hover:text-red-400 cursor-pointer">£301 - £400</a></li>
                <li class="py-0.5"><a href="{{url()->current()}}?minPrice[]=401&maxPrice[]=402"
                                      class="hover:text-red-400 cursor-pointer">£401 - £402</a></li>
            </ul>
        </div>
        <div id="categoryClick" class="filter_root flex flex-col w-full mb-4 border-b border-gray-300"
             data-attribute="category" tabindex="1">
            <input type="checkbox" id="menu-Category" class="hidden">
            <label for="menu-Category" id="filter-category"
                   class="root_title font-bold tracking-wide text-lg cursor-pointer"><i
                    class="fas fa-angle-right text-red-500"></i> Category</label>
            <ul id="Category"
                class="root_link py-0 px-2 w-full mt-2 transition-all duration-300 max-h-0 overflow-hidden ease-out">
                <li class="py-0.5"><a href="#" class="hover:text-red-400 cursor-pointer">Mens</a></li>
                <li class="py-0.5"><a href="#" class="hover:text-red-400 cursor-pointer">Womens</a></li>
                <li class="py-0.5"><a href="#" class="hover:text-red-400 cursor-pointer">Unisex</a></li>
            </ul>
        </div>
        <div id="sizeClick" class="filter_root flex flex-col w-full mb-4 border-b border-gray-300" data-attribute="size"
             tabindex="1">
            <input type="checkbox" id="menu-Size" class="hidden">
            <label for="menu-Size" id="filter-size" class="root_title font-bold tracking-wide text-lg cursor-pointer"><i
                    class="fas fa-angle-right text-red-500"></i> Size</label>
            <ul id="Size"
                class="root_link py-0 px-2 w-full mt-2 transition-all duration-300 max-h-0 overflow-hidden ease-out">
                <li class="py-0.5"><a href="#" class="hover:text-red-400 cursor-pointer">XXXS</a></li>
                <li class="py-0.5"><a href="#" class="hover:text-red-400 cursor-pointer">XXS</a></li>
                <li class="py-0.5"><a href="#" class="hover:text-red-400 cursor-pointer">XS</a></li>
                <li class="py-0.5"><a href="#" class="hover:text-red-400 cursor-pointer">S</a></li>
                <li class="py-0.5"><a href="#" class="hover:text-red-400 cursor-pointer">M</a></li>
                <li class="py-0.5"><a href="#" class="hover:text-red-400 cursor-pointer">L</a></li>
                <li class="py-0.5"><a href="#" class="hover:text-red-400 cursor-pointer">XL</a></li>
                <li class="py-0.5"><a href="#" class="hover:text-red-400 cursor-pointer">XXL</a></li>
            </ul>
        </div>
    </div>

</div>
