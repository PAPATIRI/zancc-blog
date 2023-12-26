@extends("backend.layout.template")
@section('title', 'Admin | Detail Artikel')
@section('content')
    <div class="container">
        <div class="my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="bi bi-house"></i></a></li>
                    <li class="breadcrumb-item active"><a href="{{url("articles")}}" style="text-decoration: none">Article</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Artikel</li>
                </ol>
            </nav>

            <div class="mt-3">
                <table class="table table-bordered table-striped shadow-sm">
                    <tr>
                        <th style="width: 250px">Judul</th>
                        <td>: {{$articles->title}}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>: {{$articles->Category->name}}</td>
                    </tr>
                    <tr>
                        <th>Di Baca</th>
                        <td>: {{$articles->views}} kali</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        @if($articles->status == 1)
                            <td>: <span class="badge bg-success p-2">Published</span></td>
                        @else
                            <td>: <span class="badge bg-danger p-2">Private</span></td>

                        @endif
                    </tr>
                    <tr>
                        <th>Di Publish</th>
                        <td>: {{$articles->publish_date}}</td>
                    </tr>
                    <tr>
                        <th>Thumbnail</th>
                        <td>
                            <a href="{{asset('storage/backend/'.$articles->image)}}" target="_blank"
                               rel="noopener noreferrer">
                                <img src="{{asset('storage/backend/'.$articles->image)}}" alt="thumb-article"
                                     class="img-fluid w-25 h-auto rounded">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Konten</th>
                        <td>: {!! $articles->desc !!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
