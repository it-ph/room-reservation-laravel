<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //Added for Flash Message
    public function authenticated( \Illuminate\Http\Request $request, \App\User $user ) {
        $request->session()->flash('with_success', 'Welcome, ' . strtoupper($user->fullname));
        return redirect()->intended( $this->redirectPath() );   
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    
}
