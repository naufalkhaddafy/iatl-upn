<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::query()->where('role', false)->latest()->paginate(10);
        return view('content.admin.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.admin.users.form', [
            'user' => new User(),
            'page_meta'=> [
                'title'=>'Tambah Alumni',
                'description'=> 'Daftarkan Data Alumni',
                'method'=> 'post',
                'url'=> route('user.store'),
            ]
        ] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $image = $request->file('image');
        if($image){
            User::create([...$request->validated(),'image'=> $image->storeAs('images/users', $request->nim .'.'. $image->getClientOriginalExtension())]);
        }else{
            User::create($request->validated());
        }
        Alert::toast('Data Alumni Berhasil ditambahkan', 'success');
        return to_route('user.index');
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
            'page_meta'=> [
                'title'=>'Edit Alumni',
                'description'=> 'Edit Data Alumni ' . $user->name,
                'method'=> 'put',
                'url'=> route('user.update',$user->id),
            ]
        ] );
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
        if (Storage::exists($user->image)) {
            Storage::delete($user->image);
        }
        $user->delete();
        Alert::toast('Data Alumni Berhasil dihapus', 'success');
        return to_route('user.index');
    }

    public function profile()
    {
        return view('content.admin.users.profile', ['user' => auth()->user()]);
    }
}
