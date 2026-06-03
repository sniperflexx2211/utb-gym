<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GymClassController;
use App\Http\Controllers\Api\EnrollmentController;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('gym-classes', GymClassController::class);
Route::apiResource('enrollments', EnrollmentController::class);
Route::get('/test-enrollments', function() {
    return \App\Models\Enrollment::limit(5)->get();
});