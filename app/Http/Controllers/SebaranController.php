<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Province;

class SebaranController extends Controller
{
    public function index()
    {
        $sebaran = json_decode(file_get_contents(public_path('/json/provinces.json'))) ?? [];
        $user = User::with('addressNow')->where('status','verified')->get();

        $provinceUser = $user
            ->map(function ($user) {
                return $user->addressNow?->province_id;
            })
            ->filter()
            ->values()
            ->unique()
            ->toArray();

        return view('content.admin.sebaran.index', ['sebaran' => $sebaran, 'provinceUser' => $provinceUser]);
    }

    public function show($id)
    {
        $users = User::with('addressNow')->where('status','verified')->get();
        $province = Province::find($id);
        $user = $users
            ->filter(function ($user) use ($id) {
                return $user->addressNow?->province_id == $id;
            })
            ->sortBy(['generation','name'])
            ->values()
            ->toArray();

        return response()->json([
            'province' => $province->name,
            'total' => count($user),
            'users' => $user,
        ]);
    }
}
