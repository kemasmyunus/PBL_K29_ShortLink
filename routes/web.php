<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\UserController;
use App\Models\ShortLink;

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

Route::get('/', function () {
    return view('welcome');
});

//crud
Route::get('/ubah/{id}',[ShortLinkController::class, 'ubah'])->name('user.ubah');
Route::put('/update/{id}',[ShortLinkController::class, 'update'])->name('user.update');
Route::get('/delete/{id}',[ShortLinkController::class, 'delete'])->name('user.delete');


Auth::routes();


// home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',[ShortLinkController::class, 'index']);
Route::post('/home',[ShortLinkController::class, 'store'])->name('generate.shorten.link.post');

// admin
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

// code
Route::get('{code}', [ShortLinkController::class, 'shortenlink'])->name('shorten.link');