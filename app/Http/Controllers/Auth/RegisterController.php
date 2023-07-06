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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
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
        $name = explode(' ', $data['name']);
        if (count($name) == 3) {
            $firstname = $name[0];
            $middlename = $name[1];
            $lastname = $name[2];
        } elseif (count($name) == 2) {
            $firstname = $name[0];
            $middlename = null;
            $lastname = $name[1];
        } elseif (count($name) == 1) {
            return redirect()->back()->withErrors(['name' => 'Please enter your two or three names']);
        } else {
            return redirect()->back()->withErrors(['name' => 'Invalid! Maximum three names required']);
        }
        
        return User::create([
            // 'initial' => $data['initial'],
            'firstname' => $firstname,
            'middlename' => $middlename,
            'lastname' => $lastname,
            'phone' => $data['phone'],
            'email' => $data['email'],
            // 'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
