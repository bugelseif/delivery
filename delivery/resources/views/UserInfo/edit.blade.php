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
        <form action="{{route("userinfo.update", $userInfo->Users_id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" value="{{$userInfo->Users_id}}" disabled>
                <div id="id" class="form-text">Não será necessário cadastrar um id</div>
            </div>
            <div class="form-group">
                <label for="id-input-profileImg" class="form-label">Imagem de Perfil</label>
                <input name="profileImg" type="text" class="form-control" id="id-input-profileImg" placeholder="Entre com a imagem" value="{{$userInfo->profileImg}}" required>
            </div>
            <div class="form-group">
                <label for="id-input-status" class="form-label">Status</label>
                <input type="text" class="form-control" id="id-input-status" aria-describedby="statusHelp" placeholder="#" value="{{$userInfo->status}}" disabled>
                <div id="status" class="form-text">Status não é controlado pelo usuário.</div>
            </div>
            <div class="form-group">
                <label for="id-input-dataNasc" class="form-label">Data de nascimento</label>
                <input name="dataNasc" type="text" class="form-control" id="id-input-dataNasc" placeholder="Digite os dataNasc" value="{{$userInfo->dataNasc}}" required>
            </div>
            <div class="form-group">
                <label for="id-input-genero" class="form-label">Genero</label>
                <input name="genero" type="text" class="form-control" id="id-input-genero" placeholder="Digite a genero" value="{{$userInfo->genero}}" required>
            </div>
            <div class="my-1">
                <a href="{{route("userinfo.show", $userInfo->Users_id)}}" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </form>
    </div>
</body>
</html>
