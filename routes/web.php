<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Models\Organisation;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Class_;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\OrganisationLocationController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('auth.login'); // Displays the login view directly if not logged in
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('roles',RoleController::class)->middleware(['auth','verified']);
Route::get('roles-datatable',[RoleController::class, 'datatable'])->name('roles.datatable')
 ->middleware(['auth','verified']);

Route::resource('organisations',OrganisationController::class)->middleware(['auth','verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/get-states/{country_id}', [CountryController::class, 'getStates'])->name('get.states')->middleware(['auth', 'verified']);

Route::resource('organisation_locations',OrganisationLocationController::class)->middleware(['auth','verified']);
Route::get('organisation_locations/datatable/{id}',[OrganisationLocationController::class, 'datatable'])->name('organisation_locations.datatable')
 ->middleware(['auth','verified']);

require __DIR__.'/auth.php';
