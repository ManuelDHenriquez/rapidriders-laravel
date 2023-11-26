<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../resources/css/login/styles.css">
    <link rel="shortcut icon" href="../resources/images/logos/LOGOrapid-riders.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="inicio">
        <div class="fondo">
            <img src="../resources/images/logos/LOGOrapid-riders.png" alt="rapid-riders.png" width="250px">
            <span style="font-size: 25px;">RAPID RIDERS</span>
        </div>
        <div class="filtro">
            <div class="login">
                <font size="5">Inicia Sesión</font>
                <br>
                <form action="{{ route('usuarios.logIn') }}" method="post" style="text-align: center;">
                    @csrf
                    @method('POST')
                    <label for="usuario">Correo Electrónico</label>
                    <input type="text" name="usuario" id="usrLogin" placeholder="Ingresa tu correo">
                    <label for="Contraseña">Contraseña</label>
                    <input type="password" name="password" id="usrPsw" placeholder="Ingresa tu contraseña">
                    <br><br>
                    <div>
                        <input type="submit" value="Iniciar Sesión" class="btn btn-warning" id="btnLogin">
                    </div>
                    <br>
                </form>
                
                <a href="{{ route('usuarios.registrarCliente') }}" class="btn btn-link">¿No te has Registrado?</a>
            </div>
        </div>
    </div>
</body>
<script src="../resources/js/jquery.min.js"></script>
<!-- <script src="../resources/js/login/controlador.js"></script> -->

</html>