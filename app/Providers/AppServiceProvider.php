<?php

namespace App\Providers;

use App\Category;
use App\Post;
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
        view()->composer('layouts.navbar', function ($view) {
            $view->with('categories', Category::all());
        });
        view()->composer('layouts.sidebar', function ($view) {
           $view->with('popular_posts', Post::query()->orderBy('views', 'desc')->limit(3)->get());
           $view->with('cats', Category::query()->withCount('posts')->orderBy('posts_count', 'desc')->get());
        });
    }
}
