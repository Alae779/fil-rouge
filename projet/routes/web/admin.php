<?php
use Illuminate\Support\Facades\Route;
USE App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('/appointments')->group(function () {
            Route::get('/', [AppointmentController::class, 'admin_show'])->name('admin_appointment');
            Route::post('/accept/{id}', [AppointmentController::class, 'accept'])->name('accept_appointment');
            Route::post('/cancel/{id}', [AppointmentController::class, 'cancel'])->name('cancel_appointment');
        });
        Route::get('/consultations', [ConsultationController::class, 'admin_show'])->name('admin_consultations');
        Route::get('/consultations/create', [ConsultationController::class, 'create'])->name('create_consultation');
        Route::post('/consultations/store', [ConsultationController::class, 'store'])->name('store_consultation');
        Route::get('/consultations/edit/{id}', [ConsultationController::class, 'edit'])->name('edit_consultation');
        Route::post('/consultations/delete/{id}', [ConsultationController::class, 'delete'])->name('delete_consultation');
        Route::post('/consultations/update/{id}', [ConsultationController::class, 'update'])->name('update_consultation');
    });
    Route::prefix('/users')->group(function () {
    Route::get('/', [UserController::class, 'show'])->name('users');
        Route::get('/search', [UserController::class, 'search'])->name('users_search');
        Route::post('/ban/{id}', [UserController::class, 'ban'])->name('ban_user');
        Route::post('/unban/{id}', [UserController::class, 'unban'])->name('unban_user');
        });
});