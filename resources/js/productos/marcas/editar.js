"use strict";

// rutas 
const rutaEditar = "marcas.editar";

// id y clases
const formEditarMarcas = "#formEditarMarcas";
const seccionEditar = "#editarMarcas";
const modalEditarMarcas = "#modalEditarMarcas";

$(function () {
    generalidades.marcarRequeridos(formEditarMarcas);
    generalidades.validarFormulario(formEditarMarcas, enviarDatos);
});

$(document).on("click", ".btnEditarMarca", function () {
    let id = $(this).attr("data-modificar");
    if (id) {
        // id = JSON.parse(id);
        cargarDatos(id);
    }
});

const cargarDatos = (id) => {
    const ruta = route(rutaEditar, { "marca": id });
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', ruta, 'body', modalEditarMarcas, seccionEditar, function(){
        window.iniciarComponentesMarcas(formEditarMarcas);
        generalidades.marcarRequeridos(formEditarMarcas);
    });
}

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formEditarMarcas"));
    
    const config = {
        'method': 'PUT',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }

    const success = (response) => {
        if (response.estado == 'success') {
            $(modalEditarMarcas).modal('hide');
        }
        generalidades.ocultarCargando(formEditarMarcas);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaMarcas").DataTable().ajax.reload(null, false);
    }

    const error = (response) => {
        generalidades.ocultarCargando(formEditarMarcas);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        generalidades.mostrarValidaciones(formEditarMarcas, response.validaciones);
    }
    const rutaActualizar = route("marcas.actualizar", { "marca": formData.get("id") });
    generalidades.edit(rutaActualizar, config, success, error);
    generalidades.mostrarCargando(formEditarMarcas);
}