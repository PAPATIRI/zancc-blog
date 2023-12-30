@extends('frontend.layout.layout')
@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="card shadow-sm p-3 col-12 col-lg-8">
                <div class="rounded overflow-hidden">
                    <p class="h1 text-dark w-100">{{$article->title}}</p>
                    <p class="custom-post-writer text-secondary">{{$article->created_at->format('d M Y')}}</p>
                </div>
                <img src="{{asset('storage/backend/'.$article->image)}}"
                     class="rounded img-fluid custom-detail-post-img"
                     alt="article thumbnail">
                <div class="card-body my-3 custom-post-wrapper">
                    <p class="custom-post-content">
                        {!! $article->desc !!}
                    </p>
                </div>
            </div>
            {{--side widget--}}
            @include('frontend.layout.side-widget')
        </div>
    </div>
@endsection