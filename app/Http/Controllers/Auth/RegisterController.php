<?php

namespace App\Http\Controllers\Auth;
//namespace App\Http\Controllers;
//use Mail;
use App\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Mail\UserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


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
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    // public function ship(Request $request, $orderId)
    // {
    //     $user = User::findOrFail($orderId);

    //     // Ship order...

    //     Mail::to($request->user())->send(new UserRegister($user));
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }
    // 
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'code_verify' => str_random(10),
        ]);

        Mail::to($data['email'])->send(new UserRegister($user));



        return $user;
        
    }

    public function verify ($token) {

dd($token);


$user = DB::table('users')->select('code_verify')->where('code_verify', $token)->get();

dd($user);
if($user) {

    DB::table('users')
    ->where('code_verify', $token)
    ->update(['reg_status' => 'activated']);
}

    }
}
