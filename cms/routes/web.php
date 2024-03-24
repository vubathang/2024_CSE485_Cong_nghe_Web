<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegularController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', [RegularController::class, 'about'])->name('about');
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
 
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
 
//Normal Users Routes List
Route::middleware(['auth', 'user-access:regular'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('profile', [RegularController::class, 'profile'])->name('profile');
    Route::post('profile', [RegularController::class, 'updateProfile'])->name('profile.save');
    Route::resource('departments', DepartmentController::class);
});

    //Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    Route::get('home', [HomeController::class, 'adminHome'])->name('admin/home');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin/profile');
    Route::post('profile', [AdminController::class, 'updateProfile'])->name('admin.profile.save');
    Route::resource('users', UserController::class);
    Route::resource('departments', DepartmentController::class);
});
