<div id="breadcrumbs_container" class="max-w-screen-xl mx-auto pt-4 pb-2 px-3 text-sm">
    @include('vetuk::pages.product.collection.collection_options.collection_breadcrumb')
</div>

<div id="container" class="flex flex-col max-w-screen-xl mx-auto px-auto px-3">
    <div id="productDetails" class="flex flex-col md:flex-row">
        @include('vetuk::pages.product.single.single_product_main.single_product_slider')

        <div id="productContent" class="flex flex-col w-full md:w-2/5 pl-4 md:pl-10 pt-5 md:pt-0">
            @include('vetuk::pages.product.single.single_product_main.single_product_info')
            @include('vetuk::pages.product.single.single_product_main.add_to_cart')
        </div>

    </div>
    <main class="py-10">
        @include('vetuk::pages.product.single.single_product_details.single_main_details')
        @include('vetuk::pages.product.single.single_product_details.single_product_features')
        @include('vetuk::pages.product.single.single_product_details.single_product_description')
        @include('vetuk::pages.product.single.single_product_details.single_product_specification')
        @include('vetuk::pages.product.single.single_product_details.single_product_care_instructions')
    </main>
</div>
test3
