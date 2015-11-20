<?php

namespace SnapShot\Http\Controllers\Auth;

use SnapShot\User;
use Validator;
use Mail;
use SnapShot\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function doSignUp(Request $request)
    {
        // Validate the Request
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        // Take action when the Validator fails
        if ($validator->fails()) {
            return redirect('/user/sign-up')
              ->withErrors($validator)
              ->withInput();
        }

        $credentials = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if(Auth::attempt($credentials)) {
            // uncomment this to send registration confirmation mail
            // $this->sendMail('emails.registration-confirmation', $user);
            Session::flash('flash_message', 'You have successfully registered');
            return redirect('gallery/list');
        }

        Session::flash('flash_error', 'Something went wrong with your credentials while sign up.');
        return redirect('/user/sign-up');
    }

    public function doLogin(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if(!Auth::attempt($credentials)) {
            Session::flash('flash_error', 'Something went wrong with your credentials');
            return redirect()->back();
        }

        Session::flash('flash_message', 'You have successfully logged in');
        return redirect('gallery/list');
    }

    private function sendMail($template, $user)
    {
        // Send mail
        Mail::send($template, ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Registration Confirmation');
        });
    }
}
