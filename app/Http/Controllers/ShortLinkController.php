<?php

namespace App\Http\Controllers;

use Str;
use App\Models\User;
use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ShortLinkController extends Controller
{
    public function index()
    {
        // memasukkan data dari model ShortLink kedalam variabel $shortLinks
        // laravel queri

        $links = ShortLink::latest()->get();
        // kembali ke view "home" dengan membawa data yang dimasukkan kedalam variabel shortLinks
        return view('home', compact('links'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url',
            'code' => 'unique:short_links'],[
            'link.required'=>'maaf, link tidak boleh kosong',
            'link.url'=>'maaf, link tidak diterima. link tidak valid',
            'code.unique'=>'maaf, nama sudah digunakan'
        ]);

        $input['user_id']=$request->user_id;
        $input['user_username']=$request->user_username;
        // variabel link = link sebelum dipendekkan
        $input['link'] = $request->link;
        

        //Str memang error pada vscode, tapi masih bisa berjalan dengan baik
        /* variabel code digunakan untuk memberikan huruf custom dibelakang domain
        jika user memasukkan custom link, maka huruf dibelakang domain akan sesuai keinginan user */
        
        // jika $request->code tidak kosong
        if(!empty($request->code)){
            // maka masukkan kedalam $input['code']
            $input['code'] = $request->code;
        }else{
            //jika tidak, maka masukkan nilai random berjumlah 6 buah
            $input['code'] = Str::random(6);
        }

        // jika $request->judul tidak kosong
        if(!empty($request->judul)){
            // maka masukkan kedalam $input['judul']
            $input['judul'] = $request->judul;
        }else{
            // jika tidak, masukkan "judul" kedalamnya
            $input['judul'] = "Judul";
        }

        // memasukkan data baru kedalam model ShortLink dengan $input
        ShortLink::create($input);
        // kembali ke alamat "home" dengan pesan sukses
        return redirect('home')->withSuccess('Tautan Pendek Berhasil Dibuat');
    }
    public function shortenlink($code)
    {
        $find = ShortLink::where('code', $code)->first();
        /* karena setiap berpindah halaman, sistem terus meminta link.
        agar tidak error, maka dibuatkan perkondisian */
        // jika link tidak kosong
        if(!empty($find->link)){
            // maka kembalikan alamat link
            return redirect($find->link);
        }
    }
    
    public function ubah(Request $request, $link_id)
    {
        $tautan = ShortLink::find($link_id);
        return view('ubah', compact('tautan'));
    }

    public function update(Request $request, $link_id){
        $request->validate([
            'link' => 'required|url',
            'code' => 'unique:short_links'],[
            'link.required'=>'maaf, link tidak boleh kosong',
            'link.url'=>'maaf, link tidak diterima. link tidak valid',
            'code.unique'=>'maaf, nama sudah digunakan'
        ]);

        $input['user_id']=$request->user_id;
        $input['user_username']=$request->user_username;
        // variabel link = link sebelum dipendekkan
        $input['link'] = $request->link;
        $input['updated_at']=now();


        //Str memang error pada vscode, tapi masih bisa berjalan dengan baik
        /* variabel code digunakan untuk memberikan huruf custom dibelakang domain
        jika user memasukkan custom link, maka huruf dibelakang domain akan sesuai keinginan user */
        
        // jika $request->code tidak kosong
        if(!empty($request->code)){
            // maka masukkan kedalam $input['code']
            $input['code'] = $request->code;
        }else{
            //jika tidak, maka masukkan nilai random berjumlah 6 buah
            $input['code'] = Str::random(6);
        }

        // jika $request->judul tidak kosong
        if(!empty($request->judul)){
            // maka masukkan kedalam $input['judul']
            $input['judul'] = $request->judul;
        }else{
            // jika tidak, masukkan "judul" kedalamnya
            $input['judul'] = "Judul";
        }

        // memasukkan data baru kedalam model ShortLink dengan $input
        ShortLink::whereId($link_id)->update($input);
        // kembali ke alamat "home" dengan pesan sukses
        return redirect('home')->withSuccess('Tautan Pendek Berhasil Diubah');
    }

    public function delete(Request $request, $link_id){
        $hapus = ShortLink::find($link_id);
        if($hapus){
            $hapus->delete();
        }

        return redirect('home')->withSuccess('Tautan Pendek Berhasil Dihapus');
    }
    
    public function admindelete(Request $request, $link_id){
        $hapus = ShortLink::find($link_id);
        if($hapus){
            $hapus->delete();
        }

        return redirect('adminlinkstable')->withSuccess('Tautan Pendek Berhasil Dihapus');
    }
}
