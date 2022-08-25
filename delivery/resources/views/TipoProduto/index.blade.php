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

    <title>Tipo Produto</title>
</head>
<body>
    <div class="container">
        <a class="btn btn-primary" href="create">Criar Tipo Produto</a>
        <a class="btn btn-primary" href="#">Voltar</a>

        <table class="table table-dark table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Descrição</th>
                <th scope="col">Ação</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($tipoProdutos as $produto)
                <tr>
                    <th scope="row">{{$produto->id}}</th>
                    <td>{{$produto->descricao}}</td>
                    <td>
                        <a class="btn btn-primary" href="#">Mostrar</a>
                        <a class="btn btn-secondary" href="#">Editar</a>
                        <a class="btn btn-danger" href="#">Remover</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</body>
</html>
