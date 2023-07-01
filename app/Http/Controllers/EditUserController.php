<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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


    public function ubahpassword(Request $request, $id)
    {
        $editpassworduser = User::find($id);
        return view('editpassworduser', compact('editpassworduser'));
    }

    public function updatepassword(Request $request, $id){
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $input['password']=Hash::make($request->password);

        // memasukkan data baru kedalam model ShortLink dengan $input
        User::whereId($id)->update($input);
        // kembali ke alamat "home" dengan pesan sukses
        return redirect('home')->withSuccess('Profil Berhasil Diubah');
    }




    public function authedit()
    {
        return view('authedit');
    }

    public function authupdate(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'fullname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    
        $user = User::where('username', $request->username)
            ->where('fullname', $request->fullname)
            ->first();
    
        if ($user) {
            $user->username = $request->username;
            $user->fullname = $request->fullname;
            $user->password = bcrypt($request->password);
            $user->save();
    
            // Kembali ke alamat "home" dengan pesan sukses
            return redirect('/')->with('success', 'Profil Berhasil Diubah');
        } else {
            return redirect('/gagal');
        }
    }
    
}
