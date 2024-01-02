<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $keyword = \request()->keyword;
        if ($keyword) {
            $article = Article::with('Category')
                ->whereStatus(1)
                ->where('title', 'like', '%' . $keyword . '%')
                ->latest()
                ->simplePaginate(6);
        } else {
            $article = Article::with('Category')->whereStatus(1)->latest()->simplePaginate(6);
        }

        return view('frontend.category.index', [
            'articles' => $article,
            'keyword' => $keyword,
        ]);
    }

    public function show($slugCategory)
    {
        return view('frontend.category.show', [
            'articles' => Article::with('Category')->whereHas('Category', function ($q) use ($slugCategory) {
                $q->where('slug', $slugCategory);
            })->whereStatus(1)->latest()->simplePaginate(6),
            'category' => $slugCategory,
        ]);
    }

}
