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
    return view('welcome');
});

Route::get('/admin/vencidos.php', 'VencidosController@index')->name('vencidos');

Route::get('/admin/reporte.php', 'ReporteController@index')->name('reporte');

Route::get('/admin/reportediario', 'ReporteController@diario')->name('diario');
Route::get('/admin/reportediarioDetalle/{fecha}', 'ReporteController@diarioDetalle')->name('diarioDetalle');
Route::get('/admin/reportediarioDetalleGastos/{fecha}', 'ReporteController@diarioDetalleGastos')->name('diarioDetalleGastos');
Route::get('/admin/reportediarioDetallePrestamos/{fecha}', 'ReporteController@diarioDetallePrestamos')->name('diarioDetallePrestamos');
Route::get('/admin/reportediarioDetalleGanados/{fecha}', 'ReporteController@diarioDetalleGanados')->name('diarioDetalleGanados');

Route::post('/admin/reporte', 'ReporteController@data');

Route::get('/admin/reporte2', 'ReporteController@semanal')->name('reporte2');

Route::post('/admin/refinancear', 'ReporteController@refinancear')->name('refinancear');

/*SEMANAL*/
Route::get('/admin/semanalDetalleRecaudado/{fecha1}/{fecha2}', 'ReporteController@semanalDetalleRecaudado');

Route::get('/admin/semanalDetalleGastos/{fecha1}/{fecha2}', 'ReporteController@semanalDetalleGastos');

Route::get('/admin/semanalDetallePrestamos/{fecha1}/{fecha2}', 'ReporteController@semanalDetallePrestamos');

Route::get('/admin/semanalDetalleGanados/{fecha1}/{fecha2}', 'ReporteController@semanalDetalleGanados');

