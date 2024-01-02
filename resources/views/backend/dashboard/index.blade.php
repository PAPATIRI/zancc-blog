@extends("backend.layout.template")
@section('title','Admin | Dashboard')
@section("content")
    <div class="container">
        <div class="my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><i class="bi bi-house"></i></li>
                    <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-6">
                    <div class="card text-bg-secondary mb-3">
                        <div class="card-header">Artikel</div>
                        <div class="card-body">
                            <h5 class="card-title fs-4 fw-bold">{{$total_articles}} Artikel</h5>
                            <p class="card-text mt-3">
                                <a href="{{url('zancc-admin/articles')}}"
                                   class="nav-link shadow-sm text-dark fw-light bg-dark-subtle p-1 rounded w-25 text-center">selengkapnya</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card text-bg-secondary mb-3">
                        <div class="card-header">Kategori</div>
                        <div class="card-body">
                            <h5 class="card-title fs-4 fw-bold">{{$total_categories}} Kategori</h5>
                            <p class="card-text mt-3">
                                <a href="{{url('zancc-admin/categories')}}"
                                   class="nav-link shadow-sm text-dark fw-light bg-dark-subtle p-1 rounded w-25 text-center">selengkapnya</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 border border-dark-subtle border-1 rounded-2">
                <div class="row my-2 m-2">
                    <div class="col-6">
                        <h4>Artikel Terbaru</h4>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>No</td>
                                <td>Judul</td>
                                <td>Kategori</td>
                                <td>Tanggal Dibuat</td>
                                <td>Aksi</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($latest_articles as $article)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$article->title}}</td>
                                    <td>{{$article->Category->name}}</td>
                                    <td>{{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%d %b %y') }}</td>
                                    <td>
                                        <a href="{{url('zancc-admin/articles/'.$article->id)}}"
                                           class="btn btn-sm bg-success-subtle">detail</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <h4>Artikel Terpopuler</h4>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>No</td>
                                <td>Judul</td>
                                <td>Kategori</td>
                                <td>Views</td>
                                <td>Tanggal Dibuat</td>
                                <td>Aksi</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($popular_articles as $article)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$article->title}}</td>
                                    <td>{{$article->Category->name}}</td>
                                    <td>{{$article->views}}</td>
                                    <td>{{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%d %b %y') }}</td>
                                    <td>
                                        <a href="{{url('zancc-admin/articles/'.$article->id)}}"
                                           class="btn btn-sm bg-success-subtle">detail</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
