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

    <title>Informações do usuário</title>
</head>
<body>
    <div class="container">
        <a class="btn btn-secondary" href="{{route("userinfo.edit", $userInfo->Users_id)}}">Editar</a>
        <a
        href="#"
        class="btn btn-danger class-button-destroy"
        data-bs-toggle="modal"
        data-bs-target="#destroyModal"
        value="{{route("userinfo.destroy", $userInfo->Users_id)}}">Remover</a>

        <div class="form-group">
            <label class="form-label">ID</label>
            <input type="text" class="form-control" value={{$userInfo->Users_id}} disabled>
        </div>
        <div class="form-group">
            <label class="form-label">Imagem de Perfil</label>
            <input type="text" class="form-control" value={{$userInfo->profileImg}} disabled>
        </div>
        <div class="form-group">
            <label class="form-label">Status</label>
            <input type="text" class="form-control" value={{$userInfo->status}} disabled>
        </div>
        <div class="form-group">
            <label class="form-label">Data de Nascimento</label>
            <input type="text" class="form-control" value={{$userInfo->dataNasc}} disabled>
        </div>
        <div class="form-group">
            <label class="form-label">Genero</label>
            <input type="text" class="form-control" value={{$userInfo->genero}} disabled>
        </div>
        <div class="form-group">
            <label class="form-label">Updated At</label>
            <input type="text" class="form-control" value={{$userInfo->updated_at}} disabled>
        </div>
        <div class="form-group">
            <label class="form-label">Created At</label>
            <input type="text" class="form-control" value={{$userInfo->created_at}} disabled>
        </div>
    </div>

    
    {{-- Modal --}}
    <div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="destroyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroyModalLabel">Remover recurso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja realmente remover este recurso?
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-danger">Confirmar remoção</button> --}}
                    <form id="id-form-modal-botao-remover" action="/userinfo/1" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Confirmar remoção">
                    </form>
                    {{-- Route::delete('produto/{id}', "App\Http\Controllers\ProdutoController@destroy")->name("produto.destroy"); --}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
