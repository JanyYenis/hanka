"use strict";

const modalCrearUsuario = "#modalCrearUsuario";
const formCrearUsuario = "#formCrearUsuario";
const rutaGuardarUsuario = route("usuarios.store");

$(function () {
    generalidades.marcarRequeridos(formCrearUsuario);
    generalidades.validarFormulario(formCrearUsuario, enviarDatos);
});

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formCrearUsuario"));
    let inputTelefono = generalidades.darTelefonoInput(`${formCrearUsuario} #tel`);
	let tel = inputTelefono?.getNumber(intlTelInputUtils.numberFormat.NATIONAL);
    tel = tel.replace(/\((\w+)\)/g, "$1");
    tel = tel.replace(/-/g, "");
	let codigo = inputTelefono?.getSelectedCountryData()?.dialCode ?? '';
    formData.set('telefono', "+"+codigo+tel);

    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            $(modalCrearUsuario).modal('hide');
            window.iniciarComponentesUsuarios(formCrearUsuario, modalCrearUsuario);
            generalidades.ocultarValidaciones(formCrearUsuario);
        }
        generalidades.resetValidate(formCrearUsuario);
        generalidades.ocultarCargando(formCrearUsuario);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaUsuarios").DataTable().ajax.reload(null, false);
    }
    const error = (response) => {
        generalidades.mostrarValidaciones(formCrearUsuario, response.validaciones);
        generalidades.ocultarCargando(formCrearUsuario);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    generalidades.create(rutaGuardarUsuario, config, success, error);
    generalidades.mostrarCargando(formCrearUsuario);
}