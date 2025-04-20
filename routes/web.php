<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\DiagnosController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\InterfaceController;
use App\Http\Controllers\JoinUsController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecializationController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard')->middleware(middleware: 'auth');

Auth::routes();

Route::post('{user}/toggle', [AdminController::class, 'toggleStatus'])->name('toggleStatus')
    ->middleware(middleware: 'auth');

Route::group(['prefix' => 'specialization', 'middleware' => 'auth'], function () {
    Route::get('/', [SpecializationController::class, 'index'])->name('specialization_list');

    Route::get('/create', [SpecializationController::class, 'create'])->name('specialization_create');
    Route::post('/sotre', [SpecializationController::class, 'store'])->name('specialization_store');

    Route::get('/edit/{specialization}', [SpecializationController::class, 'edit'])->name('specialization_edit');
    Route::post('/update/{specialization}', [SpecializationController::class, 'update'])->name('specialization_update');

    Route::get('/delete/{specialization}', [SpecializationController::class, 'destroy'])->name('specialization_delete');
});

Route::group(['prefix' => 'service', 'middleware' => 'auth'], function () {

    Route::get('/list', [ServiceController::class, 'index'])->name('services_list');

    Route::get('/create', [ServiceController::class, 'create'])->name('service_create');
    Route::post('/sotre', [ServiceController::class, 'store'])->name('service_store');

    Route::get('/edit/{service}', [ServiceController::class, 'edit'])->name('service_edit');
    Route::post('/update/{service}', [ServiceController::class, 'update'])->name('service_update');

    Route::get('/delete/{service}', [ServiceController::class, 'destroy'])->name('service_delete');
});

Route::group(['prefix' => 'doctor', 'middleware' => 'auth'], function () {

    Route::get('/doctor-dashboard', action: [DoctorController::class, 'dashboard'])->name('doctor_dashboard');

    Route::get('/add', [DoctorController::class, 'create'])->name('doctor_create');
    Route::post('/store', [DoctorController::class, 'store'])->name('doctor_store');

    Route::get('/list', [DoctorController::class, 'index'])->name('doctor_list');

    Route::get('/show/{doctor}', [DoctorController::class, 'show'])->name('doctor_details');

    Route::get('/edit/{doctor}', [DoctorController::class, 'edit'])->name('doctor_edit');
    Route::post('/update/{doctor}', [DoctorController::class, 'update'])->name('doctor_update');

    Route::get('/edit-profile/{doctor}', [DoctorController::class, 'editProfile'])->name('doctor_edit_profile');
    Route::post('/update-profile/{user}', [DoctorController::class, 'updateProfile'])->name('doctor_update_profile');
});

Route::group(['prefix' => 'appointment', 'middleware' => 'auth'], function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('appointment_list');
    Route::get('/json', [AppointmentController::class, 'getAppointments']);

    Route::get('/create', [AppointmentController::class, 'create'])->name('appointment_create');
    Route::post('/sotre', [AppointmentController::class, 'store'])->name('appointment_store');

    Route::put('/update/{appointment}', [AppointmentController::class, 'update'])->name('appointment_update');

    Route::delete('/delete/{appointment}', [AppointmentController::class, 'destroy']);
});

Route::group(['prefix' => 'patient', 'middleware' => 'auth'], function () {

    Route::get('/list', [PatientController::class, 'index'])->name('patient_list');

    Route::get('/show/{patient}', [PatientController::class, 'show'])->name('patient_details');

});

Route::group(['prefix' => 'diagnose', 'middleware' => 'auth'], function () {

    Route::get('/list', [DiagnosController::class, 'index'])->name('diagnose_list');

    Route::get('/create', [DiagnosController::class, 'create'])->name('diagnose_create');
    Route::post('/sotre', [DiagnosController::class, 'store'])->name('diagnose_store');

    Route::get('/show/{diagnose}', [DiagnosController::class, 'show'])->name('diagnose_details');

    Route::get('/edit/{diagnose}', [DiagnosController::class, 'edit'])->name('diagnose_edit');
    Route::post('/update/{diagnose}', [DiagnosController::class, 'update'])->name('diagnose_update');

    Route::get('/delete/{diagnose}', [DiagnosController::class, 'destroy'])->name('diagnose_delete');

});

