<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Carrito</title>
    <link rel="stylesheet" href="../../resources/css/productos/styles.css">
    <link rel="stylesheet" href="../../resources/css/productos/map.css">
    <link rel="shortcut icon" href="../../resources/images/logos/LOGOrapid-riders.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="color" style="background-image: url();" id="cabecera">
        <div class="cabecera">
            <img
              src="../../resources/images/logos/LOGOrapid-riders.png"
              alt="rapid-riders.png"
              id="logoEmpresa"
              width="100px">
            <h2 id="nombreEmpresa"></h2>
            <div class="shop">
                <a id="btnCarrito"><i class="fas fa-shopping-cart fa-2x"></i></a>
            </div>
            <div class="back">
                <a onclick="history.back()"><i class="fas fa-arrow-left fa-2x"></i></a>
            </div>
        </div>
    </div>

    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12 rounded-4" id="productosCarga">
                <div class="row" id="productosCargados">
                    <p style="display: none;">{{ $contador = 0 }}</p>
                    @foreach ($productos as $producto)
                    <p style="display: none;">{{ $contador++ }}</p>
                    <div class="col-3 m-2 text-center restaurantes"
                        id="producto-{{ $producto->idproducto}}"
                        onclick="addProducto(
                            '{{ $producto->idproducto}}', '{{ $producto->precio}}',
                            '{{$producto->nombre}}', '{{$producto->descripcion}}')">
                        <div class="row">
                            <div class="col-md-12 img-restaurante mb-2">
                            </div>
                            <div class="col-md-12 info-restaurante">
                                <div class="row">
                                    <div class="col-12 text-start" style="font-size: 14px !important;">
                                        <h2>{{strtoupper($producto->nombre)}}</h2>
                                    </div>
                                    <div class="col-12 text-start" style="font-size: 14px !important;">
                                        {{$producto->descripcion}}
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
    <!-- Modal de carrito -->
    <div
      class="modal fade rounded-bottom"
      id="mdlCarrito"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border border-secondary" style="max-height: 650px;">
                <div class="modal-header bg-warning text-center">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-2">
                                <a
                                  type="button"
                                  class="btn"
                                  data-dismiss="modal"
                                  id="btnCerrarCarrito"><i
                                  class="fa-solid fa-xmark"></i></a>
                            </div>
                            <div class="col-8">
                                <h3>Tus Órdenes</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body border border-secondary rounded-4 m-3">
                    <div class="container" style="max-height: 380px; overflow: hidden; overflow-y: scroll;">
                        <div class="row" id="productosCarrito">
                        </div>
                    </div>
                    <div class="container-fluid m-1 text-center">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-warning" id="btnProcesar">Procesar Orden</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de Pagos -->
    <div
      class="modal fade rounded-bottom"
      id="mdlAdd"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-center">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-2">
                                <a
                                  type="button"
                                  class="btn"
                                  data-dismiss="modal"
                                  id="btnCerrarAdd"><i
                                  class="fa-solid fa-xmark"></i></a>
                            </div>
                            <div class="col-8">
                                <h3 id="nomProduct"></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mb-2" id="descProduct">
                                <span id="descProduct"></span>
                            </div>
                            <div class="col-12 mb-2" id="cantProduc">
                                <div class="row">
                                    <div class="col-4 mb-2 font-weight-bold">
                                        <label for="txtCantidad">Cantidad</label>
                                    </div>
                                    <div class="col-8 mb-2 text-end">
                                        <input
                                          type="number"
                                          class="form-control tex-end"
                                          name="txtCantidad"
                                          id="txtCantidad"
                                          value="1"
                                          onClick="this.select();">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mb-2">Total</div>
                            <div class="col-8 mb-2 text-end" id="divTotal">L. <span id="total"></span></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-warning" id="btnAddProducto">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de seleccion de ubicacion -->
    <div
      class="modal fade rounded-bottom"
      id="mdlUbicacion"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-center">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-2">
                                <a
                                  type="button"
                                  class="btn"
                                  data-dismiss="modal"
                                  id="btnCerrarUbicación"><i
                                  class="fa-solid fa-xmark"></i></a>
                            </div>
                            <div class="col-8">
                                <h3>Ubicación</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="container-fluid">
                                <div class="row mx-1">
                                    <div class="col-md-8">
                                        <input
                                          id="srcUbicacion"
                                          class="form-control form-control-sm
                                          mt-2 mb-2 w-80 mx-auto text-center font-weight-bold
                                          rounded border-0 shadow-sml"
                                          type="text"
                                          placeholder="Buscar un lugar">
                                    </div>
                                    <div id="map" class="col-sm-12"></div>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input
                                          type="text"
                                          class="col-12 mb-2"
                                          name="lon"
                                          id="txtUbicacion"
                                          placeholder="Ubicación"
                                          required>
                                        <input
                                          type="text"
                                          class="col-12 mb-2"
                                          name="lat"
                                          id="lat"
                                          placeholder="Latitud"
                                          required
                                          disabled>
                                          <input
                                          type="text"
                                          class="col-12 mb-2"
                                          name="lon"
                                          id="lon"
                                          placeholder="Longitud"
                                          required
                                          disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid text-center my-2">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-warning" id="btnAddOrden">Finalizar
                                            Compra</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de envio -->
    <div
      class="modal fade rounded-bottom"
      id="mdlFinalizar"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-center">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-2">
                                <a
                                  type="button"
                                  class="btn"
                                  data-dismiss="modal"
                                  id="btnCerrarAdd"><i
                                  class="fa-solid fa-xmark"></i></a>
                            </div>
                            <div class="col-8">
                                <h3 id="nomProduct">Finalizar Pago</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <form action="{{ route('carrito.crearPedido') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="col-12">
                                    <div class="row">
                                        <div class="mb-2 col-md-6">
                                            <label for="descripcion" class="form-label">Descripción</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="descripcion"
                                                id="descripcion"
                                                placeholder="Ingrese nombre del Producto" readonly >
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label for="idcliente" class="form-label">Cliente</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                rows="3"
                                                name="idcliente"
                                                id="idcliente"
                                                placeholder="Ingrese descripción del Producto" readonly >
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label for="productos" class="form-label hide">Productos</label>
                                            <input
                                                type="hidden"
                                                class="form-control"
                                                rows="3"
                                                name="productos"
                                                id="productos"
                                                placeholder="Ingrese descripción del Producto" readonly >
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label for="idcomercio" class="form-label">Comercio</label>
                                            <select
                                              class="form-select"
                                              name="idcomercio"
                                              id="idcomercio"
                                              readonly  ></select>
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label for="tarifa" class="form-label">Precio</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                name="tarifa"
                                                id="tarifa"
                                                placeholder="Ingese precio del Producto" readonly >
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label for="motorista" class="form-label">Motorista</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                name="motorista"
                                                id="motorista"
                                                placeholder="Ingese precio del Producto" readonly >
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2 text-center">
                                        <button type="submit" class="btn btn-warning" id="btnRegistrar">Comprar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer text-center">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-warning" id="btnFinalizar">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
  crossorigin="anonymous"></script>
