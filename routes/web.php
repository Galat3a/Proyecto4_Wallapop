<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Support\Facades\Auth;

Route::get('/', [SaleController::class, 'index']); 
Route::resource('sales', SaleController::class); 
Route::resource('settings', SettingController::class);
Route::resource('images', ImageController::class); 
Route::resource('categorias', CategoriaController::class); 

Auth::routes(['verify' => true]);
Route::get('admin', [App\Http\Controllers\AdministratorsController::class, 'index'])->name('admin.index');
Route::get('super', [App\Http\Controllers\AdministratorsController::class, 'indexSuper'])->name('super.index');


Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
