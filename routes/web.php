<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);


// Route::group(["prefix" => '/{any}'], function () {
//     $request = app('request');
//     $base = new \App\Services\Base\BaseControllers($request);
//     $request->merge($base->getMergeRequest());
//     Route::any('/', $base->index($request))->where('any', '.*');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
