<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecializationController;
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


Route::group(['prefix' => 'specialization'], function () {
    Route::get('/', [SpecializationController::class, 'index'])->name('specialization_list');

    Route::get('/create', [SpecializationController::class, 'create'])->name('specialization_create');
    Route::post('/sotre', [SpecializationController::class, 'store'])->name('specialization_store');

    Route::get('/edit/{specialization}', [SpecializationController::class, 'edit'])->name('specialization_edit');
    Route::post('/update/{specialization}', [SpecializationController::class, 'update'])->name('specialization_update');

    Route::get('/delete/{specialization}', [SpecializationController::class, 'destroy'])->name('specialization_delete');
});


Route::group(['prefix' => 'service'], function () {
    Route::get('/', [ServiceController::class, 'index'])->name('service_list');

    Route::get('/create', [ServiceController::class, 'create'])->name('service_create');
    Route::post('/sotre', [ServiceController::class, 'store'])->name('service_store');

    Route::get('/edit/{service}', [ServiceController::class, 'edit'])->name('service_edit');
    Route::post('/update/{service}', [ServiceController::class, 'update'])->name('service_update');

    Route::get('/delete/{service}', [ServiceController::class, 'destroy'])->name('service_delete');
});



Route::group(['prefix' => 'doctor'], function () {

    Route::get('/doctor-dashboard', [DoctorController::class, 'dashboard'])->name('doctor_dashboard');

    Route::get('/add', [DoctorController::class, 'create'])->name('doctor_create');
    Route::post('/store', [DoctorController::class, 'store'])->name('doctor_store');

    Route::get('/list', [DoctorController::class, 'index'])->name('doctor_list');

    Route::get('/show/{doctor}', [DoctorController::class, 'show'])->name('doctor_details');

    Route::get('/edit/{doctor}', [DoctorController::class, 'edit'])->name('doctor_edit');
    Route::post('/update/{doctor}', [DoctorController::class, 'update'])->name('doctor_update');
    

    Route::get('/edit-profile/{doctor}', [DoctorController::class, 'editProfile'])->name('doctor_edit_profile');
    Route::post('/update-profile/{user}', [DoctorController::class, 'updateProfile'])->name('doctor_update_profile');
});


Route::post('{user}/toggle', [AdminController::class, 'toggleStatus'])->name('toggleStatus');
// ->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
