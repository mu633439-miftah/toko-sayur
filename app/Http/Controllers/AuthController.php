<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // tampilkan halaman registrasi user
    public function showRegisForm()
    {
        return view('auth.register');
    }

    // store regis user
    public function store(Request $request)
    {
        try {

            $validasi = $request->validate([
                'name' => ['string', 'required', 'min:2'],
                'username' => ['string', 'required', 'unique:users,username'],
                'email' => ['string', 'required', 'unique:users,email'],
                'no_wa' => ['string', 'max:13'],
                'password' => ['required', 'string', 'min:8'],
                'password_confirm' => ['required', 'string', 'min:8', 'same:password'],
            ]);

            DB::beginTransaction();

            $validasi['role'] = 'user';
            $validasi['password'] = Hash::make($validasi['password']);

            User::create($validasi);

            DB::commit();
            return redirect()->route('login')->with('success', 'Berhasil membuat akun');
        } catch (\Throwable $e) {

            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Gagal membuat akun');
        }
    }

    // Tampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                if (Auth::user()->role == 'admin') {
                    return redirect()->route('dashboard');
                } elseif (Auth::user()->role == 'user') {
                    return redirect()->route('home');
                }
            }

            return redirect()->route('login')->withInput()->with('error', 'Username atau password salah.');
        } catch (\Exception $e) {
            return redirect()->route('login')->withInput()->with('error', 'Username atau password salah.');
        }
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }
}
