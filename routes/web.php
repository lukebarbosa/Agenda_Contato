<?php

use App\Http\Controllers\ContatoController;
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
    return view('auth/register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['middleware'=>'auth', 'prefix'=>'contatos'], function() {
  Route::get('/', [ContatoController::class, 'index']);
  Route::get('/add', [ContatoController::class, 'create']);
  Route::post('/', [ContatoController::class, 'store']);
  Route::get('/{id}', [ContatoController::class, 'show']);
  Route::get('/edit/{id}', [ContatoController::class, 'edit']);
  Route::put('/{id}', [ContatoController::class, 'update']);
  Route::delete('/{id}', [ContatoController::class, 'destroy']);

});

require __DIR__.'/auth.php';
