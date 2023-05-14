"use strict";

const modalCrearEmpleado = "#modalCrearEmpleado";
const formCrearEmpleado = "#formCrearEmpleado";
const rutaGuardarEmpleado = route("empleados.store");
const selectUsuarios = '.selectUsuarios';
const selectCargos = '.selectCargos';

$(function () {
    generalidades.marcarRequeridos(formCrearEmpleado);
    generalidades.validarFormulario(formCrearEmpleado, enviarDatos);
});

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formCrearEmpleado"));

    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            $(modalCrearEmpleado).modal('hide');
            window.iniciarComponentesEmpleado(formCrearEmpleado);
        }
        limpiar();
        generalidades.ocultarCargando(formCrearEmpleado);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaEmpleados").DataTable().ajax.reload(null, false);
    }
    const error = (response) => {
        generalidades.ocultarCargando(formCrearEmpleado);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    generalidades.create(rutaGuardarEmpleado, config, success, error);
    generalidades.mostrarCargando(formCrearEmpleado);
}

const limpiar = () => {
    generalidades.resetValidate(formCrearEmpleado);
    $(selectCargos).empty();
    $(selectUsuarios).empty();
}