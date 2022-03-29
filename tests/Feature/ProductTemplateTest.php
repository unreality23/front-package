<?php

namespace VetNext\Front\Tests\Feature;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use VetNext\Front\Tests\TestCase;
use Illuminate\Http\Request;
use VetNext\Front\Models\ContentPage;
use App\Models\User;

class ProductTemplateTest extends TestCase
{
    use RefreshDatabase;
    use InteractsWithViews;

    /**
     * A Test to text/elements are included in the base template
     * @group ContentTemplateTests
     * @group AssertSees
     */

    public function test_assert_products_collection_template_info()
    {
//        $content =  (object)[
//            'content' => 'content test',
//            'title' => 'test title'
//        ];


        $view = $this->view(
            'vetuk::pages.product.collection.collection_category_info'
        );

        $view
            ->assertSee('product_category_title')
            ->assertSee('product_category_description');
    }

    /**
     * A Test to text/elements are included in the base template
     * @group ContentTemplateTests
     * @group AssertSees
     */

    public function test_assert_products_collection_template_filter()
    {
        $view = $this->view(
            'vetuk::pages.product.collection.collection_filter'
        );

        $view
            ->assertSee('product_filter')
            ->assertSee('priceClick')
            ->assertSee('root_title')
            ->assertSee('root_link')
            ->assertSee('categoryClick')
            ->assertSee('Category')
            ->assertSee('sizeClick')
            ->assertSee('Size');
    }

    /**
     * A Test to text/elements are included in the base template
     * @group ContentTemplateTests
     * @group AssertSees
     */

    public function test_assert_products_collection_template_breadcrumb()
    {
        $view = $this->view(
            'vetuk::pages.product.collection.collection_options.collection_breadcrumb'
        );

        $view
            ->assertSee('product_collection_breadcrumb');
    }


    /**
     * A Test to text/elements are included in the base template
     * @group ContentTemplateTests
     * @group AssertSees
     */

    public function test_assert_products_collection_template_sort()
    {
        $view = $this->view(
            'vetuk::pages.product.collection.collection_options.collection_sort'
        );

        $view
            ->assertSee('product_collection_sort')
            ->assertSee('SortingOn')
            ->assertSee('SortingHidden')
            ->assertSee('sortBy');
    }

    /**
     * A Test to text/elements are included in the base template
     * @group ContentTemplateTests
     * @group AssertSees
     */

    public function test_assert_products_single_main()
    {
        $view = $this->view(
            'vetuk::pages.product.single.single_product_details.single_main_details'
        );

        $view
            ->assertSee('mainDetails')
            ->assertSee('YoutubeVideo')
            ->assertSee('hashtagTitle')
            ->assertSee('mainDetailsSlider')
            ->assertSee('prev-next-button')
            ->assertSee('prev-next-button');
    }

    /**
     * A Test to text/elements are included in the base template
     * @group ContentTemplateTests
     * @group AssertSees
     */

    public function test_assert_products_single_instructions()
    {
        $view = $this->view(
            'vetuk::pages.product.single.single_product_details.single_product_care_instructions'
        );

        $view
            ->assertSee('product_care')
            ->assertSee('productInfoTitle');
    }


    /**
     * A Test to text/elements are included in the base template
     * @group ContentTemplateTests
     * @group AssertSees
     */

    public function test_assert_products_single_description()
    {
        $view = $this->view(
            'vetuk::pages.product.single.single_product_details.single_product_description'
        );

        $view
            ->assertSee('product_description')
            ->assertSee('productInfoTitle')
            ->assertSee('productInfoList');
    }



    /**
     * A Test to text/elements are included in the base template
     * @group ContentTemplateTests
     * @group AssertSees
     */

    public function test_assert_products_single_features()
    {
        $view = $this->view(
            'vetuk::pages.product.single.single_product_details.single_product_features'
        );

        $view
            ->assertSee('product_features')
            ->assertSee('productInfoTitle')
            ->assertSee('productInfoListDots');
    }

    /**
     * A Test to text/elements are included in the base template
     * @group ContentTemplateTests
     * @group AssertSees
     */

    public function test_assert_products_single_specification()
    {
        $view = $this->view(
            'vetuk::pages.product.single.single_product_details.single_product_specification'
        );

        $view
            ->assertSee('product_specification')
            ->assertSee('productInfoTitle')
            ->assertSee('productInfoList');
    }

    /**
     * A Test to text/elements are included in the base template
     * @group ContentTemplateTests
     * @group AssertSees
     */

//    public function test_assert_products_single()
//    {
//
//
//
//        $view = $this->view(
//            'vetuk::pages.product.single.');
//
//        $view
//            ->assertSee('product_collection_sort')
//            ->assertSee('SortingOn')
//            ->assertSee('SortingHidden')
//            ->assertSee('sortBy');
//
//    }
}
