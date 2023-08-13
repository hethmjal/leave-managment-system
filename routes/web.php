<?php

use App\Http\Controllers\AdminLeaveRequestController;
use App\Http\Controllers\EmployeeLeaveRequestController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('leave-types', LeaveTypeController::class);
    Route::resource('leave-requests', EmployeeLeaveRequestController::class);
    Route::get('/admin/leave-requests', [AdminLeaveRequestController::class, 'index'])
    ->name('admin.leave-requests');

    Route::get('/admin/leave-requests/{id}/accept', [AdminLeaveRequestController::class, 'accept'])
    ->name('admin.leave-requests.accept');

    Route::get('/admin/leave-requests/{id}/reject', [AdminLeaveRequestController::class, 'rejectPage'])
    ->name('admin.leave-requests.reject');

    Route::post('/admin/leave-requests/{id}/reject', [AdminLeaveRequestController::class, 'reject'])
    ->name('admin.leave-requests.reject');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
