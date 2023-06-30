<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EditUserController extends Controller
{
    public function edit(Request $request, $id)
    {
        $edituser = User::find($id);
        return view('edituser', compact('edituser'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'fullname' => ['required', 'string', 'max:255'],
        ]);

        $input['username']=$request->username;
        $input['fullname']=$request->fullname;

        // memasukkan data baru kedalam model ShortLink dengan $input
        User::whereId($id)->update($input);
        // kembali ke alamat "home" dengan pesan sukses
        return redirect('home')->withSuccess('Profil Berhasil Diubah');
    }
}
