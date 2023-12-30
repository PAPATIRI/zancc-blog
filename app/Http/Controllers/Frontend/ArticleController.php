<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show(string $slug){
        return view('frontend.article.show',[
            'article'=>Article::whereSlug($slug)->first(),
            'categories' => Category::latest()->get()
        ]);
    }
}
