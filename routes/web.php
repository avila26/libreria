<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//RUTAS DEL AUTOR
Route::get('/', [AutorController::class, 'index'] );
Route::post('/autor',[AutorController::class, 'registrar'] );
Route::put('/autor/{id}',[AutorController::class, 'actualizar'] );//para actualizar necesita un id por ende se lo pasamos 
Route::delete('/autor/{id}',[AutorController::class, 'eliminar'] );//para eliminar necesita un id por ende se lo pasamos 
//RUTAS DE LA NUEVA VISTA
Route::get('/autor/{id}', [AutorController::class, 'showautor'] );

//RUTAS DE LIBRO
Route::get('/indexlibro', [LibroController::class, 'index'] );
Route::post('/libros',[LibroController::class, 'registrar'] );
Route::get('/mostrar', [LibroController::class, 'showLibro'] ); //mostrar
Route::put('/actualizarLibro/{id}',[LibroController::class, 'actualizar'] );//para actualizar necesita un id por ende se lo pasamos 
Route::delete('/libro/{id}',[LibroController::class, 'eliminar'] );
Route::put('/actualizar/{id}',[LibroController::class, 'updateLibro'] );
Route::get('/buscar',[LibroController::class, 'filtrar'] );