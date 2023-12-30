@extends('frontend.layout.layout')
@section('content')
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-2">
                <h1 class="fw-bolder">Welcome to my personal blog <span class="custom-animation">👋</span></h1>
                <p class="lead mb-0 mt-1 mt-md-3 mt-lg-5">Ilmu adalah buruan dan tulisan adalah ikatannya, maka ikatlah
                    buruanmu dengan tali yang kuat</p>
                <p class="fw-light mt-2">~Imam Syafi'i~</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4 shadow-sm">
                    <a href="{{url('post/'.$latest_post->slug)}}" class="overflow-hidden">
                        <img
                                class="card-img-top custom-featured-img custom-img-hover"
                                src="{{asset('storage/backend/'.$latest_post->image)}}"
                                alt="post thumbnail"
                        />
                    </a>
                    <div class="card-body">
                        <div class="small text-muted mb-2">{{$latest_post->created_at->format('d M Y')}} <a
                                    href="{{url('category/'.$latest_post->Category->slug)}}"
                                    class="text-decoration-none">{{$latest_post->Category->name}}</a>
                        </div>
                        <a href="{{url('post/'.$latest_post->slug)}}" class="card-title h3 text-decoration-none custom-title">{{$latest_post->title}}</a>
                        <p class="card-text mt-1">{{\Illuminate\Support\Str::limit(strip_tags($latest_post->desc), 200, '...')}}</p>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach($articles as $article)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card shadow-sm mb-4">
                                <a href="{{url("post/".$article->slug)}}" class="overflow-hidden"
                                ><img
                                            class="card-img-top custom-post-img custom-img-hover"
                                            src="{{asset('storage/backend/'.$article->image)}}"
                                            alt="post thumb"
                                    /></a>
                                <div class="card-body">
                                    <div class="small text-muted mb-2">{{$article->created_at->format('d M Y')}} <a
                                                href="{{url('category/'.$article->Category->slug)}}"
                                                class="text-decoration-none">{{$article->Category->name}}</a>
                                    </div>
                                    <a href="{{url('post/'.$article->slug)}}"
                                       class="card-title h4 text-decoration-none custom-title">{{$article->title}}</a>
                                    <p class="card-text mt-1">{{\Illuminate\Support\Str::limit(strip_tags($latest_post->desc), 200, '...')}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination justify-content-center my-4">
                    {{$articles->links()}}
                </div>
            </div>
            {{--side widget--}}
            @include('frontend.layout.side-widget')
        </div>
    </div>
@endsection
