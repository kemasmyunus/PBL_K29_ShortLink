<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome(){
        // mengambil data sari model ShortLink :: mengambil data terakhir -> method get
        $shortLinks = ShortLink::latest()->get();
        // kembalikan ke view "admin-home" kedalam variabel shortLinks
        return view('admin-home', compact('shortLinks'));
    }
}
