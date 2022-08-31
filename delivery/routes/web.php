<?php

use Illuminate\Support\Facades\Route;
use App\Models\TipoProduto;
use App\Models\Produto;

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

Route::get('tipoproduto', "App\Http\Controllers\TipoProdutoController@index");
Route::get('tipoproduto/create', "App\Http\Controllers\TipoProdutoController@create");


Route::post('tipoproduto', "App\Http\Controllers\TipoProdutoController@store");


// Comando para definir de forma automática todas as rotas criados pelo --resource
//Route::resource('tipoproduto', "App\Http\Controllers\TipoProdutoController");

// Route::post('tipoproduto', 'App\Http\Controllers\TipoProdutoController@store');