<script src="../../resources/js/productos/productos.js"></script>
<script src="../../resources/js/productos/map.js"></script>
<!-- prettier-ignore -->
<script
  async
  defer
  type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzBq9H-M7exVwXolX125HWmbgrbbQns7s
    &callback=initMap&libraries=places&v=weekly"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Productos cargados
    const productosCargados = @JSON($productos);
    const comercios = @JSON($comercios);
    const {idcomercio, ...comercio} = comercios.find(comercio => comercio.idcomercio == '{{ $id }}');
    console.log(idcomercio);
    console.log(comercio);
    $("#nombreEmpresa").text('Productos');

    // letiables de productos
    let cantidadAdd = document.getElementById('txtCantidad');
    let totalAdd = document.getElementById('total');
    let precioProducto = 0;

    // letiables de add productos
    let productos = [];
    let producto = {};
    let totalCarrito = 0;
    let idProduct = 0;

    // letiables de usuario
    const idUser = localStorage.getItem("id");
    const nombreCompleto = localStorage.getItem("usuario");
    const ntarjeta = localStorage.getItem("nTarjeta");
    const expira = localStorage.getItem("expira");
    const cvv = localStorage.getItem("cvv");
    const telefono = localStorage.getItem("telefonoUser");
    const correo = localStorage.getItem("correo");

    // console.log("Pruena de usuario");

    function fechaActual() {
        let fecha = new Date();
        let mes = fecha.getMonth() + 1;
        let dia = fecha.getDate();
        let ano = fecha.getFullYear();
        if (dia < 10)
            dia = '0' + dia;
        if (mes < 10)
            mes = '0' + mes;
        return ano + "-" + mes + "-" + dia;
    }

    const addProducto = (idProd, precioProd, nombreProd, descProd) => {
        cantidadAdd.value = 1;
        $("#nomProduct").html(nombreProd);
        totalAdd.innerHTML = precioProd;
        precioProducto = precioProd;
        $("#descProduct").text(descProd);
        $("#mdlAdd").modal("show");

        // console.log(idProd);
        // console.log(precioProd);

        idProduct = idProd;
    }

    $("#btnAddProducto").click(function() {
        let nombreProd = $("#nomProduct").text();
        let cantidad = $("#txtCantidad").val();
        let total = $("#total").text();
        let descripcion = $("#descProduct").text();

        producto = {
            "idproducto": parseInt(idProduct),
            "nombreProducto": nombreProd,
            "descripcion": descripcion,
            "tarifa": 0,
            "cantidad": parseInt(cantidad),
            "total": parseInt(total),
            "idcliente": 9
        };

        if (producto)
            productos.push(producto);
        // console.log(productos);
        $("#mdlAdd").modal("hide");
    });

    const cargarCarrito = () => {
        totalCarrito = 0;
        $("#productosCarrito").empty();
        productos.forEach(producto => {
            totalCarrito += producto.total;
            console.log(totalCarrito);
            $("#productosCarrito").append(
                `<div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <h3>${producto.nombreProducto}</h3>
                            <div class="row">
                                <div class="col-8">${producto.descripcion}</div>
                                <div class="col-4 text-end">${producto.cantidad}</div>
                            </div>
                        </div>
                        <div class="col-12 text-end">Lps. ${producto.total}</div>
                        <hr>
                    </div>
                </div>`
            );
        });
    }

    $("#btnCarrito").click(function() {
        // console.log(productos)
        if (productos.length > 0) {
            cargarCarrito();
            $("#mdlCarrito").modal("show");
        } else
            Swal.fire({
                icon: 'warning',
                title: 'Alerta',
                text: 'No hay productos en el carrito!',
                timer: 1500,
                customClass: 'swal-wide',
                showConfirmButton: false,
            });
    });

    // Procesar orden
    $("#btnProcesar").click(function() {
        $("#txtTitular").val(localStorage.getItem("usuario"));
        $("#txtNumTar").val(localStorage.getItem("nTarjeta"));
        $("#txtFechaCad").val(localStorage.getItem("expira"));
        $("#txtCVV").val(localStorage.getItem("cvv"));
        $("#mdlCarrito").modal("hide");
        $("#mdlUbicacion").modal("show");
    });

    $("#btnCerrarUbicación").click(function () {
        // console.log("Hola mundo")
        $("#mdlUbicacion").modal("hide");
        $("#mdlCarrito").modal("show");
    });

    $("#btnPagar").click(function() {
        $("#mdlUbicacion").modal("show");
        $("#mdlPago").modal("hide");
        let nombreTitular = $("#txtTitular").val();
        let numeroTarjeta = $("#txtNumTar").val();
        let fechaVencimiento = $("#txtFechaCad").val();
        let codigoSeguridad = $("#txtCVV").val();
    });

    const getDistanciaKm = (lat1, lon1, lat2, lon2) =>{
        rad = function(x) {
            return x * Math.PI / 180;
        }
        let R = 6378.137; //Radio de la tierra en km
        let dLat = rad(lat2 - lat1);
        let dLong = rad(lon2 - lon1);
        let a = Math.sin(dLat / 2) * Math.sin(dLat / 2) + Math.cos(rad(lat1)) *
            Math.cos(rad(lat2)) * Math.sin(dLong / 2) * Math.sin(dLong / 2);
        let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

        //aquí obtienes la distancia en metros por la conversion 1Km =1000m
        let d = R * c * 1000;

        const distancaiKm = d / 1000;
        return distancaiKm;
    }

    $("#btnAddOrden").click(function () {
        let lat = $("#lat").val();
        let lng = $("#lon").val();
        let fecha = fechaActual();
        let ubicacion = $("#txtUbicacion").val();
        let comisionGestion = totalCarrito * 0.1;
        let comisionServicio = totalCarrito * 0.15;

        const tarifa = (0.5 * getDistanciaKm(lat, lng, comercio.latitud, comercio.longitud)).toFixed(2);
        const totalTarifa = parseFloat(tarifa) + parseFloat(totalCarrito);
        // console.log(tarifa);
        if (lat == "" || lng == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Alerta',
                text: 'Debe seleccionar una ubicación!',
                timer: 1500,
                showConfirmButton: false,
            });
            return;
        }
        let orden = {
            "descripcion": "Pedido de productos",
            "tarifa": totalTarifa,
            "idcliente": 0,
            "productos" : productos,
            "idmotorista": 0,
            "idcomercio": idcomercio,
            "latitud": lat,
            "longitud": lng,
            "ubicacion": ubicacion
        };
        // console.log(orden);

        const productosAsignados = productos.join(',');
        $("#descripcion").val(orden.descripcion);
        $("#productos").val(productosAsignados);
        $("#tarifa").val(totalTarifa);
        $("#idcliente").val(orden.idcliente);
        $("#motorista").val(orden.idmotorista);
        $("#idcomercio").val();
        $("#idcomercio").append(
            `<option value="${idcomercio}">${comercio.nombre}</option>`
            );

        $("#mdlUbicacion").modal("hide");
        $("#mdlFinalizar").modal("show");
        //window.href = rutaURL;
    });


</script>

</html>
