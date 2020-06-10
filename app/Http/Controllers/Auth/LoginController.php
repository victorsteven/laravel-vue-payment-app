<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {

      session()->put('previousUrl', url()->previous());

      return view('pages.login');
    }

    public function redirectTo()
    {
      return str_replace(url('/'), '', session()->get('previousUrl', '/'));
    }

    protected function authenticated(Request $request, $user)
    {
        if ( $user->isAdmin()) {

          return redirect()->route('dashboard');

        } else if(!session()->get('previousUrl')) {

          return redirect('/customer-dashboard');

        } else {

          return redirect(str_replace(url('/'), '', session()->get('previousUrl', '/')));

          // return str_replace(url('/'), '', session()->get('previousUrl', '/'));
          // $this->redirectTo();
        }
        // logger("the user: ");
        // logger($user);
    }
}
