"use strict";

const modalCrearSedes = "#modalCrearSedes";
const formCrearSedes = "#formCrearSedes";
const rutaGuardarSede = route("sedes.store");

$(function () {
    generalidades.marcarRequeridos(formCrearSedes);
    generalidades.validarFormulario(formCrearSedes, enviarDatos);
});

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formCrearSedes"));
    let inputTelefono = generalidades.darTelefonoInput(`${formCrearSedes} .tel`);
	let tel = inputTelefono?.getNumber(intlTelInputUtils.numberFormat.NATIONAL);
    tel = tel.replace(/\((\w+)\)/g, "$1");
    tel = tel.replace(/-/g, "");
	let codigo = inputTelefono?.getSelectedCountryData()?.dialCode ?? '';
    formData.set('numero', "+"+codigo+tel);

    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            $(modalCrearSedes).modal('hide');
        }
        generalidades.ocultarCargando(form);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaSedes").DataTable().ajax.reload(null, false);
        generalidades.resetValidate(form);
    }
    const error = (response) => {
        generalidades.ocultarCargando(form);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    generalidades.create(rutaGuardarSede, config, success, error);
    generalidades.mostrarCargando(form);
}