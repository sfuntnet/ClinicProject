<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::prefix('/profile')->group(function () {
    Route::resource('/add-doctor', \Profile\DoctorController::class)->only('create', 'index');
});
Route::resource('make-appointment', MakeAppointment::class);



