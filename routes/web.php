<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/sign-in', function () {
    return view('signin');
});

Route::get('/sign-up', function () {
    return view('signup');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/appointment', function () {
    return view('./appointment/appointment');
});

Route::get('/appointment/new', function () {
    return view('./appointment/appointment-new');
});

Route::get('/patient', function () {
    return view('./patient/patient');
});

Route::get('/doktor', function () {
    return view('./doctor/doctor');
});

Route::get('/shcedules', function () {
    return view('./schedule/schedule');
});

Route::get('/examinations', function () {
    return view('./item/examination/examination');
});

Route::get('/items', function () {
    return view('./item/goods/item');
});

Route::get('/inventory', function () {
    return view('inventory');
});

Route::get('/pengaturan', function () {
    return view('setting');
});

Route::post('/api/appointment', [AppointmentController::class, 'store']);
Route::post('/api/sign-up', [UserController::class, 'store']);
Route::post('/api/sign-in', [UserController::class, 'signIn']);

Route::get('/api/doctors', [DoctorController::class, 'findAll']);
Route::put('/api/doctors', [DoctorController::class, 'Edit']);
Route::delete('/api/doctors/{user_id}', [DoctorController::class, 'Delete']);

Route::get('/api/patients', [PatientController::class, 'findAll']);
Route::put('/api/patients', [PatientController::class, 'Edit']);
Route::delete('/api/patients', [PatientController::class, 'Delete']);

Route::get('/api/examinations', [ItemController::class, 'findAllExams']);
Route::get('/api/items', [ItemController::class, 'findAllItems']);
Route::put('/api/item', [ItemController::class, 'Edit']);
Route::post('/api/item', [ItemController::class, 'Store']);
Route::delete('/api/item/{item_id}', [ItemController::class, 'Delete']);

Route::get('/api/schedules', [ScheduleController::class, 'findAll']);
Route::put('/api/schedule', [ScheduleController::class, 'Edit']);
Route::post('/api/schedule', [ScheduleController::class, 'Store']);
Route::delete('/api/schedule/{schedule_id}', [ScheduleController::class, 'Delete']);
