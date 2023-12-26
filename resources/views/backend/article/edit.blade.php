@extends("backend.layout.template")
@section('title', 'Admin | Update Artikel')
@section('content')
    <div class="container">
        <div class="my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="text-decoration: none" href="{{url('dashboard')}}"><i
                                class="bi bi-house"></i></a></li>
                    <li class="breadcrumb-item"><a style="text-decoration: none" href="{{url('articles')}}">Artikel</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Artikel</li>
                </ol>
            </nav>
            <h2 class="h2">Edit Artikel</h2>

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
            <form action="{{url('articles/'.$article->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="oldImg" value="{{$article->image}}">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="title">judul</label>
                            <input type="text" name="title" id="title" class="form-control"
                                   value="{{old('title', $article->title)}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="category_id">Kategori</label>
                            <select name="category_id" id="category_id" class="form-select">
                                @foreach($categories as $category)
                                    @if($category->id == $article->category_id)
                                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="desc">Content</label>
                        <textarea name="desc" id="myEditor" cols="30" rows="10"
                                  class="form-control">{{old('desc', $article->desc)}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image">gambar thumbnail <span class="text-danger">(max 3MB)</span> </label>
                        <input type="file" name="image" id="image" class="form-control">
                        <div class="mt-2 d-flex gap-5">
                            <div class="mt-1">
                                <small class="text-dark d-block my-1">gambar lama</small>
                                <img src="{{asset('storage/backend/'.$article->image)}}" alt="thumbnail article"
                                     style="width: 150px; height: auto" class="img-fluid rounded">
                            </div>
                            <div class="mt-1">
                                <small class="text-dark d-block my-1">gambar baru</small>
                                <img src="" id="image" class="img-thumbnail img-preview"
                                     style="width: 150px; height: auto">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="status">status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="" hidden>--pilih status--</option>
                                <option value="0" {{$article->status == 0 ? 'selected' : null}}>Private</option>
                                <option value="1" {{$article->status == 1 ? 'selected' : null}}>Published</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="publish_date">date</label>
                            <input type="date" name="publish_date" id="publish_date" class="form-control"
                                   value="{{old('publish_date', $article->publish_date)}}">
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
        <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

        <script>
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
                clipboard_handleImages: false
            }
            CKEDITOR.replace('myEditor', options);

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
