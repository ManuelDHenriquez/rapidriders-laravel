<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motoristas</title>
    <link rel="shortcut icon" href="../resources/images/logos/LOGOrapid-riders.png" type="image/x-icon">
    <link rel="stylesheet" href="../resources/css/clientes/clientes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 titulo">
                <h1 class="my-4">Motoristas</h1>
            </div>
        </div>
    </div>
    <div class="container my-4">
        <div class="row">
            <div class="col-12 mb-4">
                <a
                  class="btn btn-primary"
                  href="{{ route('motoristas.registrarMotorista') }}"
                  ><i
                  class="fa-solid fa-plus"></i>
                  Nuevo Motorista</a>
                <a
                  href="{{ route('carrito.comercios') }}"
                  class="btn btn-primary">
                  <i class="fa-solid fa-cart-shopping"></i>
                  Carrito</a>

            </div>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motoristas as $motorista)
                    <tr>
                        <td>{{ $motorista->nombre }}</td>
                        <td>{{ $motorista->apellido }}</td>
                        <td
                          class="text-center"><a
                          class="btn btn-danger"
                          href="{{ route('motoristas.eliminarMotorista', $motorista->idmotorista) }}"><i
                          class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    
</body>
</html>
