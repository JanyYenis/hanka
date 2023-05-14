"use strict";

// rutas 
const rutaEditar = "productos.editar";

// id y clases
const formEditarProductos = "#formEditarProductos";
const seccionEditar = "#editarProductos";
const modalEditarProductos = "#modalEditarProductos";

$(function () {
    generalidades.validarFormulario(formEditarProductos, enviarDatos);
});

$(document).on("click", ".btnEditarProducto", function () {
    let id = $(this).attr("data-modificar");
    if (id) {
        // id = JSON.parse(id);
        cargarDatos(id);
    }
});

const cargarDatos = (id) => {
    const ruta = route(rutaEditar, { "producto": id });
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', ruta, 'body', modalEditarProductos, seccionEditar, function(){
        window.iniciarComponentesProductos(formEditarProductos);
        $('#selectCategoria').trigger('change');
        generalidades.marcarRequeridos(formEditarProductos);
    });
}

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formEditarProductos"));
    
    const config = {
        'method': 'PUT',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }

    const success = (response) => {
        if (response.estado == 'success') {
            $(modalEditarProductos).modal('hide');
            generalidades.resetValidate(formEditarProductos);
            iniciarComponentesProductos();
        }
        generalidades.ocultarCargando(formEditarProductos);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaProductos").DataTable().ajax.reload(null, false);
    }

    const error = (response) => {
        generalidades.ocultarCargando(formEditarProductos);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        generalidades.mostrarValidaciones(formEditarProductos, response.validaciones);
    }
    const rutaActualizar = route("productos.actualizar", { "producto": formData.get("id") });
    generalidades.edit(rutaActualizar, config, success, error);
    generalidades.mostrarCargando(formEditarProductos);
}