<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();

        view()->composer('@public._layouts.master', function ($view) {
            $data['categories'] = Category::getAllBy('parent_id', 0);
            $data['contact'] = Contact::getOneBy('is_default', 1);
            $view->with($data);
        });
    }
}
