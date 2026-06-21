<?php

use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\LeaveRequestController;
use App\Http\Controllers\Admin\PayrollController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/check-role', function () {
    return auth()->user()->role;
})->middleware('auth');


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(
        function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])
                ->name('dashboard');
            Route::resource('departments', DepartmentController::class);
            Route::resource(
                'employees',
                EmployeeController::class
            );
            Route::resource(
                'attendances',
                AttendanceController::class
            );
            Route::resource('leaves', LeaveRequestController::class);
            Route::put(
                '/leaves/{leave}/status',
                [LeaveRequestController::class, 'updateStatus']
            )->name('leaves.updateStatus');
            Route::resource('payrolls', PayrollController::class);
            Route::resource('expenses', ExpenseController::class);
        }
    );