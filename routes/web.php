<?php

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
  return redirect('home');
});

Route::prefix('importar')->group(function () {

	Route::post('egresos', 'ImportarController@egresos')->name('importar.egresos');
	Route::post('/gastos', 'ImportarController@gastos')->name('importar.gastos');
	Route::post('/bancos', 'ImportarController@bancos')->name('importar.bancos');
	Route::post('/clientes', 'ImportarController@clientes')->name('importar.clientes');
	Route::get('/', 'ImportarController@index')->name('importar.index');
  });


Auth::routes();

Route::get('/home', 'HomeController@index');

















Route::resource('tipoDeGastos', 'TipoDeGastoController');



Route::resource('gastos', 'GastoController');

Route::resource('facturadors', 'FacturadorController');

Route::resource('liquidadors', 'LiquidadorController');

Route::resource('medios', 'MedioController');

Route::resource('disponibilidads', 'DisponibilidadController');

Route::resource('formaDePagos', 'FormaDePagoController');

Route::resource('cobradors', 'CobradorController');

Route::resource('clientes', 'ClienteController');

Route::resource('ingresoMensuals', 'IngresoMensualController');