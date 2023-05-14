"use strict";

const modalCrearSubcategorias = "#modalCrearSubcategorias";
const formCrearSubcategorias = "#formCrearSubcategorias";
const rutaGuardarSubcategoria = route("subcategorias.store");

$(function () {
    generalidades.marcarRequeridos(formCrearSubcategorias);
    generalidades.validarFormulario(formCrearSubcategorias, enviarDatos);
});

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formCrearSubcategorias"));

    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            $(modalCrearSubcategorias).modal('hide');
            window.iniciarComponentesSubcategorias(formCrearSubcategorias);
            generalidades.ocultarValidaciones(formCrearSubcategorias);
        }
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaSubcategorias").DataTable().ajax.reload(null, false);
        generalidades.ocultarCargando(formCrearSubcategorias);
        generalidades.resetValidate(formCrearSubcategorias);
    }
    const error = (response) => {
        generalidades.mostrarValidaciones(formCrearSubcategorias, response.validaciones);
        generalidades.ocultarCargando(formCrearSubcategorias);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    generalidades.create(rutaGuardarSubcategoria, config, success, error);
    generalidades.mostrarCargando(formCrearSubcategorias);
}