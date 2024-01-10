@extends('frontend.layout.layout')
@section('title', 'zanccode | '.$article->title)
@section('content')
    <div class="container">
        <div class="row my-3 font-paragraph">
            <div class="pb-5 col-12 col-lg-8">
                <div class="rounded overflow-hidden">
                    <div class="d-flex align-items-center gap-2 py-2 justify-content-between">
                        <p class="text-secondary m-0 fs-6 fw-medium">{{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%d %B %Y') }}</p>
                        <div class="d-flex align-items-center gap-3">
                            <p class="text-muted m-0 fs-6 fw-medium">{{$article->views}} kali
                                dilihat</p>
                            <p class="text-muted m-0 fs-6 fw-medium">tag: <a
                                        href="{{url('category/'.$article->Category->name)}}"
                                        class="text-decoration-none text-dark fw-medium">{{$article->Category->name}}</a>
                            </p>
                        </div>
                    </div>
                    <hr class="card-divider mt-1 mb-3">
                    <p class="h1 fs-2 fw-bold text-dark w-100 font-title">{{$article->title}}</p>
                </div>
                <div class="overflow-hidden rounded bg-warning" style="min-height: 200px; max-height: 350px">
                    <img src="{{asset('storage/backend/'.$article->image)}}"
                         class="rounded custom-detail-post-img"
                         alt="article thumbnail">
                </div>
                <div class="w-100 d-flex justify-content-center">
                    <div class="card-body my-3 content-article custom-post-wrapper overflow-hidden">
                        <p class="custom-post-content">
                            {!! $article->desc !!}
                        </p>
                    </div>
                </div>
            </div>
            {{--side widget--}}
            @include('frontend.layout.side-widget')
        </div>
    </div>
@endsection