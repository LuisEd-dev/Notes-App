<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{ControllerNotas, ControllerUsuario};
use Illuminate\Http\Request;

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
Route::get('/criar', function (Request $request)
{
    return view('notas.criar', compact('request'));
});
Route::post('/criar', [ControllerNotas::class, 'store']);
Route::get('/apagar/{id}', [ControllerNotas::class, 'destroy']);
Route::get('/nota/{id}', [ControllerNotas::class, 'index']);

Route::get('/entrar', [ControllerUsuario::class, 'index'])->name('login');
Route::post('/entrar', [ControllerUsuario::class, 'entrar']);
Route::post('/registrar', [ControllerUsuario::class, 'store']);

Route::get('/sair', function ()
{
    Auth::logout();
    return redirect()->route('home');
});
