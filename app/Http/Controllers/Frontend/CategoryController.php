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
        return view('frontend.category.index', [
            'articles' => Article::with('Category')->latest()->get()
        ]);
    }

    public function show($slugCategory)
    {
        return view('frontend.category.show', [
            'articles' => Article::with('Category')->whereHas('Category', function ($q) use ($slugCategory) {
                $q->where('slug', $slugCategory);
            })->whereStatus(1)->latest()->simplePaginate(4),
            'category' => $slugCategory,
        ]);
    }

    public function filterData(Request $request)
    {
        try {
            $category = $request->input('category');

            if ($category === 'all') {
                $filteredArticles = Article::with('Category')->latest()->get(); // Ambil semua data artikel jika kategori adalah 'all'
            } else {
                $filteredArticles = Article::with('Category')->whereHas('category', function ($query) use ($category) {
                    $query->where('name', $category); // Ambil artikel berdasarkan nama kategori
                })->latest()->get();
            }

            return response()->json(['articles' => $filteredArticles]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
