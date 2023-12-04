// Funcionalidades de texto y letios
let cantidadAdd = document.getElementById('txtCantidad');
let totalAdd = document.getElementById('total');
let precioProducto = 0;

// letiables de add productos
let productos = [];
let producto = {};
let totalCarrito = 0;

// letiables de usuario
const idUser = localStorage.getItem("id");
const nombreCompleto = localStorage.getItem("usuario");
const ntarjeta = localStorage.getItem("nTarjeta");
const expira = localStorage.getItem("expira");
const cvv = localStorage.getItem("cvv");
const telefono = localStorage.getItem("telefonoUser");
const correo = localStorage.getItem("correo");


$(document).ready(function () {
    $('.hijo').click( function () {
        $("#menu").prop( "checked", false );
        console.log($(this).attr('id'))
    })
})

// funcion para obtener la fecha actual
function fechaActual() {
    let fecha = new Date();
    let mes = fecha.getMonth()+1;
    let dia = fecha.getDate();
    let ano = fecha.getFullYear();
    if(dia<10)
        dia='0'+dia;
    if(mes<10)
        mes='0'+mes;
    return ano+"-"+mes+"-"+dia;
}

const idCategoria = localStorage.getItem("idCategoria");
const idEmpresa = localStorage.getItem("idEmpresa");
console.log(`Id de categoria: ${idCategoria}`);
console.log(`Id de empresa: ${idEmpresa}`);



$("#btnCerrarCarrito").click(function () {
    $("#mdlCarrito").modal("hide");
    carrito.hide();
});

$("#btnCerrarAdd").click(function () {
    $("#mdlAdd").modal("hide");
});

const addProducto = (idProd, precioProd, nombreProd, descProd) => {
    cantidadAdd.value = 1;
    $("#nomProduct").html(nombreProd);
    totalAdd.innerHTML = precioProd;
    precioProducto = precioProd;
    $("#descProduct").text(descProd);
    $("#mdlAdd").modal("show");
    
    console.log(idProd);
    console.log(precioProd);
}

$("#txtCantidad").change(function () {
    let nuevaCantidad = cantidadAdd.value;
    let nuevoTotal = nuevaCantidad * precioProducto;
    totalAdd.innerHTML = nuevoTotal;
    console.log(nuevoTotal);
});

$("#btnProcesar").click(function () {
    $("#txtTitular").val(localStorage.getItem("usuario"));
    $("#txtNumTar").val(localStorage.getItem("nTarjeta"));
    $("#txtFechaCad").val(localStorage.getItem("expira"));
    $("#txtCVV").val(localStorage.getItem("cvv"));
    $("#mdlCarrito").modal("hide");
    $("#mdlPago").modal("show");
});

$("#btnCerrarPago").click(function () {
    $("#mdlCarrito").modal("show");
    $("#mdlPago").modal("hide");
});

$("#btnCerrarUbicación").click(function () {
    console.log("Hola mundo")
    $("#mdlUbicacion").modal("hide");
    $("#mdlPago").modal("show");
});



const cargarProductos = async (idCategoria, idEmpresa) => {
    const respuesta = await fetch(`http://localhost:3000/categorias/${idCategoria}/empresas/${idEmpresa}/productos`, {
        method: "GET",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json",
        }
    });
    const empresa = await respuesta.json();
    console.log(empresa);
    let logo = empresa.logo;
    let portada = empresa.imagen;
    let nombreEmpresa = empresa.empresa;
    console.log("Portada: " + portada);

    let urlPortada = `url('../assets/${portada}')`;

    $("#cabecera").css("background-image", `${urlPortada}`);
    $("#logoEmpresa").attr("src", `../assets/${logo}`);
    $("#nombreEmpresa").text(nombreEmpresa);

    
    const productos = empresa.productos;

    $("#productosCargados").empty();
    let contador = 0;
    productos.forEach(producto => {
        contador++;
        $("#productosCargados").append(
            `<div class="col-5 m-2 text-center restaurantes" id="producto-${contador}"
                onclick="addProducto(${contador}, ${producto.precio}, '${producto.nombreProducto}', '${producto.descripcion}')">
                <div class="row">
                    <div class="col-md-12 img-restaurante mb-2"
                        style="background-image: url('../assets/${producto.imagenProducto}'); height: 100px;">
                    </div>
                    <div class="col-md-12 info-restaurante">
                        <div class="row">
                            <div class="col-12 text-start">
                                ${producto.nombreProducto}
                            </div>
                            <div class="col-12 text-start">
                                ${producto.descripcion}
                            </div>
                        </div>
                    </div>
                </div>
            </div>`
        );
    });
    console.log(empresa.productos);
}
cargarProductos(idCategoria, idEmpresa);
let btnCarrito = document.getElementById("btnCarrito");

