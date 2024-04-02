<?php
use App\Http\Controllers\CelularesController;
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

Route::get('/celulares', function () {
    return view('celulares.index');
});

//Direccionamos a la clase CelularController y a la función create

//Route::get('/celulares/create',[CelularesController::class,'create']);

Route::resource('celulares', CelularesController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [CelularesController::class, 'index'])->name('home');

//cuando el usuario se loguee busca la función del controlador y busca la clase index para ejecutarla
Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [CelularesController::class, 'index'])->name('home');
});
