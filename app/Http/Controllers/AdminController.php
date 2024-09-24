<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
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

        $title = 'Hapus Admin!';
        $text = 'Apakah anda yakin menghapus data admin?';
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
    public function store(AdminRequest $request)
    {
        $register_code = $request->register_code = 'REG-' . date('YmdHis') . 'Admin';
        $image = $request->file('image');
        $validate = $request->validated();
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
    public function update(AdminRequest $request, User $user)
    {
        $image = $request->file('image');

        $userData = $request->validated();

        if ($image) {
            if ($user->image && Storage::exists($user->image)) {
                Storage::delete($user->image);
            }
            $userData['image'] = $image->storeAs('images/users/' . $user->register_code . '.' . $image->getClientOriginalExtension());
        } elseif ($request->deleteImage) {
            if ($user->image && Storage::exists($user->image)) {
                Storage::delete($user->image);
            }
            $userData['image'] = null;
        }

        if ($request->filled('password')) {
            $userData['password'] = bcrypt($request->password);
        } else {
            unset($userData['password']);
        }

        $user->update($userData);

        Alert::toast('Berhasil Merubah Data', 'success');
        return back();
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
