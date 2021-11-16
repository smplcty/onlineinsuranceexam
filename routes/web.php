<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', function () {
	return redirect('/login');
    // return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sales-representative', [App\Http\Controllers\SalesRepController::class, 'index']);
Route::get('/sales-representative/store', [App\Http\Controllers\SalesRepController::class, 'store']);
Route::get('/sales-representative/show', [App\Http\Controllers\SalesRepController::class, 'show']);
Route::get('/sales-representative/update', [App\Http\Controllers\SalesRepController::class, 'update']);
Route::get('/sales-representative/remove', [App\Http\Controllers\SalesRepController::class, 'remove']);
Route::get('/sales-representative/remove', [App\Http\Controllers\SalesRepController::class, 'remove']);

Route::get('/payroll', [App\Http\Controllers\PayrollController::class, 'home']);