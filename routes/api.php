<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'UserController@login');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/Profile')->group(function () {
    Route::resource('doctor-add', \Profile\DoctorController::class);
    Route::put('doctor-update', [\App\Http\Controllers\Profile\DoctorController::class, 'doctorUpdate'])->name('doctor.update');
    Route::delete('active-appointment/{id}', [\App\Http\Controllers\Profile\DoctorController::class, 'appointmentActive'])->name('doctor.appointmentActive');
});

Route::post('appointment-make/{id}',[\App\Http\Controllers\MakeAppointment::class,'store'])->name('appointment-make');
