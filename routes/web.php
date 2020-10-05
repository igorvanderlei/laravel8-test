<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastrarFuncionario;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('funcionario/create', [CadastrarFuncionario::class, 'prepararCadastro'])->name("funcionario.create");
Route::post('funcionario/create', [CadastrarFuncionario::class, 'cadastrar'])->name("funcionario.create");
