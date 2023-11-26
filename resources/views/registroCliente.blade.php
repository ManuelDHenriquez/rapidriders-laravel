<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../resources/css/clientes/registroClientes.css">
    <link rel="shortcut icon" href="../resources/images/logos/LOGOrapid-riders.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="
        https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
        " rel="stylesheet">
</head>

<body>
    <div class="inicio">
        <div class="container-fluid m-3">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 my-3 rounded titulo">
                            <h5 class="my-2">Regístrate</h5>
                            <h5>Información Personal</h5>
                        </div>
                    </div>
                </div>
                <form action="{{ route('usuario.store') }}" method="post" id="registerClient">
                    @csrf
                    @method('POST')
                    <div class="col-12">
                        <div class="row">
                            <div class="mb-2 col-md-6">
                                <label for="txtNombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="txtNombre" placeholder="Ingrese tu nombre">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="txtApellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="txtApellido" placeholder="Ingrese su apellido">
                            </div>
                            <div class="mb-2 col-md-12">
                                <label for="txtDireccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" rows="3" name="direccion" id="txtDireccion" placeholder="Ingrese su dirección">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="txtTelefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="txtTelefono" placeholder="Ingrese su teléfono">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="txtEmail" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" name="email" id="txtEmail" placeholder="Ingese su correo">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="txtContraseña" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="txtContrasena" placeholder="Ingrese su contraseña" onkeydown="newPassword()" onkeyup="newPassword()">
                                <small id="msgPass" class="text-success"></small>
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="txtRepetir" class="form-label">Repita su Contraseña</label>
                                <input type="password" class="form-control" name="repeatPass" id="txtRepetir" placeholder="Ingrese nuevamente su contraseña" onkeydown="repetir()" onkeyup="repetir()">
                                <small id="msgRepeat" class="text-success"></small>
                            </div>
                        </div>
                        <div class="col-md-12 my-2 text-center">
                            <button type="submit" class="btn btn-warning" id="btnRegistrar" disabled>Registrarse</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
    "></script>

<script src="../resources/js/jquery.min.js"></script>
<script>
    let conteo = 0, conteo2 = 0;
    let nuevas = "", repetida = "";

    const newPassword = () => {
        conteo = $("#txtContrasena").val().length;
        if (conteo >= 0 && conteo < 5) {
            $("#msgPass").removeClass("text-success");
            $("#msgPass").addClass("text-danger");
            $("#msgPass").html("La contraseña es demasiado corta");
            $("#btnRegistrar").attr("disabled", true);
            repetir();
        } else {
            $("#msgPass").html("Bien");
            $("#msgPass").addClass("text-success");
            $("#msgPass").removeClass("text-danger");
            $("#btnRegistrar").attr("disabled", false);
            repetir();
        }
    };

    const repetir = () => {
        nuevas = $("#txtContrasena").val();
        repetida = $("#txtRepetir").val();
        conteo2 = $("#txtContrasena").val().length;
        if (conteo2 >= 0 && nuevas != repetida) {
            $("#msgRepeat").html("Las contraseñas no coinciden");
            $("#msgRepeat").removeClass("text-success");
            $("#msgRepeat").addClass("text-danger");
            $("#btnRegistrar").attr("disabled", true);
        } else if (nuevas == repetida) {
            if(conteo2 === 0){
                $("#msgRepeat").html("Las contraseñas no coinciden");
                $("#msgRepeat").removeClass("text-success");
                $("#msgRepeat").addClass("text-danger");
                $("#btnRegistrar").attr("disabled", true);
            }else{
                $("#msgRepeat").html("Las contraseñas coinciden");
                $("#msgRepeat").addClass("text-success");
                $("#msgRepeat").removeClass("text-danger");
                $("#btnRegistrar").attr("disabled", false);
            }

        }
    };
</script>


</html>