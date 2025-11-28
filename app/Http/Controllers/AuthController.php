<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Login
    public function login(Request $request)
   {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Jika admin
        if (Auth::user()->role === 'admin') {
            return redirect()->route('dashboard');
        }

        // Jika user biasa
        return redirect()->route('dataahliwaris.index');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
    }
    // Tampilkan halaman register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

    $user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'role' => 'user', // default role
]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silahkan login.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function userList()
    {
    $users = \App\Models\User::all();
    return view('users.index', compact('users'));
    }
}
