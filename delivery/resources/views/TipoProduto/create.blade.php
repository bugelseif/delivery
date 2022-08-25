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
        <form action="/tipoproduto" method="post">
            @csrf
            <div class="mb-3">
                <label for="input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="input-id" aria-describedby="idlHelp" placeholder="#" disabled>
                <div id="idlHelp" class="form-text">Não precisa informar o id.</div>
            </div>
            <div class="mb-3">
                <label for="input-descricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="input-descricao">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>
