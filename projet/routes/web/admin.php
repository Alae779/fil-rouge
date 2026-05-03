<?php
use Illuminate\Support\Facades\Route;
USE App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('/appointments')->group(function () {
            Route::get('/', [AppointmentController::class, 'admin_show'])->name('admin_appointment');
            Route::post('/accept/{id}', [AppointmentController::class, 'accept'])->name('accept_appointment');
            Route::post('/cancel/{id}', [AppointmentController::class, 'cancel'])->name('cancel_appointment');
        });
        Route::get('/specialities', [SpecialityController::class, 'admin_show'])->name('admin_specialities');
        Route::get('/specialities/create', [SpecialityController::class, 'create'])->name('create_speciality');
        Route::post('/specialities/store', [SpecialityController::class, 'store'])->name('store_speciality');
        Route::get('/specialities/edit/{id}', [SpecialityController::class, 'edit'])->name('edit_speciality');
        Route::delete('/specialities/delete/{id}', [SpecialityController::class, 'delete'])->name('delete_speciality');
        Route::post('/specialities/update/{id}', [SpecialityController::class, 'update'])->name('update_speciality');
    });
    Route::prefix('/users')->group(function () {
    Route::get('/', [UserController::class, 'show'])->name('users');
        Route::get('/search', [UserController::class, 'search'])->name('users_search');
        Route::post('/ban/{id}', [UserController::class, 'ban'])->name('ban_user');
        Route::post('/unban/{id}', [UserController::class, 'unban'])->name('unban_user');
        });
});