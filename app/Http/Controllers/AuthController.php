<?php

namespace App\Http\Controllers;

// Load internal component
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    // Login
    public function login(){
        return view('pages/login');
    }

    public function loginPost(Request $request){
        // Validasi input
        $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required', 'string'],
        ]);

        // Mencoba login menggunakan input
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            // Membuat session
            request()->session()->regenerate();

            // Redirect jika aksi berhasil
            return redirect()->route('app.index');
        }

        // Tampilkan pesan jika aksi gagal
        return back()->withErrors([
            'email'     => "Is the email valid?",
            'password'  => "Is the password correct?",
        ])->with('class', 'warning')->with('message', 'Login Failed');
    }

    // Logout
    public function logout(){
        // Melakukan logout
        Auth::logout();
 
        // Membatalkan session
        request()->session()->invalidate();
        
        // Membuat token autentikasi baru
        request()->session()->regenerateToken();

        // Redirect jika aksi berhasil
        return redirect()->route('login')->with('class', 'info')->with('message', 'Logout Success');
    }
}
