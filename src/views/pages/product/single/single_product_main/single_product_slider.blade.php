<div id="productImages" class="flex relative w-full md:w-4/5 overflow-hidden h-1/3">
    <div id="imageHolder" class="flex flex-col w-2/12  mr-3 relative hidden lg:block">
        <div class="slider">

            <img src="{{ asset('img/product_image.jpg') }}" alt="image 1"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_2.jpg') }}" alt="image 2"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_3.jpg') }}" alt="image 3"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_4.jpg') }}" alt="image 4"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_5.jpg') }}" alt="image 5"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_6.jpg') }}" alt="image 6"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_7.jpg') }}" alt="image 7"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_8.jpg') }}" alt="image 8"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_9.jpg') }}" alt="image 9"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_10.jpg') }}" alt="image 10"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_11.jpg') }}" alt="image 11"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_12.jpg') }}" alt="image 12"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_13.jpg') }}" alt="image 13"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_14.jpg') }}" alt="image 14"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_15.jpg') }}" alt="image 15"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">
            <img src="{{ asset('img/product_image_16.jpg') }}" alt="image 16"
                 class="border-2 border-transparent rounded-md hover:border-gray-300 transition-all my-3 mt-0 cursor-pointer">

        </div>

        <button
            class="up-down-button up absolute transform mx-auto left-1/2 transition-all -translate-x-2/4 text-3xl bg-gray-100 px-2 pb-1 rounded-b hover:bg-gray-200">
            <i class="fas fa-angle-up"></i>
        </button>

        <button
            class="up-down-button down absolute  transform mx-auto left-1/2 transition-all -translate-x-2/4 text-3xl bg-gray-100 px-2 pt-1 rounded-t hover:bg-gray-200 bottom-0">
            <i class="fas fa-angle-down"></i>
        </button>

    </div>
    <div id="imageMainHolder" class="relative w-12/12 lg:w-10/12">
        <div id="mainProductImage" class="slider bg-white rounded-md">
            <img id="ProductImage" src="{{ asset('img/product_image.jpg') }}" alt="product main image"
                 class="border border-transparent hover:border-gray-300 w-full p-5 cursor-pointer">

        </div>
        <button
            class="prev-next-button ml-4 -mt-5 prev absolute transform mx-auto transition-all -translate-y-2/4 text-5xl px-2 pt-1 rounded-t left-0 top-1/2">
            <i class="fas fa-angle-left"></i>
        </button>

        <button
            class="prev-next-button mr-4 -mt-5 next absolute transform mx-auto transition-all -translate-y-2/4 text-5xl px-2 pt-1 rounded-t right-0 top-1/2">
            <i class="fas fa-angle-right"></i>
        </button>
    </div>
</div>
