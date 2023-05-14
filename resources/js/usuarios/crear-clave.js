"use strict";

// id y clases
const formCrearClaveUsuario = "#formCrearClaveUsuario";

$(function () {
    generalidades.validarFormulario(formCrearClaveUsuario, enviarDatos);
});

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formCrearClaveUsuario"));
    
    const config = {
        'method': 'PUT',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }

    const success = (response) => {
        if (response.estado == 'success') {
            generalidades.toastrGenerico(response?.estado, response?.mensaje);
        }
        generalidades.resetValidate(form);
        generalidades.ocultarCargando(form);
        if (response?.redirecion) {
            window.location.replace("/");
        }
    }

    const error = (response) => {
        generalidades.ocultarCargando(form);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        generalidades.mostrarValidaciones(form, response.validaciones);
    }
    const rutaActualizar = route("usuarios.actualizar", { "usuario": formData.get("id") });
    generalidades.edit(rutaActualizar, config, success, error);
    generalidades.mostrarCargando(form);
}