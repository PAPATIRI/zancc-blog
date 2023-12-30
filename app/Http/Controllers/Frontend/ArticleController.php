<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $keyword = \request()->keyword;
        if ($keyword) {
            $article = Article::with('Category')
                ->whereStatus(1)
                ->where('title', 'like', '%' . $keyword . '%')
                ->latest()
                ->simplePaginate(4);
        } else {
            $article = Article::with('Category')->whereStatus(1)->latest()->simplePaginate(4);
        }

        return view('frontend.article.index', [
            'articles'=> $article,
            'keyword'=>$keyword
        ]);

    }
    public function show(string $slug){
        return view('frontend.article.show',[
            'article'=>Article::whereSlug($slug)->first(),
            'categories' => Category::latest()->get(),
        ]);
    }
}
