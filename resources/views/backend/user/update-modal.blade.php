<!-- Modal -->
@foreach($users as $user)
    <div class="modal fade" id="modalUpdate{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark-subtle">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Data User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('users/'.$user->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="name">nama user</label>
                            <input type="text" name="name" placeholder="nama user"
                                   class="form-control @error('name') is-invalid @enderror" value="{{old('name', $user->name)}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">email user</label>
                            <input type="email" name="email" placeholder="email user"
                                   class="form-control @error('email') is-invalid @enderror" value="{{old('email', $user->email)}}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password">password <span class="text-danger">(kosongkan jika tidak merubah password)</span> </label>
                            <input type="password" name="password" placeholder="*********"
                                   class="form-control @error('password') is-invalid @enderror"
                                   value="{{old('password')}}">
                            @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">konfirmasi password <span class="text-danger">(kosongkan jika tidak merubah password)</span></label>
                            <input type="password" name="password_confirmation" placeholder="********"
                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                   value="{{old('password_confirmation')}}">
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
