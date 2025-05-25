<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('users.login');
    }

    public function showRegister()
    {
        return view('users.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required|unique:users', // tambahkan validasi nim
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // selalu user
        ]);

        return redirect()->route('users.login')->with('success', 'Register berhasil, silakan login!');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nim', 'password'); // pakai nim

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('users.dashboard');
            }
        }
        return back()->withErrors(['nim' => 'NIM atau password salah']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('users.login');
    }
}
