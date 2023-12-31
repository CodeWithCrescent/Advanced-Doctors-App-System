<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('welcome');})->name('Doctors Appointment System');

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function() {
    Auth::routes();
  });

Route::group(['prefix'=>'admin','middleware'=>['PreventBackHistory','IsAdmin']], function(){
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('Admin Dashboard');
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('Admin Dashboard');
    Route::get('add-doctor', [App\Http\Controllers\AdminController::class, 'addDoctorPage'])->name('Add Doctor');
    Route::post('add-doctor-action', [App\Http\Controllers\AdminController::class, 'AddDoctorAction'])->name('Dashboard | Add Doctor Action');
    Route::get('get-offices/{department_id}', [App\Http\Controllers\AdminController::class, 'GetOffices'])->name('Get Offices');
    Route::get('get-speciality/{department_id}', [App\Http\Controllers\AdminController::class, 'GetSpeciality'])->name('Get Speciality');
    Route::get('view-doctors', [App\Http\Controllers\AdminController::class, 'viewDoctors'])->name('View Doctors');
    Route::get('add-session', [App\Http\Controllers\AdminController::class, 'addSessionPage'])->name('Add Session');
    Route::post('add-session-action', [App\Http\Controllers\AdminController::class, 'AddSessionAction'])->name('Dashboard | Add Session Action');
    Route::get('view-sessions', [App\Http\Controllers\AdminController::class, 'viewSessions'])->name('View Sessions');
    Route::get('view-appointments', [App\Http\Controllers\AdminController::class, 'viewAppointments'])->name('View Appointments');
    Route::get('settings', [App\Http\Controllers\AdminController::class, 'overviewSettings'])->name('Overview Settings');
    Route::post('departments', [App\Http\Controllers\AdminController::class, 'addDepartment'])->name('Dashboard | Add Department');
    Route::post('specialities', [App\Http\Controllers\AdminController::class, 'addSpeciality'])->name('Dashboard | Add Speciality');
    Route::post('offices', [App\Http\Controllers\AdminController::class, 'addOffice'])->name('Dashboard | Add Office');
    Route::get('clients', [App\Http\Controllers\AdminController::class, 'viewClients'])->name('All Clients');
});

Route::group(['prefix'=>'doctor','middleware'=>['PreventBackHistory','IsDoctor']], function(){
    Route::get('/', [App\Http\Controllers\DoctorController::class, 'index'])->name('Doctor Dashboard');
    Route::get('dashboard', [App\Http\Controllers\DoctorController::class, 'index'])->name('Doctor Dashboard');
    Route::get('view-appointments', [App\Http\Controllers\DoctorController::class, 'viewAppointments'])->name('View Appointments');
    Route::get('view-schedules', [App\Http\Controllers\DoctorController::class, 'viewSchedules'])->name('My Schedules');
});

Route::group(['middleware'=>['PreventBackHistory','IsClient']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


