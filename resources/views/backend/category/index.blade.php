@extends("backend.layout.template")
@section("content")
    <div class="container">
        <div class="my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="bi bi-house"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">categories</li>
                </ol>
            </nav>
            <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#modalCreate">tambah
                category
            </button>

            {{--error validation message--}}
            @if ($errors->any())
                <div class="alert alert-danger mt-1">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success mt-1">
                    {{session('success')}}
                </div>

            @endif

            <table class="table table-striped mt-2">
                <thead>
                <tr class="text-center fw-bold">
                    <td>no</td>
                    <td>nama</td>
                    <td>slug</td>
                    <td>create at</td>
                    <td>function</td>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->created_at}}</td>
                        <td class="d-flex gap-3 justify-content-center">
                            <button class="btn btn-secondary rounded-5" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$category->id}}">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="btn btn-danger rounded-5" data-bs-toggle="modal" data-bs-target="#modalDelete{{$category->id}}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
    {{--modal--}}
    @include('backend.category.create-modal')
    @include('backend.category.update-modal')
    @include('backend.category.delete-modal')
@endsection
