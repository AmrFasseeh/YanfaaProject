<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getSignup() // returns the signup form view
    {
        return view('user.signup');
    }

    public function postSignup(Request $request) 
    {
        // receives the signup data from the form, validates it and then add a new user to the DB
        // then logs the new user in automaticaly 
        $this->validate($request ,[
            'name' => 'required|string',
            'email' =>'required|email|unique:users',
            'password' => 'required|min:4|confirmed'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();

        Auth::login($user);

        return redirect()->route('home');
    }

    public function getSignin() // returns the signin form view
    {
        return view('user.signin');
    }

    public function postSignin(Request $request)
    {
        // recieves the email and password, validates them and then attempts to login if successful returns to the url visited
        // if that url needed to be authenticated otherwise it returns to the home route. 
        $this->validate($request ,[
            'email' =>'required|email',
            'password' => 'required|min:4'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            if($request->session()->has('oldUrl')){
                $url = $request->session()->get('oldUrl');
                $request->session()->forget('oldUrl');
                return redirect($url);
            }
            return redirect()->route('home');
        }

        return redirect()->back();
    }

    public function getProfile(Request $request) // returns the profile view of the current user
    {
            return view('user.profile');
    }

    public function getLogout(Request $request) // logout the current authenticated user
    {
        Auth::logout();
        return redirect()->route('user.signin');
    }
}
