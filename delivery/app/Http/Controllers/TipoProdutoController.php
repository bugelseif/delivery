<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProduto;
use Illuminate\Support\Facades\DB;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tipoProdutos = new TipoProduto();
            $tipoProdutos = DB::select("SELECT * FROM TIPO_PRODUTOS");
        } catch(\Throwable $th){
            return view("TipoProduto/index")->with("tipoProdutos", [])->with("message",[$th->getMessage(), "danger"]);
        }
        return view('TipoProduto\index')->with('tipoProdutos', $tipoProdutos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexMessage($message)
    {
        try {
            $tipoProdutos = DB::select("SELECT * FROM TIPO_PRODUTOS");
        } catch (\Throwable $th) {
            return view("TipoProduto/index")->with("tipoProdutos", [])->with("message", [$th->getMessage(), "danger"]);
        }
        return view("TipoProduto/index")->with("tipoProdutos", $tipoProdutos)->with("message", $message);
    }

    public function create()
    {
        try {
            return view('TipoProduto\create');
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $tipoProduto = new TipoProduto();
            $tipoProduto->descricao = $request->descricao;
            $tipoProduto->save();
        } catch(\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
        return $this->indexMessage(["Produto cadastrado com sucesso", "success"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $tipoprodutos = DB::select("SELECT Tipo_Produtos.id,
                                       Tipo_Produtos.descricao,
                                       Tipo_Produtos.updated_at,
                                       Tipo_Produtos.created_at
                                FROM Tipo_Produtos
                                WHERE Tipo_Produtos.id = ?", [$id]);

            if(count($tipoprodutos) > 0)
                return view("TipoProduto/show")->with("tipoproduto", $tipoprodutos[0]);
            return $this->indexMessage(["O produto não foi encontrado", "warning"]);
        } catch(\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $tipoproduto = TipoProduto::find($id); // retorna um obj ou null
            if( isset($tipoproduto) ){
                return view("TipoProduto/edit")->with("tipoproduto", $tiporoduto);
            }
        return $this->indexMessage(["O produto não foi encontrado", "warning"]);
        } catch(\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }

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
        try {
            $tipoproduto = TipoProduto::find($id);

            if( isset($tipoproduto) ){
                $tipoproduto->descricao = $request->descricao;
                $tipoproduto->update();
                return $this->indexMessage(["O produto atualizado com sucesso", "success"]);
            }
            return $this->indexMessage(["O produto não foi encontrado", "warning"]);
        } catch(\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tipoproduto = TipoProduto::find($id);

            if( isset($tipoproduto) ) {
                $tipoproduto->delete();
                return $this->indexMessage(["O produto removido com sucesso", "success"]);
            }
            return $this->indexMessage(["O produto removido com sucesso", "success"]);
        } catch(\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }
}
