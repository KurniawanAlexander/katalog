<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
/*
|--------------------------------------------------------------------------
| Frontend Routes (Guest)
|--------------------------------------------------------------------------
*/

// Halaman utama frontend
// Route::get('/', function () {
//     return view('frontend.home'); // ganti sesuai file blade frontend kamu
// })->name('frontend.home');

Route::get('/menu', [FrontendController::class, 'index'])->name('frontend.index');

Route::get('/menu/{menu}/detail', [FrontendController::class, 'showMenuApi']);


// Halaman lain di frontend (opsional)
Route::get('/about', function () {
    return view('frontend.about');
})->name('frontend.about');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Login form hanya untuk guest
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login');

// Logout hanya POST

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes (Auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
});
