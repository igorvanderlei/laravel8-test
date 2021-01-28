<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastrarFuncionario;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnviarMensagemController;
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

Route::get('/dashboard/{caixa?}', [HomeController::class, 'index'])->name('dashboard');

Route::get('/funcionario/create', [CadastrarFuncionario::class, 'prepararCadastro'])->name("funcionario.create");
Route::post('funcionario/create', [CadastrarFuncionario::class, 'cadastrar'])->name("funcionario.create");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/escrever", [EnviarMensagemController::class, 'showForm'])->name('mensagem.create');

Route::post("/enviar", [EnviarMensagemController::class, 'enviar'])->name('mensagem.send');
