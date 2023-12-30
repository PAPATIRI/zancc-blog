@extends('frontend.layout.layout')
@section('content')
    <div class="container">
        <div class="mb-4 p-5">
            <form class="shadow-sm" action="{{url('/posts/search')}}" method="post">
                @csrf
                <div class="input-group">
                    <input
                            class="form-control"
                            type="text"
                            name="keyword"
                            placeholder="cari artikel..."
                    />
                    <button
                            class="btn btn-primary"
                            id="button-search"
                            type="submit"
                    >cari
                    </button>
                </div>
            </form>
        </div>
        @if($keyword)
            <p class="text-center">menampilkan hasil pencarian untuk <b>{{$keyword}}</b></p>
        @endif
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            @forelse($articles as $article)
                <div class="card" style="width: 300px">
                    <a href="{{url("posts/".$article->slug)}}" class="overflow-hidden"
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
                        <a href="{{url('posts/'.$article->slug)}}"
                           class="card-title h4 text-decoration-none custom-title">{{$article->title}}</a>
                        <p class="card-text mt-1">{{\Illuminate\Support\Str::limit(strip_tags($article->desc), 160, '...')}}</p>
                    </div>
                </div>
            @empty
                <div class="p-5 my-5 rounded bg-warning w-100">
                    <h3 class="text-center">artikel yang kamu cari tidak tersedia</h3>
                </div>
            @endforelse
        </div>
        <div style="height: 300px"></div>
        <div class="pagination justify-content-center my-4">
            {{$articles->links()}}
        </div>
    </div>
@endsection
