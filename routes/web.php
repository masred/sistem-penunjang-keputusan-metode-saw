<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnalyzeController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\SubCriteriaController;

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
    return redirect('/criteria');
});
Route::resource('criteria', CriteriaController::class);
Route::resource('sub-criteria', SubCriteriaController::class)->except(['index', 'show', 'create']);
Route::resource('alternative', AlternativeController::class)->except('show');
Route::resource('analyze', AnalyzeController::class)->only('index');
Route::get('/logout', [LoginController::class, 'logout']);


Route::resource('login', LoginController::class)->only(['index', 'store']);
Route::resource('register', RegisterController::class)->only(['index', 'store']);
