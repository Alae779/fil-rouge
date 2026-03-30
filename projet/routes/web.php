<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'loginForm'])->name('login_form');
Route::get('/register', [RegisterController::class, 'RegisterForm'])->name('register_form');
Route::post('/register/register', [RegisterController::class, 'Register'])->name('register');
Route::post('/login/login', [LoginController::class, 'Login'])->name(('login'));

Route::get('/consultations', [ConsultationController::class, 'show'])->name('consultations');
Route::get('/admin/consultations', [ConsultationController::class, 'admin_show'])->name('admin_consultations');
Route::get('/admin/consultations/create', [ConsultationController::class, 'create'])->name('create_consultation');
Route::post('/admin/consultations/store', [ConsultationController::class, 'store'])->name('store_consultation');
Route::get('/admin/consultations/edit/{id}', [ConsultationController::class, 'edit'])->name('edit_consultation');
Route::post('/admin/consultations/delete/{id}', [ConsultationController::class, 'delete'])->name('delete_consultation');
Route::post('/admin/consultations/update/{id}', [ConsultationController::class, 'update'])->name('update_consultation');
Route::get('/consultations/book/{id}', [ConsultationController::class, 'reserver'])->name('reserver');
Route::post('/consultations/book/{consultation}', [ConsultationController::class, 'confirm'])->name('confirm');

Route::get('/admin/appointments', [AppointmentController::class, 'admin_show'])->name('admin_appointment');

