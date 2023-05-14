"use strict";

const modalCrearTerminos = "#modalCrearTerminos";
const formCrearTerminos = "#formCrearTerminos";
const rutaGuardarTermino = route("terminos.store");

$(function () {
    generalidades.marcarRequeridos(formCrearTerminos);
    generalidades.validarFormulario(formCrearTerminos, enviarDatos);
});

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formCrearTerminos"));

    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            $(modalCrearTerminos).modal('hide');
            window.iniciarComponentesTerminos(formCrearTerminos);
            generalidades.ocultarValidaciones(formCrearTerminos);
        }
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaTerminos").DataTable().ajax.reload(null, false);
        generalidades.ocultarCargando(formCrearTerminos);
        generalidades.resetValidate(formCrearTerminos);
    }
    const error = (response) => {
        generalidades.mostrarValidaciones(formCrearTerminos, response.validaciones);
        generalidades.ocultarCargando(formCrearTerminos);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    generalidades.create(rutaGuardarTermino, config, success, error);
    generalidades.mostrarCargando(formCrearTerminos);
}