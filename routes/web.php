<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{ControllerNotas, ControllerUsuario};

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

Route::get('/', [ControllerNotas::class, 'index'])->name('home')->middleware('auth');
Route::get('/criar', function ()
{
    return view('notas.criar');
});
Route::post('/criar', [ControllerNotas::class, 'store']);
Route::get('/apagar/{id}', [ControllerNotas::class, 'destroy']);

Route::get('/entrar', [ControllerUsuario::class, 'index'])->name('login');

Route::post('/entrar', [ControllerUsuario::class, 'store']);

Route::get('/sair', function ()
{
    Auth::logout();
    return redirect()->route('home');
});
