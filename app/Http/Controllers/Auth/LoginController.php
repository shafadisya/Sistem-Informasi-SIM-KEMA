<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';  // Default redirection for users

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
     * Override the authenticated method to redirect based on user role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return string
     */
    protected function authenticated($request, $user)
    {
        if ($user->role === 'admin') {
            // Redirect to the admin dashboard if the user is an admin
            return redirect()->route('admin.dashboard');
        }

        // Redirect to the user's home page if the user is a regular user
        return redirect()->route('home');
    }
}
