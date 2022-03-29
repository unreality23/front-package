<?php

namespace VetNext\Front\Tests\Feature;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use VetNext\Front\Tests\TestCase;

/**
 * Class IndexPageTest
 * @package VetNext\Front\Tests\Feature
 */
class IndexPageTest extends TestCase
{
    use InteractsWithViews;

    /**
     * A Test to check if the view can be rendered
     * @group ViewCanBeRendered
     * @returns void
     */
    public function test_a_index_view_has_title()
    {
        $view = $this->view('vetuk::pages.homepage.home', ['title' => 'VetUk - Homepage']);

        $view->assertSee('VetUk - Homepage');
    }

    /**
     * A Test to text/elements are on [Page-Name]
     * @group AssertSees
     */

    public function test_assert_index_has_main()
    {
        $view = $this->blade(
            '<x-vetuk::base.main />'
        );

        $view->assertSee('main');
    }
}
