"use strict";

// rutas 
const rutaEditar = "usuarios.editar";

// id y clases
const formEditarUsuario = "#formEditarUsuario";
const seccionEditar = "#editarUsuario";
const modalEditar = "#modalEditarUsuario";

$(function () {
    generalidades.validarFormulario(formEditarUsuario, enviarDatos);
});

$(document).on("click", ".btnEditar", function () {
    let id = $(this).attr("data-modificar");
    if (id) {
        // id = JSON.parse(id);
        cargarDatos(id);
    }
});

const cargarDatos = (id) => {
    const ruta = route(rutaEditar, { "usuario": id });
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', ruta, 'body', modalEditar, seccionEditar, function(){
        window.iniciarComponentesUsuarios(formEditarUsuario);
        $(`${formEditarUsuario} .selectPais`).trigger('change');
        generalidades.marcarRequeridos(formEditarUsuario);
    });
}

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formEditarUsuario"));
    let inputTelefono = generalidades.darTelefonoInput(`${formEditarUsuario} #tel`);
	let tel = inputTelefono?.getNumber(intlTelInputUtils.numberFormat.NATIONAL);
    tel = tel.replace(/\((\w+)\)/g, "$1");
    tel = tel.replace(/-/g, "");
	let codigo = inputTelefono?.getSelectedCountryData()?.dialCode ?? '';
    formData.set('telefono', "+"+codigo+tel);
    
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
            generalidades.ocultarValidaciones(formEditarUsuario);
        }
        generalidades.ocultarCargando(formEditarUsuario);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaUsuarios").DataTable().ajax.reload(null, false);
    }

    const error = (response) => {
        generalidades.ocultarCargando(formEditarUsuario);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        generalidades.mostrarValidaciones(formEditarUsuario, response.validaciones);
    }
    const rutaActualizar = route("usuarios.actualizar", { "usuario": formData.get("id") });
    generalidades.edit(rutaActualizar, config, success, error);
    generalidades.mostrarCargando(formEditarUsuario);
}