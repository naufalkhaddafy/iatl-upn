<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // $userProvince = auth()->user()->addressNow?->province_id;
        // $sebaran = Http::get('https://wilayah.id/api/regencies/' . $userProvince . '.json')['data'];
        // $user = User::with('addressNow')->get();
        // $sebaranByUserLogin= $user->filter(function($user) use ($userProvince){
        //     return $user->addressNow?->province_id == $userProvince;
        // })->values()->toArray();

        // dd($sebaranByUserLogin);
        return view('content.admin.dashboard.index');
    }
}
