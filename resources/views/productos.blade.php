<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="shortcut icon" href="../resources/images/logos/LOGOrapid-riders.png" type="image/x-icon">
    <link rel="stylesheet" href="../resources/css/clientes/clientes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 titulo">
                <h1 class="my-4">Productos</h1>
            </div>
        </div>
    </div>
    <div class="container my-4">
        <div class="row">
            <div class="col-12 mb-4">
                <a
                  class="btn btn-primary"
                  href="{{ route('productos.registrarProducto') }}"
                  ><i
                  class="fa-solid fa-plus"></i>
                  Nuevo
                  Producto</a>

            </div>
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td
                          class="text-center"><a
                          class="btn btn-danger"
                          href="{{ route('productos.eliminar', $producto->idproducto) }}"><i
                          class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    
</body>
</html>
