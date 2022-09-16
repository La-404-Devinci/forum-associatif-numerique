<?php

namespace App\Providers;

use App\View\Components\buttonUpPage;
use App\View\Components\categoryBlocks;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Define manually inline components
        Blade::component('category-blocks', categoryBlocks::class);
        Blade::component('button-page-up', buttonUpPage::class);
    }
}
