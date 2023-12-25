<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
                ->addIndexColumn() // untuk columnomor
                ->addColumn('category_id', function ($article) {
                    return $article->Category->name;
                })
                ->addColumn('status', function ($article) {
                    if ($article->status == 0) {
                        return '<span class="badge bg-danger p-2">Private</span>';
                    } else {
                        return '<span class="badge bg-success p-2">Published</span>';
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
        return view('backend.article.create', [
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('image'); //foto
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension(); //ambil ekstensi
        $file->storeAs('public/backend/', $fileName); // masuk folder public/backend/23234.jpg

        $data['image'] = $fileName;
        $data['slug'] = Str::slug($data['title']);

        Article::create($data);

        return redirect(url('articles'))->with('success', 'sebuah artikel berhasil dibuat');

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
