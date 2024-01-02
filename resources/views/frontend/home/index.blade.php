@extends('frontend.layout.layout')
@section('title', 'zanccode | beranda')
@section('content')
    <!-- Page header with logo and tagline-->
    <header class="bg-transparent border-bottom mb-4 py-4">
        <div class="container">
            <div class="text-center my-2">
                <h1 class="fw-bolder fs-1">Welcome to my personal blog <span class="custom-animation">👋</span></h1>
                <p class="lead fs-4 mb-0 mt-1 mt-md-3 mt-lg-3">Ilmu adalah buruan dan tulisan adalah ikatannya, maka
                    ikatlah
                    buruanmu dengan tali yang kuat</p>
                <p class="fw-light fs-6 mt-2">~Imam Syafi'i~</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <div class="d-flex gap-3 flex-wrap justify-content-center">
                    @forelse($articles as $article)
                        <!-- Blog post-->
                        <div class="card shadow" style="width: 350px">
                            <div class="card-body">
                                <div class="text-muted mb-2 d-flex justify-content-between align-items-center w-100">
                                    <p class="fs-6 m-0">{{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%d %B %Y') }}</p>
                                    <a href="{{url('category/'.$article->Category->slug)}}"
                                       class="text-decoration-none">{{$article->Category->name}}</a>
                                </div>
                                <a href="{{url('posts/'.$article->slug)}}"
                                   class="card-title h3 fs-4 fw-medium text-decoration-none custom-title">{{\Illuminate\Support\Str::limit($article->title,55)}}</a>
                                <hr class="card-divider my-3 p-0">
                                <p class="fs-5">{{\Illuminate\Support\Str::limit(str_replace('&nbsp;', ' ', strip_tags($article->desc)), 100)}}</p>
                            </div>
                        </div>
                    @empty
                        <div class="p-5 my-5 rounded bg-warning w-100">
                            <h3 class="text-center fs-3">artikel yang kamu cari tidak tersedia</h3>
                        </div>
                    @endforelse
                </div>
                <div style="height: 300px"></div>
                <div class="pagination justify-content-center my-4">
                    {{$articles->links()}}
                </div>
            </div>
            {{--side widget--}}
            @include('frontend.layout.side-widget')
        </div>
    </div>
@endsection
