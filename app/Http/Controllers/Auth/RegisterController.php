<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


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
    protected $redirectTo = '/show-registered-data';

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
            'fname'=> ['required', 'string', 'max:255'],
            'idno'=> [ 'string', 'max:255'],
            'uname'=> ['string', 'max:255', 'unique:users'],
            'password'=> ['required', 'string', 'min:8', 'confirmed'],

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
            'fname' => $data['fname'],
            'minitial' => $data['minitial'],
            'lname' => $data['lname'],
            'uname' => $data['uname'],
            'sex' => $data['sex'],
            'bday' => $data['bday'],
            'position' => $data['position'],
            'division' => $data['division'],
            'unit' => $data['unit'],
            'idno' => $data['idno'],
            'password' => Hash::make($data['password']),

        ]);
        return redirect('/show-registered-data')->with('status', 'register-success');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            //other validation rules
            'sex'=>'required|in:male, female',
        ]);
    }

    public function showRegistrationForm()
{
    return view('auth.register');
}

    


}
