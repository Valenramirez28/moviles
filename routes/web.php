<?php
use App\Http\Controllers\CelularesController;
use App\Http\Controllers\ClientesController;
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

Route::get('/', function () {
    return view('auth.login');
});




//Direccionamos a la clase CelularController y a la función create

//Route::get('/celulares/create',[CelularesController::class,'create']);

// Definir la ruta para el recurso 'celulares' utilizando Route::resource
Route::resource('celulares', CelularesController::class)->middleware('auth');

// Definir la ruta para el recurso 'clientes' utilizando Route::resource
Route::resource('clientes', ClientesController::class)->middleware('auth');

//Route::resource('celulares', CelularesController::class)->middleware('auth');

//Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');

Auth::routes();

Route::get('/home', [CelularesController::class, 'index'])->name('home');

//cuando el usuario se loguee busca la función del controlador y busca la clase index para ejecutarla
Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [CelularesController::class, 'index'])->name('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
