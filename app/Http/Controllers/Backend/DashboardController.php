<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;

class DashboardController extends Controller
{
    //
    public function index(){
        return view("backend.dashboard.index", [
            "total_articles" => Article::count(),
            "total_categories" => Category::count(),
            "latest_articles"=>Article::with('Category')->whereStatus(1)->latest()->take(5)->get(),
            "popular_articles"=>Article::with('Category')->whereStatus(1)->orderBy('views', 'DESC')->take(5)->get(),
        ]);
    }
}
