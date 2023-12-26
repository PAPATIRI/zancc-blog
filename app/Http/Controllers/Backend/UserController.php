<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('backend.user.index', [
            'users'=>User::latest()->get()
        ]);
    }

    public function store(UserRequest $request){
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        User::create($data);
        return back()->with('success', 'berhasil mendaftarkan user baru');
    }

    public function update(UserUpdateRequest $request, $id){
        $data = $request->validated();
        if($data['password'] != ''){
            $data['password'] = bcrypt($data['password']);
            User::find($id)->update($data);
        }else{
            User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
        }
        return back()->with('success', 'berhasil mengubah data user');
    }

    public function destroy(string $id){
        User::find($id)->delete();

        return response()->json([
            "message"=>"sukses menghapus data user"
        ]);
    }
}
