<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tautan;
use Str;

class TautanController extends Controller
{
    public function index()
    {
        $Tautan = Tautan::latest()->get();
        return view('/input', compact('Tautan'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        $input['link'] = $request->link;
        $input['code'] = Str::random(6);
        if (!empty($request->judul)) {
            $input['judul'] = $request->judul; //jika code ada isinya, maka cetak isinya saja
        } else {
            $input['judul'] = 'tautan ' . Tautan::count(); // Menambahkan nomor auto increment ke judul
        }

        Tautan::create($input);

        return redirect('/input')->withSuccess('Shorten Link Generated Successfully.');
    }

    public function shortenlink($code)
    {
        $find = Tautan::where('code', $code)->first();
        return redirect($find->link);
    }

    public function showData()
    {
        $data = Tautan::all();
        return view('tampil', compact('data'));
    }
    
    public function bantuan()
    {
        $bantuan = Tautan::all();
        return view('bantuan', compact('bantuan'));
    }

}
