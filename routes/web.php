<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidatorController;
use App\Http\Controllers\ISPController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplyController;
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



Route::get('', [UserController::class,'index']);
Route::post('user/auth', [UserController::class,'auth'])->name('user.auth');
Route::get('register', [UserController::class,'register_view']);
Route::post('register', [UserController::class, 'register'])->name('user.register');
Route::post('user/auth', [UserController::class,'auth'])->name('user.auth');

Route::get('validator', [ValidatorController::class,'index']);
Route::post('validator/auth', [ValidatorController::class,'auth'])->name('validator.auth');
Route::get('isp', [ISPController::class,'index']);
Route::post('isp/auth', [ISPController::class,'auth'])->name('isp.auth');

Route::group(['middleware'=>'validator_auth'],function(){

    Route::get('validator/request', [ApplyController::class,'validator_load']);
    Route::get('validator/request/details/{$id}', [ApplyController::class,'details']);
    Route::get('validator/request/validation/{validation}/{id}', [ApplyController::class,'validation']);

    Route::get('validator/dashboard', [ValidatorController::class,'dashboard']);

    Route::get('validator/logout', function(){
        session()->forget('VALIDATOR_LOGIN');
        session()->forget('VALIDATOR_ID');
        return redirect('validator');
    });
});
Route::group(['middleware'=>'user_auth'],function(){

    Route::get('user/dashboard', [UserController::class,'dashboard']);
    Route::get('user/isp', [ISPController::class,'Show']);
    Route::get('user/application', [ApplyController::class,'load']);
    Route::get('user/isp/plan/{id}', [UserController::class,'plan']);
    Route::get('user/isp/plan/apply/{id}', [ApplyController::class,'apply_view']);
    Route::post('apply/apply', [ApplyController::class,'apply'])->name('apply');

    Route::get('user/logout', function(){
        session()->forget('USER_LOGIN');
        session()->forget('USER_ID');
        return redirect('/');
    });
});
Route::group(['middleware'=>'isp_auth'],function(){

    Route::get('isp/dashboard', [ISPController::class,'dashboard']);

    //plan route
    Route::get('isp/plan', [PlanController::class,'index']);
    Route::get('isp/plan/manage_plan', [PlanController::class,'manage_plan']);
    Route::get('isp/plan/manage_plan/{id}', [PlanController::class,'manage_plan']);
    Route::post('isp/plan/manage_plan_process', [PlanController::class,'manage_plan_process'])->name('manage_plan_process');
    Route::get('isp/plan/delete/{id}', [PlanController::class,'delete']);
    Route::get('isp/plan/status/{status}/{id}', [PlanController::class,'status']);
    Route::get('isp/application', [ApplyController::class,'isp_load']);
    Route::get('isp/application/status/{status}/{id}', [ApplyController::class,'status']);


    Route::get('isp/logout', function(){
        session()->forget('ISP_LOGIN');
        session()->forget('ISP_ID');
        return redirect('isp');
    });
    Route::get('isp/manage_profile', [ISPController::class,'manage_profile']);
});