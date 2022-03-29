<?php

namespace VetNext\Front\Providers;

use Route;
use Illuminate\Support\ServiceProvider;
use VetNext\Front\Components\Base\Footer;
use VetNext\Front\Components\Base\Head;
use VetNext\Front\Components\Base\Header;
use VetNext\Front\Components\Base\Main;
use VetNext\Front\Components\Base\Navigation;
use VetNext\Front\Components\Base\Products;
use Illuminate\Support\Facades\View;
use VetNext\Front\Models\Product;

class ViewsServiceProvider extends ServiceProvider
{
    public function boot()
    {

        /**
         * Where to load views from
         *
         */
        $this->loadViewsFrom(__DIR__ . '/../views', 'vetuk');

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->registerRoutes();

        $this->loadViewComponentsAs('vetuk', [
            Footer::class,
            Head::class,
            Header::class,
            Main::class,
            Navigation::class,
            Products::class
        ]);

        /**
         * Publishing css,js,img,views to main project
         *
         */
        $this->publishes([
            __DIR__ . '/../resources/css' => public_path('css'),
            __DIR__ . '/../resources/js' => public_path('js'),
            __DIR__ . '/../resources/img' => public_path('img'),
            __DIR__ . '/../views' => resource_path('views/vendor/views')
        ], 'vetukviews');

//        $products = Product::query();
//
//        View::share('sharedproducts', $products);
    }

    public function register()
    {
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('vetnext.prefix'),
            'middleware' => config('vetnext.middleware'),
        ];
    }
}
