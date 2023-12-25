<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $article = Article::with('Category')->latest()->get();
            return DataTables::of($article)
                // create custom column
                ->addColumn('category_id', function ($article) {
                    return $article->Category->name;
                })
                ->addColumn('status', function ($article) {
                    if ($article->status == 0) {
                        return '<span class="badge bg-danger">Private</span>';
                    } else {
                        return '<span class="badge bg-success">Private</span>';
                    }
                })
                ->addColumn('button', function ($article) {
                    return '<div>
                                <td class="d-flex gap-3 justify-content-center">
                                    <button class="btn btn-primary rounded-5" data-bs-toggle="modal"
                                            data-bs-target="#modalUpdate{{$article->id}}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-secondary rounded-5" data-bs-toggle="modal"
                                            data-bs-target="#modalUpdate{{$article->id}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-danger rounded-5" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete{{$article->id}}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </div>';

                })
                // call custom column
                ->rawColumns(['category_id', 'status', 'button'])
                ->make();
        }
        return view('backend.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
