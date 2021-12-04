<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllAcessController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/visitas', function() {
    return view('guest');
})->name('visitas');

Route::get('/registro', function() {
    return view('register');
})->name('registro');

Route::get('/control-de-acceso', function() {
    return view('access-control');
})->name('control-acceso');

Route::get('owners', [App\Http\Controllers\API\OwnersController::class, 'index'])->name('owners.get');
Route::get('owners/{owner}', [App\Http\Controllers\API\OwnersController::class, 'show']);
Route::delete('owners/{owner}', [App\Http\Controllers\API\OwnersController::class, 'destroy']);


Route::get('/propietarios', [App\Http\Controllers\OwnerController::class, 'index'])
    ->name('owners.index');
Route::get('/propietarios/create', [App\Http\Controllers\OwnerController::class, 'create'])
    ->name('owners.create');

Route::post('/propietarios', [App\Http\Controllers\OwnerController::class, 'store'])
    ->name('owners.store');
