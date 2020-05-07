<?php

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

Route::resource('productos', 'ProductoController');
Route::get('productos/categoria/{seccion}', 'HomeController@seccion')->name('seccion');
Route::get('/diseño', function () {
    return view('pruebas_diseño.index');
});

