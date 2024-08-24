<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;



class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerAlumni(UserRequest $request)
    {
        $user = User::create($request->validated());
        $user->assignRole('user');

        Alert::toast('Akun berhasil ditambahkan, Silahkan login', 'success');
        return to_route('login');
    }


}
