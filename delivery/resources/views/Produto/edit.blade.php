<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <title>Produto</title>
</head>
<body>
    <div class="container">
        <form action="{{route("produto.update", $produto->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" value="{{$produto->id}}" disabled>
                <div id="id" class="form-text">Não será necessário cadastrar um id</div>
            </div>
            <div class="form-group">
                <label for="id-input-nome" class="form-label">Nome</label>
                <input name="nome" type="text" class="form-control" id="id-input-nome" placeholder="Digite o nome" value="{{$produto->nome}}" required>
            </div>
            <div class="form-group">
                <label for="id-input-preco" class="form-label">Preço</label>
                <input name="preco" type="text" class="form-control" id="id-input-preco" placeholder="Digite o preço" value="{{$produto->preco}}" required>
            </div>
            <div class="form-group">
                <label for="id-input-tipo">Tipo</label>
                <select class="form-select" name="Tipo_Produtos_id" aria-label="Selecione um tipo">
                    @foreach ($tipoProdutos as $tipoProduto)
                        {{-- Se o option que estiver sendo impresso for igual ao tipo do elemento enviado para página --}}
                        {{-- Então o option deve ser marcado como selecionado --}}
                        @if ( $tipoProduto->id == $produto->Tipo_Produtos_id )
                            <option value="{{$tipoProduto->id}}" selected>{{$tipoProduto->descricao}}</option>
                        @else
                            <option value="{{$tipoProduto->id}}">{{$tipoProduto->descricao}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id-input-ingredientes" class="form-label">Ingredientes</label>
                <input name="ingredientes" type="text" class="form-control" id="id-input-ingredientes" placeholder="Digite os ingredientes" value="{{$produto->ingredientes}}" required>
            </div>
            <div class="form-group">
                <label for="id-input-urlImage" class="form-label">Url Image</label>
                <input name="urlImage" type="text" class="form-control" id="id-input-urlImage" placeholder="Digite a urlImage" value="{{$produto->urlImage}}" required>
            </div>
            <div class="my-1">
                <a href="{{route("produto.index")}}" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </form>
    </div>
</body>
</html>
