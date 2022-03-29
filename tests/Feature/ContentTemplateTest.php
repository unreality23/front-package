<?php
namespace VetNext\Front\Tests\Feature;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use VetNext\Front\Tests\TestCase;
use Illuminate\Http\Request;
use VetNext\Front\Models\ContentPage;
use App\Models\User;

class ContentTemplateTest extends TestCase
{
    use RefreshDatabase;
    use InteractsWithViews;

    /**
     * A Test to text/elements are included in the base template
     * @group ContentTemplateTests
     * @group AssertSees
     */

    public function test_assert_content_template()
    {
        $content =  (object)[
            'content' => 'content test',
            'title' => 'test title'
        ];


        $view = $this->view(
            'vetuk::pages.content.content',
            [
                "content" => $content
            ]
        );

        $view
            ->assertSee('basket-popup')
            ->assertSee('test title')
            ->assertSee('content test');
    }
}
