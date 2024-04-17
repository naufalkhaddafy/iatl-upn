<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validatelogin = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Harus di Isi',
            'password.required' => 'Password harus di Isi',
        ]);
        if (Auth::attempt($validatelogin)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with('failed', 'Periksa Kembali Username dan Password');
    }
}
