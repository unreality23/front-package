<?php
namespace VetNext\Front\Tests\Feature;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use VetNext\Front\Tests\TestCase;
use Illuminate\Http\Request;
use VetNext\Front\Models\ContentPage;
use App\Models\User;

class MetaTemplateTest extends TestCase
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
        $content = (object)[
            'title' => 'title test' ,
            'description' => 'description test'
        ];

        $view = $this->view(
            'vetuk::components.base.meta',
            [
                'content' => $content,
                'products' => 'products'
        ]
        );

        $view
            ->assertSee('title test')
            ->assertSee('description test')
            ->assertSee('csrf-token');
    }
}
