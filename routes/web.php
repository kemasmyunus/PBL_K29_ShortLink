<?php

use App\Http\Controllers\TautanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/input', function () {
    return view('input',[
        "title" => "Bantuan"
    ]);
});
Route::get('input',[TautanController::class, 'index']);
Route::post('input',[TautanController::class, 'store'])->name('generate.shorten.link.post');
Route::get('tampil', [TautanController::class, 'showData'])->name('tampil');
Route::get('bantuan', [TautanController::class, 'bantuan'])->name('bantuan');
Route::get('{code}', [TautanController::class, 'shortenlink'])->name('shorten.link');
Route::get('bantuan',function(){
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "author" => "Kemas M. Yunus",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Voluptatum repellendus aliquam fugiat molestias ipsum, labore ad minus
            deleniti qui obcaecati accusantium porro et unde, officiis id nemo reiciendis
            praesentium corrupti exercitationem? Fugiat aliquam similique nesciunt dolorem
            cupiditate! Exercitationem explicabo cum earum, nesciunt tempore dolor alias
            esse molestiae unde et necessitatibus? Quia at excepturi eveniet, optio unde iste?
            Itaque repudiandae beatae nobis molestiae! Ipsa, cupiditate omnis? Tempore omnis
            cum autem fugit explicabo voluptas, architecto beatae? Culpa itaque quod dolore]
            aperiam temporibus."
        ],
        [
            "title" => "Judul Post Kedua",
            "author" => "Kemas M. Yunus",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Voluptatum repellendus aliquam fugiat molestias ipsum, labore ad minus
            deleniti qui obcaecati accusantium porro et unde, officiis id nemo reiciendis
            praesentium corrupti exercitationem? Fugiat aliquam similique nesciunt dolorem
            cupiditate! Exercitationem explicabo cum earum, nesciunt tempore dolor alias
            esse molestiae unde et necessitatibus? Quia at excepturi eveniet, optio unde iste?
            aperiam temporibus."
        ]
    ];
    return view('bantuan', [
        "title" => "Bantuan",
        "posts" => $blog_posts
    ]);
});

