@extends("backend.layout.template")
@section('title', 'Admin | Create Artikel')
@section('content')
    <div class="container">
        <div class="my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="text-decoration: none" href="{{url('zancc-admin/dashboard')}}"><i
                                    class="bi bi-house"></i></a></li>
                    <li class="breadcrumb-item"><a style="text-decoration: none" href="{{url('zancc-admin/articles')}}">Artikel</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Artikel</li>
                </ol>
            </nav>
            <h2 class="h2">Buat Artikel</h2>

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

            {{--form tambah artikel--}}
            <form action="{{url('zancc-admin/articles')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class=" mb-3">
                            <label for="title">judul</label>
                            <input type="text" name="title" id="title" placeholder="judul artikel" class="form-control"
                                   value="{{old('title')}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class=" mb-3">
                            <label for="category_id">Kategori</label>
                            <select name="category_id" id="category_id" class="form-select">
                                <option value="" hidden>--pilih kategori--</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="desc">konten</label>
                        <textarea name="desc" id="myEditor" cols="20" rows="10" placeholder="konten artikel"
                                  class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image">gambar thumbnail <span class="text-danger">max (3MB)</span> </label>
                        <input type="file" name="image" id="image" class="form-control" value="{{old('image')}}">
                        <div class="mt-1">
                            <img alt="preview image" src="" id="image" class="img-thumbnail img-preview"
                                 style="width: 250px; height: auto">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="status">status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="" hidden>--pilih status--</option>
                                <option value="0">Private</option>
                                <option value="1">Published</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="publish_date">date</label>
                            <input type="date" name="publish_date" id="publish_date" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="float-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>
    </div>

    @push('js')
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>

        <script>
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
                clipboard_handleImages: false,
            }
            CKEDITOR.replace( 'myEditor', options );

            $('#image').change(function () {
                previewImage(this)
            })

            function previewImage(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader()
                    reader.onload = function (e) {
                        $('.img-preview').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(input.files[0])
                }
            }
        </script>
    @endpush

@endsection
