<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

//backend routes
Route::get('login/admin',[AdminController::class,'adminLoginForm'])->name('admin.login.form');
Route::post('admin-login',[AdminController::class,'adminLogin'])->name('admin.login');

Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/dashboard',[DashboardController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout',[DashboardController::class,'adminLogout'])->name('admin.logout');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
