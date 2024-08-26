<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


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

    public function profile()
    {
        return view('content.admin.users.profile', ['user' => auth()->user()]);
    }

    public function update(UserRequest $request)
    {


        $image = $request->file('image');
        if ($image) {
            $userUpdate = $request->user()->update([...$request->validated(), 'image' => $image->storeAs('images/users/', $request->nim . '.' . $image->getClientOriginalExtension())]);
            if (Storage::exists($request->image)) {
                Storage::delete($request->image);
            }
        } else {
            $userUpdate = $request->user()->update($request->validated());
        }

        Alert::toast('Berhasil Merubah Data', 'success');
        return back();
    }

    public function updatePassword(Request $request)
    {
        // dd(Request()->all());
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'min:5', 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
        Alert::toast('Berhasil Merubah Password', 'success');
        return back();
    }
}
