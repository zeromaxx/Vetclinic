<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AppController;
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

Route::get('/', function () {
    return view('home');
});
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('home', [AppController::class, 'home'])->name('home');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('process_register', [AuthController::class, 'process_register'])->name('process_register');
Route::post('process_login', [AuthController::class, 'process_login'])->name('process_login');
Route::get('services', [AppController::class, 'services'])->name('services');

Route::get('forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/user_profile/{id}', [AppController::class, 'user_profile'])->name('user_profile');
    Route::get('/edit_user/{id}', [AppController::class, 'edit_user'])->name('edit_user');
    Route::get('/delete_pet/{id}', [AppController::class, 'delete_pet'])->name('delete_pet');
    Route::get('/edit_pet/{id}', [AppController::class, 'edit_pet'])->name('edit_pet');
    Route::get('/edit_appointment/{id}', [AppController::class, 'edit_appointment'])->name('edit_appointment');
    Route::patch('/update_pet/{id}', [AppController::class, 'update_pet'])->name('update_pet');
    Route::patch('/update_user/{id}', [AppController::class, 'update_user'])->name('update_user');
    Route::patch('/update_appointment/{id}', [AppController::class, 'update_appointment'])->name('update_appointment');
    Route::get('add_pet', [AppController::class, 'add_pet'])->name('add_pet');
    Route::get('create_appointment', [AppController::class, 'create_appointment'])->name('create_appointment');
    Route::get('my_appointments', [AppController::class, 'my_appointments'])->name('my_appointments');
    Route::get('users', [AppController::class, 'users'])->name('users');
    Route::get('delete_user/{id}', [AppController::class, 'delete_user'])->name('delete_user');
    Route::post('users', [AppController::class, 'users'])->name('users');
    Route::post('create_appointment', [AppController::class, 'create_appointment'])->name('create_appointment');
    Route::get('sec_create_appointment/{id}', [AppController::class, 'sec_create_appointment'])->name('sec_create_appointment');
    Route::post('submit_sec_create_appointment', [AppController::class, 'submit_sec_create_appointment'])->name('submit_sec_create_appointment');
    Route::get('appointments', [AppController::class, 'appointments'])->name('appointments');
    Route::get('add_examination/{pet_id}/{appointment_id}', [AppController::class, 'add_examination'])->name('add_examination');
    Route::post('submit_examination', [AppController::class, 'submit_examination'])->name('submit_examination');
    Route::get('request_appointment/{id}', [AppController::class, 'request_appointment'])->name('request_appointment');
    Route::get('confirm_appointment/{id}', [AppController::class, 'confirm_appointment'])->name('confirm_appointment');
    Route::get('cancel_appointment/{id}', [AppController::class, 'cancel_appointment'])->name('cancel_appointment');
    Route::post('submit_add_pet', [AppController::class, 'submit_add_pet'])->name('submit_add_pet');
    Route::get('user_records', [AppController::class, 'user_records'])->name('user_records');
    Route::get('remove_examination/{id}', [AppController::class, 'remove_examination'])->name('remove_examination');
    Route::get('show_exam_record/{id}', [AppController::class, 'show_exam_record'])->name('show_exam_record');
    Route::get('visit_records', [AppController::class, 'visit_records'])->name('visit_records');
});
