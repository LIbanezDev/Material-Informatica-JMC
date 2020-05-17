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

Route::get('/', 'PerfilController@infoAndFavoritos')->name('inicio');

Auth::routes();

Route::resource('asignaturas', 'AsignaturaController');
Route::resource('archivos', 'ArchivoController');

Route::get('/perfil', 'PerfilController@infoAndFavoritos')->name('perfil');
Route::get('/ranking', 'HomeController@ranking')->name('ranking');


Route::get('/addFavorito/{id_asignatura}/{id_user}', 'AsignaturaFavoritaController@addFavorito')->name('addFavorito');

Route::get('/deleteFavorito/{id_asignatura}/{id_user}', 'AsignaturaFavoritaController@deleteFavorito')->name('deleteFavorito');

Route::post('guardarDefinitiva', 'ArchivoTemporalController@storeArchivo' )->name('storeArchivo');

Route::post('perfil/cambiarDatos', 'PerfilController@cambiarDatos')->name('cambiarDatos');


