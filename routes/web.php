<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;
use App\Models\News;

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

    //Dashboard
    Route::get('/dashboard', function () {
        return view('content.admin.dashboard.index');
    })->name('dashboard')->middleware('auth');

    //News
    Route::resource('/news', NewsController::class);

    //Users
    Route::resource('/user', UserController::class);
    Route::get('/list-alumni', [UserController::class,'indexAlumni'])->name('admin.index.alumni');
    Route::get('/list-admin', [UserController::class,'indexAdmin'])->name('admin.index.admin');
    Route::get('/profile', [UserController::class,'profile'])->name('profile');

    //Web Settings
    Route::get('/web-settings',[ContentController::class, 'index'])->name('web.settings');
});

Route::get('/', function () {
    return view('layout.landing_page.layout',['news'=>News::query()->latest()->where('status','publish')->paginate(3)]);
})->name('root');

// Route::get('/adexx', function () {
//     return view('layout.landing_page.layout',['news'=>News::query()->latest()->where('status','publish')->paginate(3)]);
// })->name('adex');
