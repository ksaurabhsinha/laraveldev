<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {

            $pageDataArray = [
                'page.title' => '',
                'bread.one' => '',
                'bread.two' => '',
                'bread.three' => '',
            ];

            $view->with('staticVersion', Config::get('app.static_version'));
        });

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
