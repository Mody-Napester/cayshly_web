<?php

namespace App\Providers;

use App\Models\Category;
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
        // Using closure based composers...
        view()->composer('@public._layouts.master', function ($view) {
            $data['categories'] = Category::getAllBy('parent_id', 0);
//            $news = News::all();
//            $branch = Branch::where('is_default', 1)->first();
//            $brands = Brand::all();
//            $about = About::where('id', 1)->first();
//            $abouts = About::all();

            $view->with($data);
//            $view->with('news', $news);
//            $view->with('branch', $branch);
//            $view->with('brands', $brands);
//            $view->with('about', $about);
//            $view->with('abouts', $abouts);
        });
    }
}