btnCarrito.addEventListener('click', function() {
    console.log(productos)
    if(productos.length > 0){
        cargarCarrito();
        $("#mdlCarrito").modal("show");
    }else
    Swal.fire({
        icon: 'warning',
        title: 'Alerta',
        text: 'No hay productos en el carrito!',
        timer: 1500,
        customClass: 'swal-wide',
        showConfirmButton: false,
    });
});

$("#btnAddProducto").click(function () {
    let nombreProd = $("#nomProduct").text();
    let cantidad = $("#txtCantidad").val();
    let total = $("#total").text();
    let descripcion = $("#descProduct").text();
    producto = {
        "nombreProducto": nombreProd,
        "descripcion": descripcion,
        "cantidad": parseInt(cantidad),
        "total": parseInt(total)
    };

    if(producto)
        productos.push(producto);
    console.log(productos);
    $("#mdlAdd").modal("hide");
});

const cargarCarrito = () => {
    totalCarrito = 0;
    $("#productosCarrito").empty();
    productos.forEach(producto => {
        totalCarrito += producto.total;
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

$("#btnPagar").click(function () {
    $("#mdlUbicacion").modal("show");
    $("#mdlPago").modal("hide");
    let nombreTitular = $("#txtTitular").val();
    let numeroTarjeta = $("#txtNumTar").val();
    let fechaVencimiento = $("#txtFechaCad").val();
    let codigoSeguridad = $("#txtCVV").val();
});

$("#btnAddOrden").click(function () {
    let lat = $("#lat").val();  
    let lng = $("#lon").val();
    let fecha = fechaActual();
    let ubicacion = $("#txtUbicacion").val();
    let comisionGestion = totalCarrito * 0.1;
    let comisionServicio = totalCarrito * 0.15;
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
        "numeroOrden": 1,
        "_idCliente": idUser,
        "nombreCliente": nombreCompleto,
        "celularCliente": telefono,
        "ubicacion": ubicacion,
        "latitud": lat,
        "longitud": lng,
        "productos" : productos,
        "comisionGestion": comisionGestion,
        "comisionServicio": comisionServicio,
        "totalPrice": totalCarrito,
        "estado": "Libre",
        "fechaSolicitud": fecha,
        "fechaEntrega": "",
        "horaEntrega": ""
    };
    console.log(orden);
    addOrden(orden);
});


const addOrden = async (orden) => {
    let respuesta = await fetch("http://localhost:3000/pedidos", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json",
        }, 
        body: JSON.stringify(orden)
    });
    let ordenRespuesta = await respuesta.json();
    console.log(ordenRespuesta);
    if (ordenRespuesta) {
        let ordenCliente = {
            "idOrden": ordenRespuesta._id,
            "total": ordenRespuesta.totalPrice,
            "entregado": false
        }

        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Orden agregada correctamente!',
            timer: 1500,
            showConfirmButton: false,
        });
        productos = [];
        $("#mdlUbicacion").modal("hide");
        $("#mdlPago").modal("hide");
        $("#mdlCarrito").modal("hide");
        addOrdenCliente(ordenCliente);
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error al agregar la orden!',
            timer: 1500,
            showConfirmButton: false,
        });
    }
}

const addOrdenCliente = async (ordenCliente) => {
    const cliente = await fetch(`http://localhost:3000/clientes/${idUser}/ordenes`, {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify(ordenCliente)
    });
    const clienteRespuesta = await cliente.json();
    console.log(clienteRespuesta);
    if (clienteRespuesta.modifiedCount != 0) {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Orden agregada correctamente!',
            timer: 1500,
            showConfirmButton: false,
        });
    } else {    
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error al agregar la orden!',
            timer: 1500,
            showConfirmButton: false,
        });
    }
}