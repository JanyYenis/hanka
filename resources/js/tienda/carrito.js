"use strict";
const btnRestarCantidad = ".btnRestarCantidad";
const btnSumarCantidad = ".btnSumarCantidad";
const tablaCarrito = "#tablaCarrito";
const total = ".total";
const seccionTabla = ".seccionTabla";

let productosSeleccionados = [];

$(function () {
    marcarSeleccionados();
    // iniciar();
});

$(document).on("click", btnSumarCantidad, function () {
    let id = $(this).attr("data-carrito");
    if (id) {
        sumarCantidad(id);
    }
});

$(document).on("click", btnRestarCantidad, function () {
    let id = $(this).attr("data-carrito");
    if (id) {
        restarCantidad(id);
    }
});

const sumarCantidad = (id) => {
    let ruta = route("carrito.sumarCantidad", { 'carrito': id });
    generalidades.refrescarSeccion(null, ruta, seccionTabla, function (response) {
        generalidades.ocultarCargando(seccionTabla);
    });
}

const restarCantidad = (id) => {
    let ruta = route("carrito.restarCantidad", { 'carrito': id });
    generalidades.refrescarSeccion(null, ruta, seccionTabla, function (response) {
        generalidades.ocultarCargando(seccionTabla);
    });
}

$(document).on("click", "#btnRegistarPedido", function () {
    if (productosSeleccionados.length == 0) {
        generalidades.toastrGenerico("info", "Debes de seleccionar al menos un producto del carrito.");
        return;
    }
    hacerPedido();
});

const hacerPedido = () => {
    window.location.href = `/pedidos/${productosSeleccionados}/realizar-pedido`;
}

const marcarSeleccionados = () => {
    // activar el evento del click del check de seleccionar todos.
    $(document).on("change", ".checkSeleccionarTodos", function () {
        let seleccionado = this.checked;
        $(".checkSeleccionado").each(function () {
            if (this.checked == seleccionado) {
                return;
            }

            this.checked = seleccionado;
            $(this).trigger('change');
        });
    });

    $(document).on("change", ".checkSeleccionado", function () {
        let idProducto = $(this).attr("data-pedido");

        if (this.checked) {
            productosSeleccionados.push(idProducto);
        } else {
            productosSeleccionados = productosSeleccionados.filter((producto) => producto != idProducto);
        }

        let cantidadChecks = $(`#tablaCarrito .checkSeleccionado`).length;
        $(`#tablaCarrito .checkSeleccionarTodos`).prop("checked", cantidadChecks === productosSeleccionados.length);
    });
}

const iniciar = () => {
    const driver = new Driver();
        driver.highlight({
        element: '#selectT',
        popover: {
            title: 'Title for the Popover',
            description: 'Description for it',
        }
    });
}