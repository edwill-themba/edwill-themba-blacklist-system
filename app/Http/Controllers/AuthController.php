<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;

class AuthController extends Controller
{

    /**
     * displays the login view
     *
     *  @return view
     */
    public function login_view()
    {
        return view('auth.login');
    }

    /**
     * Attempt to authenticate the request's credentials
     * 
     * @return boolean
     */
    public function login(Request $request)
    {
        // validates user data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // get values from input fields
        $email = $request->input('email');
        $password = $request->input('password');
        // checks if user credentials are valid
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('success_message', 'you have logged in successfully');
        } else {
            return redirect('/login')->with('error_message', 'Invalid credentials');
        }

    }

    /**
     * displays the dashboard view
     *
     *  @return view
     */
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
