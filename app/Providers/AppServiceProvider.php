<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Slider;
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
        view()->composer('@public._layouts.master', function ($view) {
            $data['categories'] = Category::getAllBy('parent_id', 0);

            $view->with($data);
        });
    }
}
