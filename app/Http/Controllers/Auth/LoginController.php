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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated()
    {
    if(auth()->user()->hasRole('admin'))
    {
        return redirect('/admin');
    } 

    if(auth()->user()->hasRole('pemantau'))
    {
        return redirect('/pemantau');
    } 

    if(auth()->user()->hasRole('upbjj'))
    {
        return redirect('/upbjj');
    } 

    if(auth()->user()->hasRole('pjtu'))
    {
        return redirect('/pjtu');
    } 

    return redirect('/login');
}

}
