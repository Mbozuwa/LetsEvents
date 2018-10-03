<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Categories;
use View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('*', function($view)
        {
            $view->with('categories', Categories::all());
        });
    }
}
