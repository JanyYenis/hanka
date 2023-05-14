"use strict";

const modalCrearMarcas = "#modalCrearMarcas";
const formCrearMarcas = "#formCrearMarcas";
const rutaGuardarMarca = route("marcas.store");

$(function () {
    generalidades.marcarRequeridos(formCrearMarcas);
    generalidades.validarFormulario(formCrearMarcas, enviarDatos);
});

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formCrearMarcas"));

    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            $(modalCrearMarcas).modal('hide');
            window.iniciarComponentesMarcas(formCrearMarcas);
            generalidades.ocultarValidaciones(formCrearMarcas);
        }
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaMarcas").DataTable().ajax.reload(null, false);
        generalidades.ocultarCargando(formCrearMarcas);
        generalidades.resetValidate(formCrearMarcas);
    }
    const error = (response) => {
        generalidades.mostrarValidaciones(formCrearMarcas, response.validaciones);
        generalidades.ocultarCargando(formCrearMarcas);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    generalidades.create(rutaGuardarMarca, config, success, error);
    generalidades.mostrarCargando(formCrearMarcas);
}