<!-- Side widgets-->
<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card shadow mb-3" data-aos="zoom-in" data-aos-delay="100">
        <div class="card-header fs-6 fw-medium font-title">cari artikel</div>
        <div class="card-body">
            <form action="{{url('/posts/search')}}" method="post">
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
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card shadow mb-3" data-aos="zoom-in" data-aos-delay="150">
        <div class="card-header fs-6 fw-medium font-title">Kategori</div>
        <div class="card-body">
            <ul class="list-unstyled d-flex flex-wrap w-100 gap-2">
                @foreach($categories as $category)
                    <li class="bg-dark px-2 py-1 rounded">
                        <a href="{{url('/category/'.$category->name)}}"
                           class="text-decoration-none text-light">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card shadow mb-3" data-aos="zoom-in" data-aos-delay="200">
        <div class="card-header fs-6 fw-medium font-title">Artikel Populer</div>
        <div class="card-body">
            @foreach($popular_articles as $article)
                <div class="d-flex justify-content-between">
                    <a href="{{url('posts/'.$article->slug)}}" class="fw-medium text-decoration-none text-dark font-paragraph">{{\Illuminate\Support\Str::limit($article->title, 35)}}</a>
                    <p class="text-muted">{{$article->views}}x dilihat</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
