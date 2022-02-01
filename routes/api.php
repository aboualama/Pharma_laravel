<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PharmaController;
use LdapRecord\Models\ActiveDirectory\User;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\PaymentRequestController;



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


Route::group(['middleware' => ['api']], function () {
    Route::post('login', [UserController::class,'login']);
});




Route::group(['middleware' => ['auth', 'verified']], function () {


    Route::get('/pharmacies', [PharmaController::class,'getall']);
    Route::post('/pharmacies', [PharmaController::class,'index']);
    Route::post('/pharmacy', [PharmaController::class,'store']);
    Route::get('/pharmacy/{id}', [PharmaController::class,'show']);
    Route::post('/pharmacy/{id}', [PharmaController::class,'update']);
    Route::delete('/pharmacy/{id}', [PharmaController::class,'destroy']);

    Route::get('/medicines', [MedicineController::class,'index']);
    Route::post('/medicine', [MedicineController::class,'store']);
    Route::get('/medicine/{id}', [MedicineController::class,'show']);
    Route::put('/medicine/{id}', [MedicineController::class,'update']);
    Route::delete('/medicine/{id}', [MedicineController::class,'destroy']);

    Route::get('/payment_requests', [PaymentRequestController::class,'index']);
    Route::post('/payment_request', [PaymentRequestController::class,'store']);
    Route::get('/payment_request/{id}', [PaymentRequestController::class,'show']);
    Route::put('/payment_request/{id}', [PaymentRequestController::class,'update']);
    Route::delete('/payment_request/{id}', [PaymentRequestController::class,'destroy']);
    Route::post('/newPaymentRdr', [PaymentRequestController::class,'newPaymentRdr']);


});
