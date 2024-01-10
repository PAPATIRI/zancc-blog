<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ArticleController extends Controller
{
    public function index()
    {
    }

    public function show(string $slug)
    {
        $article = Article::whereSlug($slug)->firstOrFail();
        $article->increment('views');
        return view('frontend.article.show', [
            'article' => $article,
        ]);
    }
}