Route::group(['prefix' => 'FAQ', 'middleware' => 'auth'], function () {

    Route::get('/list', [FAQController::class, 'index'])->name('faq_list');

    Route::get('/add', [FAQController::class, 'create'])->name('faq_create');
    Route::post('/store', [FAQController::class, 'store'])->name('faq_store');

    Route::get('/show/{faq}', [FAQController::class, 'show'])->name('faq_details');

    Route::get('/edit/{faq}', [FAQController::class, 'edit'])->name('faq_edit');
    Route::post('/update/{faq}', [FAQController::class, 'update'])->name('faq_update');

    Route::get('/delete/{faq}', [FAQController::class, 'destroy'])->name('faq_delete');

});


Route::group(['prefix' => 'contact-us', 'middleware' => 'auth'], function () {

    Route::get('/list', [ContactUsController::class, 'index'])->name('contact_list');

});

Route::group(['prefix' => 'join-us', 'middleware' => 'auth'], function () {

    Route::get('/list', [JoinUsController::class, 'index'])->name('join_list');
    Route::get('/list-approve', [JoinUsController::class, 'indexApprove'])->name('approve_list');
    Route::get('/list-reject', [JoinUsController::class, 'indexReject'])->name('reject_list');
    Route::post('approve/{join}', [JoinUsController::class, 'approve'])->name('join_approve');
    Route::post('reject/{join}', [JoinUsController::class, 'reject'])->name('join_reject');

});

Route::group(['prefix' => 'credit', 'middleware' => 'auth'], function () {
    Route::get('/', [CreditController::class, 'index'])->name('credit_list');
    Route::post('accept/{credit}', [CreditController::class, 'accept'])->name('accept_payment');
    Route::post('reject/{credit}', [CreditController::class, 'reject'])->name('reject_payment');
});

Route::group(['prefix' => 'booking', 'middleware' => 'auth'], function () {
    Route::get('/', [BookingController::class, 'index'])->name('booking_list');
    Route::post('completed/{booking}', [BookingController::class, 'completed'])->name('completed_payment');
});

Route::group(['prefix' => 'payments', 'middleware' => 'auth'], function () {
    Route::get('/', [PaymentController::class, 'index'])->name('payments_list');
});

Route::get('/', [InterfaceController::class, 'home'])->name('home');
Route::get('/about', [InterfaceController::class, 'about'])->name('about');

Route::get('/service', [InterfaceController::class, 'service'])->name('service');

Route::get('/doctor', [InterfaceController::class, 'doctor'])->name('doctor');
Route::get('/faq', [InterfaceController::class, 'faq'])->name('faq');

Route::get('/contact', [InterfaceController::class, 'contact'])->name('contact');
Route::post('/contact-store', [InterfaceController::class, 'contactStore'])->name('contact_store')->middleware(middleware: 'auth');

Route::get('/join', [InterfaceController::class, 'join'])->name('join');
Route::post('/join-store', [InterfaceController::class, 'joinStore'])->name('join_store')->middleware(middleware: 'auth');

Route::get('/specialization-details/{specialization}', [InterfaceController::class, 'specializationDetails'])->name('specialization_details');
Route::get('/service-details/{service}', [InterfaceController::class, 'serviceDetails'])->name('service_details');
Route::get('/doctor-view/{doctor}', [InterfaceController::class, 'doctorView'])->name('doctor_view');

Route::get('recharge', [InterfaceController::class, 'recharge'])->name('recharge')->middleware(middleware: 'auth');
Route::post('recharge-store', [InterfaceController::class, 'rechargeStore'])->name('recharge_store')->middleware(middleware: 'auth');

Route::get('/get-doctors/{serviceId}', [InterfaceController::class, 'getDoctors']);
Route::get('/get-appointments/{user}', [InterfaceController::class, 'getAppointments']);
Route::post('/book-appointment', [InterfaceController::class, 'bookAppointment'])->middleware(middleware: 'auth')->name('book_appointment');

Route::get('/change-language/{lang}', [LanguageController::class, 'change'])
    ->name('language_change');
