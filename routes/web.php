<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CategoriaController;

Route::get('/', [SaleController::class, 'index']); 
Route::resource('sales', SaleController::class); 
Route::resource('settings', SettingController::class);
Route::resource('images', ImageController::class); 
Route::resource('categorias', CategoriaController::class); 
