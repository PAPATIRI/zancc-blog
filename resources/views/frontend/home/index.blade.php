@extends('frontend.layout.layout')
@section('content')
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <p class="lead mb-0">
                    A Bootstrap 5 starter layout for your next blog homepage
                </p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="#!"
                    ><img
                                class="card-img-top"
                                src="{{asset('storage/backend/'.$latest_post->image)}}"
                                alt="..."
                        /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{$latest_post->created_at->format('d M Y')}}</div>
                        <h2 class="card-title">{{$latest_post->title}}</h2>
                        <p class="card-text">{{\Illuminate\Support\Str::limit(strip_tags($latest_post->desc), 200, '...')}}</p>
                        <a class="btn btn-dark" href="#!">Read more →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach($articles as $article)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"
                                ><img
                                            class="card-img-top"
                                            src="{{asset('storage/backend/'.$article->image)}}"
                                            alt="post thumb"
                                    /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{{$article->created_at->format('d M Y')}}</div>
                                    <h2 class="card-title h4">{{$article->title}}</h2>
                                    <p class="card-text">{{\Illuminate\Support\Str::limit(strip_tags($latest_post->desc), 200, '...')}}</p>
                                    <a class="btn btn-dark" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0"/>
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"
                            >Newer</a
                            >
                        </li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#!">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#!">...</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#!">15</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#!">Older</a>
                        </li>
                    </ul>
                </nav>
            </div>
            {{--side widget--}}
            @include('frontend.layout.side-widget')
        </div>
    </div>
@endsection
