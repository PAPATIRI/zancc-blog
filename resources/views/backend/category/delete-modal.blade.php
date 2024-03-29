<!-- Modal -->
@foreach($categories as $item)
    <div class="modal fade" id="modalDelete{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger-subtle">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('zancc-admin/categories/'.$item->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="mb-3">
                            <p>apakah kamu yakin akan menghapus kategori <b>{{$item->name}}? </b></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">hapus kategori</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
