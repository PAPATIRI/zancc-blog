@extends("backend.layout.template")
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endpush
@section('title', 'Admin | Artikel')
@section('content')
    <div class="container">
        <div class="my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="bi bi-house"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Artikel</li>
                </ol>
            </nav>
            <a href="{{url('articles/create')}}" class="btn btn-success my-3" >Tambah Artikel
            </a>

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

            <table class="table table-striped" id="dataTable">
                <thead>
                <tr class="fw-bold">
                    <td>no</td>
                    <td>judul</td>
                    <td>kategori</td>
                    <td>views</td>
                    <td>status</td>
                    <td>publish date</td>
                    <td>function</td>
                </tr>
                </thead>
                <tbody>
                </tbody>

            </table>
        </div>
    </div>

    @push('js')
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable({
                    processing: true,
                    serverside: true,
                    ajax: '{{url()->current()}}',
                    columns: [
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'category_id',
                            name: 'category_id'
                        },
                        {
                            data: 'views',
                            name: 'views'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'publish_date',
                            name: 'publish_date'
                        },
                        {
                            data: 'button',
                            name: 'button'
                        },
                    ]
                });
            })
        </script>
    @endpush

@endsection
