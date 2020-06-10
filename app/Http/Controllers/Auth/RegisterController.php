<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Repositories\AdminRepo;
use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

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
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepository $admin)
    {
        $this->middleware('guest');
        $this->admin = $admin;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        session()->put('previousUrl', url()->previous());

        return view('pages.register');
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
            'name'            =>     'required|string|max:255',
            'phone'           =>     'required',
            'email'           =>     'required|string|email|max:255|unique:users',
            'password'        =>     'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

      logger("we came here");

        $id = Uuid::uuid5(Uuid::NAMESPACE_DNS, \Str::random(5));

        return User::create([
            'id'                 =>     $id,
            'name'               =>     $data['name'],
            'email'              =>     $data['email'],
            'password'           =>     bcrypt($data['password']),
            'phone'              =>     $data['phone'],
        ]);
    }


    // public function redirectTo()
    // {
    //   return str_replace(url('/'), '', session()->get('previousUrl', '/'));
    // }
}
