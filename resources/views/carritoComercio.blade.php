<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comercios</title>
    <link rel="stylesheet" href="../resources/css/categorias/categorias.css">
    <link rel="shortcut icon" href="../resources/images/logos/LOGOrapid-riders.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<section id="categorias">
        <div class="fondo">
            <img src="../resources/images/logos/LOGOrapid-riders.png" alt="rapid-riders.png">
            <h3><a onclick="history.back()"><i class="fa-solid fa-circle-left"></i></a>    RAPID RIDERS</h3>
            <h5>Comercios</h5>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="contaner-cards mt-2" style="font-weight: bold;">
                            <!-- <div class="scroll-buttons col-12">
                                <div class="row text-center my-5">
                                    <div class="col-6 text-start">
                                        <button id="left" class="btn btn-outline-link rounded-pill hover-zoom"><i class="fas fa-chevron-left fa-2x"></i></button>
                                    </div>
                                    <div class="col-6 text-end">
                                        <div class="row">
                                            <div class="col-12">
                                                <button id="right" class="btn btn-outline-link rounded-pill hover-zoom"><i class="fas fa-chevron-right fa-2x"></i></button> &nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div id="categoriasDisp">
                                <div class="col-2 rounded-pill text-center">
                                    <img src="https://i.pinimg.com/564x/bc/d9/a8/bcd9a891a854a17a73cd816db0f30b9c.jpg" alt="" style="width: 80px; height: 80px; border-radius: 50%;">
                                    <p>Desayunos</p>
                                </div>
                                <div class="col-2 rounded-pill text-center">
                                    <img src="https://i.pinimg.com/564x/be/74/ac/be74ace2713d8f550010576cc1697eff.jpg" alt="" style="width: 80px; height: 80px; border-radius: 50%;">
                                    <p>Almuerzos</p>
                                </div>
                                <div class="col-2 rounded-pill text-center">
                                    <img src="https://i.pinimg.com/564x/ec/4d/92/ec4d92cfc2ec5c2cc9e34a0e045fd6b7.jpg" alt="" style="width: 80px; height: 80px; border-radius: 50%;">
                                    <p>Mariscos</p>
                                </div>
                                <div class="col-2 rounded-pill text-center">
                                    <img src="https://i.pinimg.com/564x/91/59/cd/9159cd89768b530bea466e2d115bfc7c.jpg" alt="" style="width: 80px; height: 80px; border-radius: 50%;">
                                    <p>Postres</p>
                                </div>
                                <div class="col-2 rounded-pill text-center">
                                    <img src="https://i.pinimg.com/564x/91/59/cd/9159cd89768b530bea466e2d115bfc7c.jpg" alt="" style="width: 80px; height: 80px; border-radius: 50%;">
                                    <p>Postres</p>
                                </div>
                                <div class="col-2 rounded-pill text-center">
                                    <img src="https://i.pinimg.com/564x/91/59/cd/9159cd89768b530bea466e2d115bfc7c.jpg" alt="" style="width: 80px; height: 80px; border-radius: 50%;">
                                    <p>Postres</p>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-12 rounded-4" id="categoriasCarga">
                    <div class="row text-center" id="restaurantes">
                        @foreach($comercios as $comercio)
                        <div
                          class="col-3 row-4 m-2 text-center restaurantes"
                          id="restaurante-{{ $comercio->idcomercio }}"
                          onclick="window.location.href = `{{ route('carrito.productos', $comercio->idcomercio) }}`">
                            <div class="row">
                                <div class="col-md-12 img-restaurante mb-2 s">
                                    <h2>{{ strtoupper($comercio->nombre) }}</h2>
                                </div>
                                <div class="col-md-12 info-restaurante">
                                    <div class="row">
                                        <div class="col-12 text-start">
                                            {{ $comercio->direccion }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>