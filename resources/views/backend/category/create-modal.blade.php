<!-- Modal -->
<div class="modal fade" id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark-subtle">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('categories')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name">nama kategori</label>
                        <input type="text" name="name" placeholder="masukan kategori"
                               class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
