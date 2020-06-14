<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
<<<<<<< Updated upstream
            'fname' => ['required', 'string', 'max:20'],
            'lname' => ['required', 'string', 'max:20'],
            'bday' => ['required', 'date', 'before:'.now()],
            'sex' => ['required', 'string', Rule::in(['male', 'female'])],
=======
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
>>>>>>> Stashed changes
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'gender' => ['required'],
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
        return User::create([
<<<<<<< Updated upstream
            'first_name' => $data['fname'],
            'last_name' => $data['lname'],
            'birthday' => $data['bday'],
            'sex' => $data['sex'],
=======
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
>>>>>>> Stashed changes
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'dob' => $data['dob'],
            'gender' => $data['gender'],
        ]);
    }
}
