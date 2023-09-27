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

Route::get('/', function () {
    return view('welcome');
});


Route::controller(UserController::class)->group(function () {
    Route::get('applicant', 'index')->name('applicant.index');
    Route::get('degrees', 'listDegrees')->name('degrees.list');
    Route::post('applicant/store', 'store')->name('applicant.store');
    Route::get('applicant/{id}', 'findApplicant')->name('applicant.find');
    Route::put('applicant/update', 'updateDetails')->name('applicant.update');
    Route::put('applicant/disable/{id}', 'disableApplicant')->name('applicant.disable');
    Route::put('applicant/enable/{id}', 'enableApplicant')->name('applicant.enable');
    Route::post('administrator/store', 'storeAdministrator')->name('administrator.store');
});

Route::controller(ServiceController::class)->group(function () {
    Route::get('categories', 'listCategories')->name('cartegories.list');
    Route::get('services/events', 'indexEvents')->name('services.events');
    Route::get('services/supports', 'indexSupports')->name('services.supports');
    Route::post('services/store', 'store')->name('services.store');
    Route::get('services/{id}', 'findService')->name('services.find');
    Route::put('services/update', 'update')->name('services.update');
    Route::put('services/disable/{id}', 'disable')->name('services.disable');
    Route::put('services/enable/{id}', 'enable')->name('services.enable');
});

// Routes for views

Route::get('users/index', function(){
    return view('users.index');
});


