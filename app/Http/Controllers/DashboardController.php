<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Regency;

class DashboardController extends Controller
{
    public function index()
    {
        $userProvince = auth()->user()->addressNow?->province_id;
        $regencies = json_decode(file_get_contents(public_path('/json/regencies.json'))) ?? [];

        $user = User::with('addressNow')->where('status', 'verified')->get();
        $sebaranByUserLogin = $user
            ->filter(function ($user) use ($userProvince) {
                return $user->addressNow?->province_id == $userProvince;
            })
            ->values()
            ->toArray();
        $addressNow = collect($sebaranByUserLogin)->pluck('address_now_id')->unique()->toArray();
        return view('content.admin.dashboard.index', [
            'regencies' => $regencies,
            'alumniNearest' => $addressNow,
        ]);
    }

    public function showNearest($id)
    {
        $regency = Regency::findOrFail($id);
        $user = User::with('addressNow')->where('status', 'verified')->get();

        $sebaranByUserLogin = $user
            ->filter(function ($user) use ($id) {
                return $user->address_now_id == $id;
            })
            ->sortBy(['generation','name'])
            ->values()
            ->toArray();

        return response()->json([
            'regency' => $regency->name,
            'total' => count($sebaranByUserLogin),
            'users' => $sebaranByUserLogin,
        ]);
    }
}
