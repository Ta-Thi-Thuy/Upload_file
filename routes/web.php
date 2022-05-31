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

//Route::get('/', function () {
//    return view('uploadFile');
//});
//Route::post('/', [\App\Http\Controllers\UploadFileController::class,'index'])-> name('list');
Route::get('/', [\App\Http\Controllers\UploadFileController::class,'create'])-> name('create');
Route::post('ajax/store', [\App\Http\Controllers\UploadFileController::class,'store'])-> name('store');
Route::post('ajax/delete', [\App\Http\Controllers\UploadFileController::class,'fileDestroy'])-> name('delete');
