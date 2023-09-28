<?php

use App\Http\Controllers\AuthController;
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

Route::middleware('auth')->group(function () {
    // Routes for the management of users
    Route::middleware(['role:administrador'])->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('users', 'index')->name('users.index');
            Route::get('create', 'listDegrees')->name('users.store');
            Route::post('applicant/store', 'store')->name('applicant.store');
            Route::get('applicant/{id}', 'findApplicant')->name('applicant.find');
            Route::put('user/disable/{id}', 'disableApplicant')->name('applicant.disable');
            Route::put('user/enable/{id}', 'enableApplicant')->name('applicant.enable');
            Route::post('administrator/store', 'storeAdministrator')->name('administrator.store');
        });

        Route::controller(ServiceController::class)->group(function () {
            Route::get('categories', 'listCategories')->name('cartegories.list');
            Route::post('services/store', 'store')->name('services.store');
            Route::get('services/{id}', 'findService')->name('services.find');
            Route::post('services/update', 'update')->name('services.update');
            Route::put('services/disable/{id}', 'disable')->name('services.disable');
            Route::put('services/enable/{id}', 'enable')->name('services.enable');
        });
    });

    // Routes for the management of services
    Route::controller(ServiceController::class)->group(function () {
        Route::get('service', 'index')->name('services.index');
    });

    // Routes for the management of inscriptions
    Route::middleware(['role:aspirante'])->group(function () {
        Route::controller(InscriptionController::class)->group(function () {
            Route::post('inscriptions/store/{id}', 'store')->name('inscriptions.store');
            Route::post('inscriptions/cancel/{id}', 'cancelInscription')->name('inscriptions.cancel');
        });

        Route::get('applicant/{id}', [UserController::class, 'editApplicant'])->name('applicant.edit');
        Route::post('applicant/update', [UserController::class, 'updateApplicant'])->name('applicant.update');
        Route::controller(ServiceController::class)->group(function () {
            Route::get('inscriptions', 'inscriptions')->name('inscriptions');
        });
    });
});

// Help with tabine for autocomplete some code lines
Route::controller(AuthController::class)->group(function () {
    Route::post('auth/login', 'login')->name('login');
    Route::post('auth/logout', 'logout')->name('logout');
});

Route::get('login', function () {
    return view('autentication.login');
})->name('autentication.login');
