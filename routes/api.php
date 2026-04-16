<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\OrganisationController;
use App\Http\Controllers\API\OrganisationLocationController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
Route::name('api.')->group(function () {
    Route::apiResource('roles', RoleController::class);
});
});

Route::middleware('auth:sanctum')->group(function () {
Route::name('api.')->group(function () {
    Route::apiResource('organisations', OrganisationController::class);
});
});
Route::middleware('auth:sanctum')->group(function () {
Route::name('api.')->group(function () {
    Route::apiResource('organisation_locations', OrganisationLocationController::class);
});
});

Route::name('api.')->group(function () {
    Route::apiResource('users', UserController::class);
});
