<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Comercio</title>
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
        <form action="{{ route('comercios.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="col-12">
                <div class="row">
                    <div class="mb-2 col-md-6">
                        <label for="txtNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="txtNombre" placeholder="Ingrese nombre del Comercio">
                    </div>
                    <div class="mb-2 col-md-6">
                        <label for="txtDireccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" rows="3" name="direccion" id="txtDireccion" placeholder="Ingrese dirección del Comercio">
                    </div>
                    <div class="mb-2 col-md-6">
                        <label for="txtLat" class="form-label">Latitud</label>
                        <input type="text" class="form-control" name="latitud" id="txtLat" placeholder="Ingese Latitud del Comercio">
                    </div>
                    <div class="mb-2 col-md-6">
                        <label for="txtLon" class="form-label">Longitud</label>
                        <input type="text" class="form-control" name="longitud" id="txtlon" placeholder="Ingese Longitud del Comercio">
                    </div>
                </div>
                <div class="col-md-12 my-2 text-center">
                    <button type="submit" class="btn btn-warning" id="btnRegistrar">Agregar</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>