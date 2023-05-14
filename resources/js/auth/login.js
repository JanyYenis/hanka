"use strict";

const formLogin = "#formLogin";
const rutaLogin = route("login.confirmar");

$(function () {
    generalidades.validarFormulario(formLogin, enviarDatos);
});

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formLogin"));

    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            window.location.href = route('admin.index');
        }
        generalidades.resetValidate(form);
        generalidades.ocultarCargando(form);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    const error = (response) => {
        generalidades.ocultarCargando(form);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    generalidades.create(rutaLogin, config, success, error);
    generalidades.mostrarCargando(form);
}