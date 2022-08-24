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


Route::get('test', function () {
    return view('test');
});

Route::get("tipoproduto/add/{descricao}", function($descricao){
    $tipoProduto = new TipoProduto();
    $tipoProduto->descricao = $descricao;
    $tipoProduto->save();

    return view('welcome'); // volta pra pagina inicial
});

Route::get("produto/add/{nome}/{preco}/{Tipo_Produtos_id}/{ingredientes}/{urlImage}",
function($nome, $preco, $Tipo_Produtos_id, $ingredientes, $urlImage){
    $produto = new Produto();
    $produto->nome = $nome;
    $produto->preco = $preco;
    $produto->Tipo_Produtos_id = $Tipo_Produtos_id;
    $produto->ingredientes = $ingredientes;
    $produto->urlImage = $urlImage;
    $produto->save();

    return view('welcome'); // volta pra pagina inicial
});
