@extends('frontend.layout.layout')
@section('title', 'zanccode | '.$category)
@section('content')
    <div class="container">
        @if($category)
            <div class="w-100 my-3" data-aos="zoom-in" data-aos-delay="50">
                <p class="fs-3 text-center text-black text-capitalize"><i class="bi bi-rss"></i><b> {{$category}}</b>
                </p>
            </div>
        @endif
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            @forelse($articles as $article)
                <div class="card shadow font-paragraph" style="width: 350px" data-aos="zoom-in-up" data-aos-delay="100">
                    <div class="card-body">
                        <div class="text-muted mb-2 d-flex justify-content-between align-items-center w-100">
                            <p class="fs-6 m-0">{{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%d %B %Y') }}</p>
                            <a href="{{url('category/'.$article->Category->slug)}}"
                               class="text-decoration-none fw-medium text-dark">{{$article->Category->name}}</a>
                        </div>
                        <a href="{{url('posts/'.$article->slug)}}"
                           class="card-title h3 fs-5 fw-bold text-decoration-none custom-title font-title">{{\Illuminate\Support\Str::limit($article->title,55)}}</a>
                        <hr class="card-divider my-3 p-0">
                        <p class="fs-5">{{\Illuminate\Support\Str::limit(str_replace('&nbsp;', ' ', strip_tags($article->desc)), 100)}}</p>
                    </div>
                </div>
            @empty
                <div class="p-5 my-5 rounded bg-warning w-100" data-aos="zoom-in" data-aos-delay="100">
                    <h3 class="text-center">artikel dengan kategori {{$category}} belum tersedia</h3>
                </div>
            @endforelse
        </div>
        <div style="height: 420px"></div>
        <div class="pagination justify-content-center my-4">
            {{$articles->links()}}
        </div>
    </div>
@endsection
