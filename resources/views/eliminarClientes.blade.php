<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <link rel="shortcut icon" href="../../../resources/images/logos/LOGOrapid-riders.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../resources/css/clientes/clientes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12 titulo">
                <h1 class="my-4">Eliminar Cliente</h1>
            </div>
        </div>

        <div class="col-md-12">
            <h1>Desea eliminar este cliente?</h1>

            <form action="{{ route('clientes.delete', $id) }}" method="post" class="text-center">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-user-xmark"></i> Eliminar</button>

                <a href="{{ route('clientes.clientes') }}" class="btn btn-primary"><i class="fa-solid fa-ban"></i> Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>