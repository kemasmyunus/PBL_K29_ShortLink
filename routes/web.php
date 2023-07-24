<?php

use App\Http\Controllers\EditUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\UserController;
use App\Models\ShortLink;
use Psy\Command\EditCommand;

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
Route::get('/blank', function () {
    return view('adminusertable');
});

//crud
//ubah user
Route::get('/ubah{link_id}',[ShortLinkController::class, 'ubah'])->name('user.ubah');
Route::put('/update{link_id}',[ShortLinkController::class, 'update'])->name('user.update');
Route::get('/delete{link_id}',[ShortLinkController::class, 'delete'])->name('user.delete');
Route::get('/admindelete{link_id}',[ShortLinkController::class, 'admindelete'])->name('admin.delete');
//ubah password
Route::get('/passwordubah{user_id}',[EditUserController::class, 'ubahpassword'])->name('ubahpassword');
Route::put('/passwordupdate{user_id}',[EditUserController::class, 'updatepassword'])->name('updatepassword');


Route::get('/authedit',[EditUserController::class, 'authedit'])->name('authedit');
Route::put('/authupdate',[EditUserController::class, 'authupdate'])->name('authupdate');


Route::get('/useredit{user_id}',[EditUserController::class, 'edit'])->name('editprofil');
Route::put('/userupdate{user_id}',[EditUserController::class, 'update'])->name('updateprofil');
Route::get('/hapusakun{user_id}',[EditUserController::class, 'hapusakun'])->name('hapusakun');

Auth::routes();


// home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',[ShortLinkController::class, 'index']);
Route::post('/home',[ShortLinkController::class, 'store'])->name('generate.shorten.link.post');

// admin
Route::get('/adminlinkstable', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/adminlinkstable', function () {
    return view('adminlinkstable');
});
Route::get('/adminuserstable', function () {
    return view('adminuserstable');
});

// code
Route::get('{code}', [ShortLinkController::class, 'shortenlink'])->name('shorten.link');