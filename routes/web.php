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

Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('index');

Route::post('/customers/csvImport', [App\Http\Controllers\CustomerController::class, 'csvImport'])
->name('csv.import');

Route::post('/customers/jsonImport', [App\Http\Controllers\CustomerController::class, 'jsonImport'])
->name('json.import');

Route::post('/customers/ldifImport', [App\Http\Controllers\CustomerController::class, 'ldifImport'])
->name('ldif.import');
