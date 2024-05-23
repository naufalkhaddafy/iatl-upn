<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Auth without login
Route::get('/login', [AuthController::class, 'login'])->name('user.login')->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->name('user.register')->middleware('guest');
Route::post('/login', LoginController::class)->name('login');



Route::middleware('auth')->group(function () {
    // Auth with login
    Route::post('/logout', LogoutController::class)->name('logout');

    //dashboard
    Route::get('/dashboard', function () {
        return view('content.admin.dashboard.index');
    })->name('dashboard')->middleware('auth');

    //News
    Route::resource('/news', NewsController::class)->parameters([
        'news' => 'news:slug',
    ]);;
    //Users
    Route::resource('/user', UserController::class);
});

Route::get('/', function () {
    return view('welcome');
})->name('root');

Route::get('/adexx', function () {
    return view('layout.landing_page.layout');
})->name('adex');
