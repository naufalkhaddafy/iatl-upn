<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SebaranController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
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
Route::get('/login', [AuthController::class, 'login'])
    ->name('user.login')
    ->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->name('user.register');
Route::post('/login', LoginController::class)->name('login');

Route::post('/register', [AuthController::class, 'registerAlumni'])->name('register.alumni');

Route::middleware('auth')->group(function () {
    // Auth with login
    Route::post('/logout', LogoutController::class)->name('logout');
    Route::get('/settings/profile', [AuthController::class, 'profile'])->name('settings.profile');
    Route::put('/settings/{user}/profile', [AuthController::class, 'update'])->name('settings.profile.update');
    Route::put('/settings/profile/password', [AuthController::class, 'updatePassword'])->name('settings.profile.update.password');

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->middleware('auth');
    Route::group(['middleware' => ['role:admin']], function () {
        //News
        Route::resource('/news', NewsController::class);
        //Users
        Route::resource('/user', UserController::class);
        Route::get('/list-alumni', [UserController::class, 'indexAlumni'])->name('admin.index.alumni');
        Route::get('/verifikasi/alumni', [UserController::class, 'verifikasiAlumni'])->name('admin.verifikasi.alumni');
        Route::put('/verifikasi/alumni/{user}', [UserController::class, 'verifikasiAlumniUpdate'])->name('admin.verifikasi.alumni.update');
        Route::get('/list-admin', [UserController::class, 'indexAdmin'])->name('admin.index.admin');
        Route::get('/admin/export/alumni/{type}', [UserController::class, 'export'])->name('admin.export.alumni');
        //Web Settings
        Route::get('/web-settings', [ContentController::class, 'index'])->name('web.settings');
    });

    // Sebaran
    Route::get('/sebaran/alumni', [SebaranController::class, 'index'])->name('sebaran.alumni');
    Route::get('/sebaran/alumni/{id}', [SebaranController::class, 'show'])->name('sebaran.alumni.detail');
});

Route::get('/', function () {
    return view('layout.landing_page.layout', ['news' => News::with('user')->latest()->where('status', 'publish')->paginate(3)]);
})->name('root');
