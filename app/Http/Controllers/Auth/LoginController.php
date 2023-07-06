<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use RedirectsUsers;

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('Doctors Appointment System')->with('success', 'Yo have been logged Out!');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) 
        {
            if (auth()->user()->role == 0) {
                return redirect()->route('Admin Dashboard')->with('success','Welcome '.auth()->user()->firstname);
            }
            elseif (auth()->user()->role == 1)
            {
                return redirect()->route('doctor')->with('status','Welcome '.auth()->user()->firstname);
            }
            elseif (auth()->user()->role == 2)
            {
                return redirect()->route('home')->with('status','Welcome '.auth()->user()->firstname);
            }
        } else 
        {
            return redirect()->route('login')->withInput()
            ->with('invalid', 'Invalid Email or Password');
        }

    }
    
}
