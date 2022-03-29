<?php
namespace VetNext\Front\Tests\Unit;

use VetNext\Front\Tests\TestCase;

/**
 * Class IndexPageTest
 * @package VetNext\Front\Tests\Feature
 */

class UserTest extends TestCase
{


    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_login_form()
    {
        $response = $this->get('/products/');

        $response->assertStatus(200);
    }
}
