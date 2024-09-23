<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::role('admin')->latest()->paginate(10);

        $title = 'Hapus Alumni!';
        $text = 'Apakah anda yakin menghapus data alumni?';
        confirmDelete($title, $text);

        return view('content.admin.admin.index', [
            'users' => $users,
            'page_meta' => [
                'title' => 'Daftar Admin',
                'description' => 'Data Admin yang terdaftar di sistem',
                'role' => 'Admin',
                // 'method' => 'post',
                // 'url' => route('user.store'),
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.admin.admin.form', [
            'user' => new User(),
            'page_meta' => [
                'title' => 'Tambah Admin',
                'description' => 'Daftarkan Data Admin',
                'method' => 'post',
                'url' => route('admin.store.admin'),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $register_code = $request->register_code = 'REG-' . date('YmdHis') . 'Admin';
        $validate = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($request?->id)],
            'password' => 'required|min:5|confirmed',
            'phone_number' => ['nullable', 'digits_between:7,15', 'numeric'],
        ]);
        $image = $request->file('image');
        $user = User::create([...$validate, 'isPremium' => true, 'premium_at' => now(), 'status' => 'verified', 'register_code' => $register_code, 'image' => $image?->storeAs('images/users', $register_code . '.' . $image->getClientOriginalExtension())]);
        $user->assignRole('admin');

        Alert::toast('Data admin berhasil ditambahkan', 'success');
        return to_route('admin.index.admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('content.admin.admin.form', [
            'user' => $user,
            'page_meta' => [
                'title' => 'Edit Admin',
                'description' => 'Data Admin ' . $user->name,
                'method' => 'put',
                'url' => route('admin.update.admin', $user->id),
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (Storage::exists(!$user->image)) {
            Storage::delete($user->image);
        }
        $user->delete();
        Alert::toast('Data admin berhasil dihapus', 'success');
        return redirect()->back();
    }
}
