<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
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
    return view('home');
})->name('inicio');

Auth::routes();

Route::resource('asignaturas', 'AsignaturaController');
Route::resource('archivos', 'ArchivoController');

Route::get('/perfil', 'HomeController@perfil')->name('perfil');
Route::get('/ranking', 'HomeController@ranking')->name('ranking');

