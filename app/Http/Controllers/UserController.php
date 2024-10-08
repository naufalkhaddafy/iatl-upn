<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\AlumniExport;
use App\Http\Requests\UserRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $users = User::with('roles')->where('name', 'user')->paginate(10);
        $users = User::role('user')->where('status', 'verified')->latest()->get();

        $title = 'Hapus Alumni!';
        $text = 'Apakah anda yakin menghapus data alumni?';
        confirmDelete($title, $text);

        return view('content.admin.users.index', [
            'users' => $users,
            'page_meta' => [
                'title' => 'Daftar Alumni',
                'description' => 'Data Alumni yang terdaftar di sistem',
                'role' => 'Alumni',
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
        return view('content.admin.users.form', [
            'user' => new User(),
            'page_meta' => [
                'title' => 'Tambah Alumni',
                'description' => 'Daftarkan Data Alumni',
                'method' => 'post',
                'url' => route('user.store'),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $register_code = $request->register_code = 'REG-' . date('YmdHis') . Str::random(3);

        $image = $request->file('image');
        $user = User::create([...$request->validated(), 'register_code' => $register_code, 'image' => $image?->storeAs('images/users', $register_code . '.' . $image->getClientOriginalExtension())]);
        $user->assignRole('user');

        Alert::toast('Data alumni berhasil ditambahkan', 'success');
        return to_route('admin.index.alumni');
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
        //

        return view('content.admin.users.form', [
            'user' => $user,
            'page_meta' => [
                'title' => 'Edit Alumni',
                'description' => 'Data Alumni ' . $user->name,
                'method' => 'put',
                'url' => route('user.update', $user->id),
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
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
        Alert::toast('Data alumni berhasil dihapus', 'success');
        return redirect()->back();
    }

    public function export($type)
    {
        return Excel::download(new AlumniExport(), 'Data Alumni Per Tanggal ' . now()->format('d-m-Y') . '.' . $type);
    }

    public function verifikasiAlumni()
    {
        $users = User::query()->role('user')->where('status', '!=', 'verified')->orderBy('status', 'asc')->latest()->get();

        return view('content.admin.users.verifikasi', [
            'users' => $users,
            'page_meta' => [
                'title' => 'Daftar Pengajuan Alumni',
                'description' => 'Verifikasi data alumni untuk terdaftar di sistem',
                'role' => 'pending',
                // 'method' => 'post',
                // 'url' => route('user.store'),
            ],
        ]);
    }
    public function verifikasiAlumniUpdate(User $user)
    {
        $user->status = 'verified';
        $user->save();
        Alert::toast('Data Alumni berhasil di setujui', 'success');
        return redirect()->route('admin.index.alumni');
    }

    public function approvedAll()
    {
        $userId = Request()->user;
        User::whereIn('id', $userId)->update(['status' => 'verified']);

        Alert::toast('Data Alumni berhasil di setujui', 'success');
        return redirect()->route('admin.index.alumni');
    }
}
