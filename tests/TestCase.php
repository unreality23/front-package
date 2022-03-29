<?php

namespace VetNext\Front\Tests;

use Illuminate\Foundation\Application;

use VetNext\Front\Providers\ViewsServiceProvider;

/**
 * Class TestCase
 * @package VetNext\Front\Tests
 */
abstract class TestCase extends \Orchestra\Testbench\TestCase
{



//    public function setUp(): void
//    {
//        parent::setUp();
//        // additional setup
//    }
    /**
     * Get package providers.
     *
     * @param Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            ViewsServiceProvider::class,
        ];
    }
    /**
     * Define environment setup.
     *
     * @param  Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}
