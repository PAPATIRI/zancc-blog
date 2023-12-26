@extends("backend.layout.template")
@section('title', 'Admin | Kategori')
@section("content")
    <div class="container">
        <div class="my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="bi bi-house"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                </ol>
            </nav>
            <button class="btn btn-success my-2" data-bs-toggle="modal" data-bs-target="#modalCreate">Tambah Kategori
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

            {{--success alert--}}
            <div class="swal" data-swal="{{session('success')}}">

                <table class="table table-striped mt-2">
                    <thead>
                    <tr class="fw-bold">
                        <td>no</td>
                        <td>nama</td>
                        <td>slug</td>
                        <td>create at</td>
                        <td>function</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->created_at}}</td>
                            <td class="d-flex gap-3 justify-content-start">
                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#modalUpdate{{$category->id}}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <a href="#" class="btn btn-danger" onClick="deleteCategory(this)"
                                   data-id="{{$category->id}}">
                                    <i class="bi bi-trash"></i>
                                </a>
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

        @push('js')
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
                const swal = $('.swal').data('swal')
                if (swal) {
                    Swal.fire({
                        'title': 'Success',
                        'text': swal,
                        'icon': 'success',
                        'showConfirmButton': false,
                        'timer': 1500
                    })
                }

                function deleteCategory(e) {
                    let id = e.getAttribute('data-id')

                    Swal.fire({
                        title: 'Delete',
                        text: 'Apakah kamu yakin menghapus kategori ini?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: 'DELETE',
                                url: '/categories/' + id,
                                dataType: 'json',
                                success: function (response) {
                                    Swal.fire({
                                        title: 'Berhasil',
                                        text: response.message,
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then((result) => {
                                        window.location.href = '/categories'
                                    })
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                                }
                            })
                        }
                    })
                }
            </script>

    @endpush
@endsection
