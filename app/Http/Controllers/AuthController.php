<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            // Check if it's an AJAX request
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Login berhasil!',
                    'user' => [
                        'name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                    ]
                ]);
            }
            
            // Regular form submission - redirect to home
            return redirect()->intended('/')->with('success', 'Login berhasil!');
        }

        // Check if it's an AJAX request
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah.',
                'errors' => [
                    'email' => ['Email atau password salah.']
                ]
            ], 422);
        }
        
        // Regular form submission - redirect back with errors
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->except('password'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Rules\Password::defaults()],
            'phone' => 'nullable|string|max:20',
            'phone_code' => 'nullable|string|max:5',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'phone_code' => $request->phone_code ?? '+62',
        ]);

        Auth::login($user);

        // Check if it's an AJAX request
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Registrasi berhasil!',
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                ]
            ]);
        }
        
        // Regular form submission - redirect to home
        return redirect('/')->with('success', 'Registrasi berhasil! Selamat datang, ' . $user->name . '!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Check if it's an AJAX request
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Logout berhasil!'
            ]);
        }
        
        // Regular form submission - redirect to home page
        return redirect('/')->with('success', 'Logout berhasil!');
    }
}