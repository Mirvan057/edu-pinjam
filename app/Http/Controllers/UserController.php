<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registration( Request $request ){
        $validate = $request->validate([
            'nama' => 'required|min:4|max:255',
            'email' => 'required|email:dns|unique:users',
            'noHp' => 'required|min:12|max:13',
            'password'=> 'required|min:5|max:255',
        ]);       

        $validate['password'] = Hash::make($validate['password']);
        $validate['role'] = "peminjam";

        User::create($validate);
    

        return redirect('/login')->with('success', 'Behasil daftar, Silahkan login');

}
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('error','login failed');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
}
}