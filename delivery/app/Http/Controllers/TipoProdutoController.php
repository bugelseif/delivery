<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProduto;
use DB;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoProdutos = new TipoProduto();
        $tipoProdutos = DB::select("SELECT * FROM TIPO_PRODUTOS");
        return view('TipoProduto\index')->with('tipoProdutos', $tipoProdutos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TipoProduto\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoProduto = new TipoProduto();
        $tipoProduto->descricao = $request->descricao;
        $tipoProduto->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoprodutos = DB::select("SELECT Tipo_Produtos.id,
                                       Tipo_Produtos.descricao,
                                       Tipo_Produtos.updated_at,
                                       Tipo_Produtos.created_at
                                FROM Tipo_Produtos
                                WHERE Tipo_Produtos.id = ?", [$id]);

        if(count($tipoprodutos) > 0)
            return view("TipoProduto/show")->with("tipoproduto", $tipoprodutos[0]);
        // TODO: Implementar mensagens de erro.
        echo "Tipo produto não encontrado";
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
