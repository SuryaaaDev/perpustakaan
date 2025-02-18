<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function indexLogin()
    {
        return view('login');
    }

    public function submitLogin(Request $request)
    {
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if($user->is_admin)
            {
                return redirect()->route('book.index');
            }
            return redirect()->route('visitor.index');
        } else {
            return redirect()->back()->with('failed', 'Email atau Password anda salah');
        }
    }

    public function indexRegistrasi()
    {
        return view('register');
    }

    public function submitRegistrasi(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
