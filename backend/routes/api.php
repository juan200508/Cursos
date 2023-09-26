<?php

use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(UserController::class)->group(function (){
    Route::get('applicant', 'index')->name('applicant.index');
    Route::get('degrees', 'listDegrees')->name('degrees.list');
    Route::post('applicant/store', 'store')->name('applicant.store');
    Route::get('applicant/{id}', 'findApplicant')->name('applicant.find');
    Route::put('applicant/update', 'updateDetails')->name('applicant.update');
    Route::put('applicant/disable/{id}', 'disableApplicant')->name('applicant.disable');
});
