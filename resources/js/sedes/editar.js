"use strict";

// rutas 
const rutaEditar = "sedes.editar";

// id y clases
const formEditarSedes = "#formEditarSedes";
const seccionEditar = "#editarSedes";
const modalEditar = "#modalEditarSedes";

$(function () {
    generalidades.validarFormulario(formEditarSedes, enviarDatos);
});

$(document).on("click", ".btnEditarSede", function () {
    let id = $(this).attr("data-modificar");
    if (id) {
        cargarDatos(id);
    }
});

const cargarDatos = (id) => {
    const ruta = route(rutaEditar, { "sede": id });
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', ruta, 'body', modalEditar, seccionEditar, function(){
        window.iniciarComponentesSedes(formEditarSedes);
        $(`${formEditarSedes} #selectPais`).trigger('change');
        generalidades.marcarRequeridos(formEditarSedes);
    });
}

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formEditarSedes"));
    let inputTelefono = generalidades.darTelefonoInput(`${formEditarSedes} .tel`);
	let tel = inputTelefono?.getNumber(intlTelInputUtils.numberFormat.NATIONAL);
    tel = tel.replace(/\((\w+)\)/g, "$1");
    tel = tel.replace(/-/g, "");
	let codigo = inputTelefono?.getSelectedCountryData()?.dialCode ?? '';
    formData.set('numero', "+"+codigo+tel);
    
    const config = {
        'method': 'PUT',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }

    const success = (response) => {
        if (response.estado == 'success') {
            $(modalEditar).modal('hide');
        }
        generalidades.ocultarCargando(form);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaSedes").DataTable().ajax.reload(null, false);
    }

    const error = (response) => {
        generalidades.ocultarCargando(form);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    const rutaActualizar = route("sedes.actualizar", { "sede": formData.get("id") });
    generalidades.edit(rutaActualizar, config, success, error);
    generalidades.mostrarCargando(form);
}