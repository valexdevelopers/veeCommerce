<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Route::get('/admin/register', [Admin\RegisterController::class, 'show'])->name('admin.show.register');
Route::post('/admin/register', [Admin\RegisterController::class, 'create'])->name('admin.create.register');
Route::get('/admin/login', [Admin\LoginController::class, 'show'])->name('admin.show.login');
Route::post('/admin/login', [Admin\LoginController::class, 'create'])->name('admin.create.login');