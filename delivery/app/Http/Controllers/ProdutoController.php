<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use App\Models\TipoProduto;


class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = DB::select('SELECT Produtos.id,
                                       Produtos.nome,
                                       Produtos.preco,
                                       Tipo_Produtos.descricao,
                                       Produtos.ingredientes,
                                       Produtos.urlImage,
                                       Produtos.updated_at,
                                       Produtos.created_at
                                FROM Produtos
                                JOIN TIPO_PRODUTOS on Produtos.Tipo_Produtos_id = Tipo_Produtos.id');
        return view("Produto/index")->with("produtos", $produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Produto\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
        $produto->ingredientes = $request->ingredientes;
        $produto->urlImage = $request->urlImage;
        $produto->save();
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
        $produtos = DB::select("SELECT Produtos.id,
                                       Produtos.nome,
                                       Produtos.preco,
                                       Produtos.Tipo_Produtos_id,
                                       Tipo_Produtos.descricao,
                                       Produtos.ingredientes,
                                       Produtos.urlImage,
                                       Produtos.updated_at,
                                       Produtos.created_at
                                FROM Produtos
                                JOIN TIPO_PRODUTOS on Produtos.Tipo_Produtos_id = Tipo_Produtos.id
                                WHERE Produtos.id = ?", [$id]);
        // O DB SELECT sempre retorna um array [obj], [obj, obj, ....] ou []

        //$produto = Produto::find($id); // Retorna um objeto ou null
        //dd($produto);

        // Mando carregar a view show de Produto,
        // criando dentro dela um objeto chamado "produto"
        // com o conteúdo de $produto que está no controlador
        if(count($produtos) > 0)
            return view("Produto/show")->with("produto", $produtos[0]);
        // TODO: Implementar mensagens de erro.
        echo "Produto não encontrado";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id); // retorna um obj ou null
        // Pergunto se o obj é válido ou null
        if( isset($produto) ){
            // Array com todos os TipoProdutos no BD
            $tipoProdutos = TipoProduto::all();
            return view("Produto/edit")
                        ->with("produto", $produto)
                        ->with("tipoProdutos", $tipoProdutos);
        }
        // #TODO implementar tratamento de exceptions
        echo "Produto não encontrado";    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //echo "Tipo $request->Tipo_Produtos_id";
        $produto = Produto::find($id); // retorna um obj ou null
        // Dentro dessa variável eu já tenho o produto que eu quero atualizar

        // Pergunto se o obj é válido ou null (se ele existe)
        if( isset($produto) ){
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
            $produto->ingredientes = $request->ingredientes;
            $produto->urlImage = $request->urlImage;
            $produto->update();
            // Recarregar a view index.
            return $this->index();
        }
        // Tratar exceptions futuramente
        echo "Produto não encontrado";    }

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
