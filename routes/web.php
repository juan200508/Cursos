<?php


use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
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

// Routes for the management of users
Route::controller(UserController::class)->group(function () {
    Route::get('users', 'index')->name('users.index');
    Route::get('degrees', 'listDegrees')->name('degrees.list');
    Route::post('applicant/store', 'store')->name('applicant.store');
    Route::get('applicant/{id}', 'findApplicant')->name('applicant.find');
    Route::put('users/update', 'updateDetails')->name('applicant.update');
    Route::put('user/disable/{id}', 'disableApplicant')->name('applicant.disable');
    Route::put('user/enable/{id}', 'enableApplicant')->name('applicant.enable');
    Route::post('administrator/store', 'storeAdministrator')->name('administrator.store');
});

// Routes for the management of services
Route::controller(ServiceController::class)->group(function () {
    Route::get('categories', 'listCategories')->name('cartegories.list');
    Route::get('service', 'index')->name('services.index');
    Route::post('services/store', 'store')->name('services.store');
    Route::get('services/{id}', 'findService')->name('services.find');
    Route::put('services/update', 'update')->name('services.update');
    Route::put('services/disable/{id}', 'disable')->name('services.disable');
    Route::put('services/enable/{id}', 'enable')->name('services.enable');
});

// Routes for the management of inscriptions
Route::controller(InscriptionController::class)->group(function () {
    Route::post('inscriptions/store', 'store')->name('inscriptions.store');
    Route::post('inscriptions/cancel', 'cancelInscription')->name('inscriptions.cancel');
});

// Route::get('service/index', function(){
//     return view('service.index');
// })->name('service.index');


// Route::get('users/index', function () {
//     return view('users.index');
// })->name('users.index');
