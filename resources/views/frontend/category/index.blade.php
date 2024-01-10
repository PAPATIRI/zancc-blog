@extends('frontend.layout.layout')
{{--@section('title', 'zanccode | '.$category)--}}
@section('content')
    <div class="container">
        <div class="mx-5 mb-4 font-paragraph" data-aos="zoom-in" data-aos-delay="50">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <form action="{{url('/category/search')}}" method="post" class="w-75 mb-2">
                    @csrf
                    <div class="input-group">
                        <input
                                class="form-control"
                                type="text"
                                name="keyword"
                                placeholder="ketik kata kunci dan tekan enter"
                        />
                    </div>
                </form>
                <div class="d-flex gap-2 flex-column w-75">
                    <p class="fs-6 fw-light text-muted my-0">pilih kategori:</p>
                    <div class="d-flex gap-2 align-items-center">
                        @foreach($categories as $category)
                            <a href="{{url('category/'.$category->slug)}}"
                               class="text-decoration-none py-1 px-2 bg-dark-subtle text-dark rounded">{{$category->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @if($keyword)
            <p class="text-center fs-6" data-aos="zoom-in">hasil pencarian dengan kata kunci <b>{{$keyword}}</b></p>
        @endif
        <div class="d-flex gap-3 justify-content-center flex-wrap" id="articles-wrapper">
            @forelse($articles as $article)
                <div class="card shadow font-paragraph" style="width: 350px" data-aos="zoom-in-up" data-aos-delay="100">
                    <div class="card-body">
                        <div class="text-muted mb-2 d-flex justify-content-between align-items-center w-100">
                            <p class="fs-6 m-0">{{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%d %B %Y') }}</p>
                            <a href="{{url('category/'.$article->Category->slug)}}"
                               class="text-decoration-none text-dark fw-medium">{{$article->Category->name}}</a>
                        </div>
                        <a href="{{url('posts/'.$article->slug)}}"
                           class="card-title h3 fs-5 fw-bold text-decoration-none custom-title font-title">{{\Illuminate\Support\Str::limit($article->title,55)}}</a>
                        <hr class="card-divider my-3 p-0">
                        <p class="fs-5" >{{\Illuminate\Support\Str::limit(str_replace('&nbsp;', ' ', strip_tags($article->desc)), 100)}}</p>
                    </div>
                </div>
            @empty
                <div class="p-5 my-5 rounded bg-warning w-100" id="warning-empty">
                    <h3 class="text-center">artikel yang kamu cari tidak tersedia</h3>
                </div>
            @endforelse
        </div>
        <div class="pagination fixed-bottom justify-content-center my-5 pb-3">
            {{$articles->links()}}
        </div>
    </div>
@endsection
