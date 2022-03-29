<?php
namespace VetNext\Front\Tests\Feature;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use VetNext\Front\Tests\TestCase;

/**
 * Class BaseTemplateTest
 * @package VetNext\Front\Tests\Feature
 */

class BaseTemplateTest extends TestCase
{
    use InteractsWithViews;

    /** Test for the index page
    - Test for Logo
    - Test for Menu
    - Test for Shopping cart
    - Test for testimonials
    - Test for Footer



      /**
       * A Test to see what text/elements are included in the base template
       * @group BaseTemplateTests
       * @group AssertSees
       */

    public function test_assert_base_template_has_logo()
    {
        if (file_exists('src/resources/img/VetUK-15-Year-Logo.jpg')) {
            $view = $this->view('vetuk::components.base.header', ['logo' => 'VetUK-15-Year-Logo.jpg']);
            $view->assertSee('VetUK-15-Year-Logo.jpg');
        } else {
            dd('File does not exist');
        }
    }

    /**
     * A Test to text/elements are included in the base template
     * @group BaseTemplateTests
     * @group AssertSees
     */

    public function test_assert_base_template_has_header()
    {
        $view = $this->blade(
            '<x-vetuk::base.navigation.navigation />'
        );

        $view->assertSee('About Vetuk');
    }

    /**
     * A Test to text/elements are included in the base template
     * @group BaseTemplateTests
     * @group AssertSees
     */

    public function test_assert_base_template_has_shopping_cart()
    {
        $view = $this->view(
            'vetuk::layouts.base'
        );

        $view->assertSee('basketpopup');
    }

    /**
     * A Test to text/elements are included in the base template
     * @group BaseTemplateTests
     * @group AssertSees
     */

    public function test_assert_base_template_has_testimonials()
    {
        $view = $this->view(
            'vetuk::pages.homepage.homepage',
            ['section_name' => 'What our customers are saying:']
        );

        $view->assertSee('What our customers are saying:');
    }

    /**
     * A Test to text/elements are included in the base template
     * @group BaseTemplateTests
     * @group AssertSees
     */

    public function test_assert_base_template_has_footer()
    {
        $view = $this->blade(
            '<x-vetuk::base.footer.footer />',
            ['copyright' => 'VetUK']
        );

        $view->assertSee('VetUK');
    }
}
