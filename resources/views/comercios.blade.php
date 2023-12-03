<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comercios</title>
    <link rel="shortcut icon" href="../resources/images/logos/LOGOrapid-riders.png" type="image/x-icon">
    <link rel="stylesheet" href="../resources/css/clientes/clientes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 titulo">
                <h1 class="my-4">Comercios</h1>
            </div>
        </div>
    </div>
    <div class="container my-4">
        <div class="row">
            <div class="col-12 mb-4">
                <a href="{{ route('comercios.registrarComercio') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Nuevo Comercio</a>

            </div>
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Dirección</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comercios as $comercio)
                    <tr>
                        <td>{{ $comercio->nombre }}</td>
                        <td>{{ $comercio->direccion }}</td>
                        <td class="text-center"><a class="btn btn-danger" href="{{ route('comercios.eliminar', $comercio->idcomercio) }}"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>