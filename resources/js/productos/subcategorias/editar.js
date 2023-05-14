"use strict";

// rutas 
const rutaEditar = "subcategorias.editar";

// id y clases
const formEditarSubcategorias = "#formEditarSubcategorias";
const seccionEditar = "#editarSubcategorias";
const modalEditarSubcategorias = "#modalEditarSubcategorias";

$(function () {
    generalidades.validarFormulario(formEditarSubcategorias, enviarDatos);
});

$(document).on("click", ".btnEditarSubcategoria", function () {
    let id = $(this).attr("data-modificar");
    if (id) {
        // id = JSON.parse(id);
        cargarDatos(id);
    }
});

const cargarDatos = (id) => {
    const ruta = route(rutaEditar, { "subcategoria": id });
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', ruta, 'body', modalEditarSubcategorias, seccionEditar, function(){
        window.iniciarComponentesSubcategorias(formEditarSubcategorias);
        generalidades.marcarRequeridos(formEditarSubcategorias);
    });
}

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formEditarSubcategorias"));
    
    const config = {
        'method': 'PUT',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }

    const success = (response) => {
        if (response.estado == 'success') {
            $(modalEditarSubcategorias).modal('hide');
            generalidades.resetValidate(formEditarSubcategorias);
        }
        generalidades.ocultarCargando(formEditarSubcategorias);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaSubcategorias").DataTable().ajax.reload(null, false);
    }

    const error = (response) => {
        generalidades.ocultarCargando(formEditarSubcategorias);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        generalidades.mostrarValidaciones(formEditarSubcategorias, response.validaciones);
    }
    const rutaActualizar = route("subcategorias.actualizar", { "subcategoria": formData.get("id") });
    generalidades.edit(rutaActualizar, config, success, error);
    generalidades.mostrarCargando(formEditarSubcategorias);
}