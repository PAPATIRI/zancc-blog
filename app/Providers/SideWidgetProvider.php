<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SideWidgetProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $popular_articles = Article::with('Category')->whereStatus(1)->orderBy('views', 'DESC')->take(5)->get();
        View::share('popular_articles', $popular_articles);

        $categories = Category::latest()->get();
        View::share('categories',$categories);

        $current_year = Date::now()->year;
        view::share('current_year', $current_year);
    }
}
