"use strict";

// rutas 
const rutaEditar = "empleados.cargos.editar";

// id y clases
const formEditarCargo = "#formEditarCargo";
const seccionEditar = "#editarCargo";
const modalEditar = "#modalEditarCargo";

$(function () {
    generalidades.validarFormulario(formEditarCargo, enviarDatos);
});

$(document).on("click", ".btnEditarCargo", function () {
    let id = $(this).attr("data-modificar");
    if (id) {
        cargarDatos(id);
    }
});

const cargarDatos = (id) => {
    const ruta = route(rutaEditar, { "cargo": id });
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', ruta, 'body', modalEditar, seccionEditar, function(){
        window.iniciarComponentesCargos(formEditarCargo);
        generalidades.marcarRequeridos(formEditarCargo);
    });
}

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formEditarCargo"));
    
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
        generalidades.ocultarCargando(formEditarCargo);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaCargos").DataTable().ajax.reload(null, false);
    }

    const error = (response) => {
        generalidades.ocultarCargando(formEditarCargo);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    const rutaActualizar = route("empleados.cargos.actualizar", { "cargo": formData.get("id") });
    generalidades.edit(rutaActualizar, config, success, error);
    generalidades.mostrarCargando(formEditarCargo);
}