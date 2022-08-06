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

Route::get('/', 'App\Http\Controllers\InicioController@index');
Route::get('/listar', 'App\Http\Controllers\InicioController@listar_emprendedores')->name('emprendedores.lista_sector');
Route::get('/blog', 'App\Http\Controllers\BlogController@index');
Route::get('/blog/{blog}','App\Http\Controllers\BlogController@show')->name('blog.show');
Route::post('/contactar', 'App\Http\Controllers\ContactoController@mail_contacto')->name('contacto');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::put('articulos/{articulo}/autorizar', 'App\Http\Controllers\ArticuloController@autorizar')->name('articulos.autorizar');
Route::resource('articulos', 'App\Http\Controllers\ArticuloController');

Route::put('emprendedores/{emprendedor}/autorizar', 'App\Http\Controllers\EmprendedorController@autorizar')->name('emprendedores.autorizar');
Route::get('emprendedores/listar', 'App\Http\Controllers\EmprendedorController@index_publico')->name('panel.emprendedores.index');
Route::get('emprendedores/edit', 'App\Http\Controllers\EmprendedorController@edit');
Route::resource('emprendedores', 'App\Http\Controllers\EmprendedorController');

Route::get('eventos/json', 'App\Http\Controllers\EventoController@json')->name('eventos.json');
Route::put('eventos/{evento}/autorizar', 'App\Http\Controllers\EventoController@autorizar')->name('eventos.autorizar');
Route::resource('eventos', 'App\Http\Controllers\EventoController');

Route::put('campanias/{campania}/autorizar', 'App\Http\Controllers\ConfigmailController@autorizar')->name('campanias.autorizar');
Route::resource('campanias', 'App\Http\Controllers\ConfigmailController');
Route::get('pruebaMail/{campania}','App\Http\Controllers\MailController@html_email');

Route::get('galeria', 'App\Http\Controllers\GaleriaController@index')->name('galeria');
Route::post('galeria/subir_fotos', 'App\Http\Controllers\GaleriaController@subir_fotos')->name('galeria.subir_fotos');

Route::resource('informes', 'App\Http\Controllers\InformeController');

Route::get('localidadProvincia/{id}', 'App\Http\Controllers\LocalidadProvinciaController@unaProvincia');

Route::get('emprendimientos/edit', 'App\Http\Controllers\EmprendimientoController@edit');
Route::resource('emprendimientos', 'App\Http\Controllers\EmprendimientoController');

Route::get('cambiarPass', 'App\Http\Controllers\Auth\CrearPass@cambiarPass')->name('pass');