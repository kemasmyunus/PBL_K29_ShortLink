<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:30', 'unique:users'],
            'fullname' => ['required', 'string', 'max:90'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'username.required'=>'username belum dimasukkan',
            'username.unique'=>'nama sudah digunakan',
            'fullname.required'=>'fullname belum dimasukkan',
            'password.required'=>'password belum dimasukkan',
            'password.min'=>'password minimal berisikan 8 karakter',
            'password.confirmed'=>'password tidak sama',
            'username.max'=> "maaf, username maksimal 30 karakter",
            'fullname.max'=> "maaf, fullname maksimal 90 karakter",
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'fullname' => $data['fullname'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
