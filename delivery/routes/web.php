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

// Route::get('tipoproduto', "App\Http\Controllers\TipoProdutoController@index")->name("tipoproduto.index");
// Route::get('tipoproduto/create', "App\Http\Controllers\TipoProdutoController@create")->name("tipoproduto.create");
// Route::post('tipoproduto', "App\Http\Controllers\TipoProdutoController@store")->name("tipoproduto.store");
// Route::get('tipoproduto/{id}', "App\Http\Controllers\TipoProdutoController@show")->name("tipoproduto.show");
// Route::get('tipoproduto/{id}/edit', "App\Http\Controllers\TipoProdutoController@edit")->name("tipoproduto.edit");
// Route::put('tipoproduto/{id}', "App\Http\Controllers\TipoProdutoController@update")->name("tipoproduto.update");
// Route::delete('tipoproduto/{id}', "App\Http\Controllers\TipoProdutoController@destroy")->name("tipoproduto.destroy");
Route::resource('tipoproduto', "App\Http\Controllers\TipoProdutoController");

// Route::get('produto', "App\Http\Controllers\ProdutoController@index")->name("produto.index");
// Route::get('produto/create', "App\Http\Controllers\ProdutoController@create")->name("produto.create");
// Route::post('produto', "App\Http\Controllers\ProdutoController@store")->name("produto.store");
// Route::get('produto/{id}', "App\Http\Controllers\ProdutoController@show")->name("produto.show");
// Route::get('produto/{id}/edit', "App\Http\Controllers\ProdutoController@edit")->name("produto.edit");
// Route::put('produto/{id}', "App\Http\Controllers\ProdutoController@update")->name("produto.update");
// Route::delete('produto/{id}', "App\Http\Controllers\ProdutoController@destroy")->name("produto.destroy");
Route::resource('produto', "App\Http\Controllers\ProdutoController");

// Comando para definir de forma automática todas as rotas criados pelo --resource
//Route::resource('tipoproduto', "App\Http\Controllers\TipoProdutoController");
// Route::post('tipoproduto', 'App\Http\Controllers\TipoProdutoController@store');
