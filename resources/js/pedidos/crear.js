"use strict";

const modalCrearProductos = "#modalCrearProductos";
const formCrearProductos = "#formCrearProductos";
const rutaGuardarUsuario = route("productos.store");

$(function () {
    generalidades.marcarRequeridos(formCrearProductos);
    generalidades.validarFormulario(formCrearProductos, guardarProducto);
});

window.guardarProducto = (form) => {
    let formData = new FormData(document.getElementById("formCrearProductos"));
    let descripcion = $(formCrearProductos).find(".descripcion").summernote("code").trim();
    let oferta = $(formCrearProductos).find(".oferta").summernote("code").trim();
    formData.append("descripcion", descripcion);
    formData.append("oferta", oferta);

    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            $(modalCrearProductos).modal('hide');
            window.iniciarComponentesProductos(formCrearProductos);
            generalidades.ocultarValidaciones(formCrearProductos);
            generalidades.resetValidate(formCrearProductos);
        }
        generalidades.ocultarCargando(formCrearProductos);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaProductos").DataTable().ajax.reload(null, false);
    }
    const error = (response) => {
        generalidades.mostrarValidaciones(formCrearProductos, response.validaciones);
        generalidades.ocultarCargando(formCrearProductos);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    generalidades.create(rutaGuardarUsuario, config, success, error);
    generalidades.mostrarCargando(formCrearProductos);
}