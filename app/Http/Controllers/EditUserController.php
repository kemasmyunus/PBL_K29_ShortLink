<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShortLink;
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
            'username' => ['required', 'string', 'max:30', 'unique:users'],
            'fullname' => ['required', 'string', 'max:90'],
        ],[
            'username.unique'=>"maaf, username sudah digunakan",
            'username.required'=>"maaf, username tidak boleh kosong",
            'fullname.required'=>"maaf, fullname tidak boleh kosong",
            'username.max'=> "maaf, username maksimal 30 karakter",
            'fullname.max'=> "maaf, fullname maksimal 90 karakter",
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
        ],[
            'password.required'=>'password belum dimasukkan',
            'password.min'=>'password minimal berisikan 8 karakter',
            'password.confirmed'=>'password tidak sama',
        ]);

        $input['password']=Hash::make($request->password);

        // memasukkan data baru kedalam model ShortLink dengan $input
        User::whereId($id)->update($input);
        // kembali ke alamat "home" dengan pesan sukses
        return redirect('home')->withSuccess('Password Berhasil Diubah');
    }

    public function authedit()
    {
        return view('authedit');
    }

    public function authupdate(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:30'],
            'fullname' => ['required', 'string', 'max:90'],
            'password' => ['required', 'string', 'min:8'],
        ],[
            'username.required'=>"maaf, username tidak boleh kosong",
            'password.required'=>"maaf, password tidak boleh kosong",
            'fullname.required'=>"maaf, fullname tidak boleh kosong",
            'username.max'=> "maaf, username maksimal 30 karakter",
            'fullname.max'=> "maaf, fullname maksimal 90 karakter",
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

    public function hapusakun(Request $request, $id) {
        $hapus = User::find($id);
        if ($hapus) {
            $hapus->delete();
        }
    
        $link = ShortLink::where('user_id', $id);
        if ($link) {
            $link->delete();
        }
    
        return redirect('/')->with('success', 'Akun berhasil dihapus');
    }
    
    
}
