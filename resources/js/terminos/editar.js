"use strict";

// rutas 
const rutaEditar = "terminos.editar";

// id y clases
const formEditarTerminos = "#formEditarTerminos";
const seccionEditar = "#editarTerminos";
const modalEditarTerminos = "#modalEditarTerminos";

$(function () {
    generalidades.validarFormulario(formEditarTerminos, enviarDatos);
});

$(document).on("click", ".btnEditarTermino", function () {
    let id = $(this).attr("data-modificar");
    if (id) {
        // id = JSON.parse(id);
        cargarDatos(id);
    }
});

const cargarDatos = (id) => {
    const ruta = route(rutaEditar, { "termino": id });
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', ruta, 'body', modalEditarTerminos, seccionEditar, function(){
        window.iniciarComponentesTerminos(formEditarTerminos);
        generalidades.marcarRequeridos(formEditarTerminos);
    });
}

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formEditarTerminos"));
    
    const config = {
        'method': 'PUT',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }

    const success = (response) => {
        if (response.estado == 'success') {
            $(modalEditarTerminos).modal('hide');
        }
        generalidades.ocultarCargando(formEditarTerminos);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaTerminos").DataTable().ajax.reload(null, false);
    }

    const error = (response) => {
        generalidades.ocultarCargando(formEditarTerminos);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        generalidades.mostrarValidaciones(formEditarTerminos, response.validaciones);
    }
    const rutaActualizar = route("terminos.actualizar", { "termino": formData.get("id") });
    generalidades.edit(rutaActualizar, config, success, error);
    generalidades.mostrarCargando(formEditarTerminos);
}