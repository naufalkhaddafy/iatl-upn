<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class SebaranController extends Controller
{
    public function index()
    {
        $sebaran = Http::get('https://wilayah.id/api/provinces.json')['data'] ?? [];
        $user = User::with('addressNow')->get();
        return view('content.admin.sebaran.index', ['sebaran' => $sebaran, 'user' => $user]);
    }
}
