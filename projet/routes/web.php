<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
USE App\Http\Middleware\AdminMiddleware;
USE App\Http\Middleware\ActiveMiddleware;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'loginForm'])->name('login_form');
Route::get('/register', [RegisterController::class, 'RegisterForm'])->name('register_form');
Route::post('/register/register', [RegisterController::class, 'Register'])->name('register');
Route::post('/login/login', [LoginController::class, 'Login'])->name(('login'));
Route::get('/logout', [LogoutController::class, 'logout'])->name(('logout'));
Route::get('/consultations', [ConsultationController::class, 'show'])->name('consultations');
Route::get('/appointments/filter', [AppointmentController::class, 'filter'])->name('filter');

Route::middleware([ActiveMiddleware::class])->group(function () {
    Route::get('/consultations/book/{id}', [ConsultationController::class, 'reserver'])->name('reserver');
    Route::post('/consultations/book/{consultation}', [ConsultationController::class, 'confirm'])->name('confirm');
    Route::get('/consultations/book/success/{consultation}', [ConsultationController::class, 'bookingSuccess'])->name('booking_success');
    Route::post('/appointments/cancel/{id}', [AppointmentController::class, 'cancel_my_appointment'])->name('cancel_my_appointment');
});
include "web/admin.php";

Route::get('/appointments', [AppointmentController::class, 'show'])->name('appointments');
Route::get('/appointments/specify', [ConsultationController::class, 'specify'])->name('specify');

