"use strict";

const modalCrearCargo = "#modalCrearCargo";
const formCrearCargo = "#formCrearCargo";
const rutaGuardarCargo = route("empleados.cargos.store");

$(function () {
    generalidades.marcarRequeridos(formCrearCargo);
    generalidades.validarFormulario(formCrearCargo, enviarDatos);
});

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formCrearCargo"));

    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            $(modalCrearCargo).modal('hide');
            window.iniciarComponentesCargos(formCrearCargo);
        }
        generalidades.resetValidate(formCrearCargo);
        generalidades.ocultarCargando(formCrearCargo);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaCargos").DataTable().ajax.reload(null, false);
    }
    const error = (response) => {
        generalidades.ocultarCargando(formCrearCargo);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    generalidades.create(rutaGuardarCargo, config, success, error);
    generalidades.mostrarCargando(formCrearCargo);
}