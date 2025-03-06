<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('dashboard.master.app');
})->name('adminDashboard');

Auth::routes();

Route::group(['prefix' => 'doctor'], function () {

    Route::get('/doctor-dashboard', [DoctorController::class, 'dashboard'])->name('doctor_dashboard');

    Route::get('/add', [DoctorController::class, 'create'])->name('doctor_create');
    Route::post('/store', [DoctorController::class, 'store'])->name('doctor_store');

    Route::get('/list', [DoctorController::class, 'index'])->name('doctor_list');

    Route::get('/show/{doctor}', [DoctorController::class, 'show'])->name('doctor_details');
    
    Route::get('/edit/{doctor}', [DoctorController::class, 'edit'])->name('doctor_edit');
    Route::post('/update/{doctor}', [DoctorController::class, 'update'])->name('doctor_update');
    Route::post('/availability', [DoctorController::class, 'availability'])->name('doctor_availability');

    Route::get('/edit-profile/{doctor}', [DoctorController::class, 'editProfile'])->name('doctor_edit_profile');
    Route::post('/update-profile/{user}', [DoctorController::class, 'updateProfile'])->name('doctor_update_profile');
});


Route::post('{user}/toggle', [AdminController::class, 'toggleStatus'])->name('toggleStatus');
// ->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
