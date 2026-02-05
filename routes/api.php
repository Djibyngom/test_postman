<?php

// routes/api.php

use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('patients',    PatientController::class);
Route::apiResource('doctors',     DoctorController::class);
Route::apiResource('appointments', AppointmentController::class);

