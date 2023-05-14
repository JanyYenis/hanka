"use strict";

// rutas 
const rutaEditarCiudades = "ciudades.editar";

// id y clases
const formEditarCiudades = "#formEditarCiudades";
const editarCiudades = "#editarCiudades";
const modalEditarCiudades = "#modalEditarCiudades";

$(function () {
    generalidades.validarFormulario(formEditarCiudades, enviarDatos);
});

$(document).on("click", ".btnEditarCiudad", function () {
    let id = $(this).attr("data-modificar");
    if (id) {
        cargarDatos(id);
    }
});

const cargarDatos = (id) => {
    const ruta = route(rutaEditarCiudades, { "ciudad": id });
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', ruta, 'body', modalEditarCiudades, editarCiudades, function(){
        window.iniciarComponentesCiudades(formEditarCiudades);
    });
}

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formEditarCiudades"));
    
    const config = {
        'method': 'PUT',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }

    const success = (response) => {
        if (response.estado == 'success') {
            $(modalEditarCiudades).modal('hide');
        }
        generalidades.ocultarCargando(formEditarCiudades);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaCiudades").DataTable().ajax.reload(null, false);
        generalidades.resetValidate(formEditarCiudades);
    }

    const error = (response) => {
        generalidades.ocultarCargando(formEditarCiudades);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    const rutaActualizarCiudades = route("ciudades.actualizar", { "ciudad": formData.get("id") });
    generalidades.edit(rutaActualizarCiudades, config, success, error);
    generalidades.mostrarCargando(formEditarCiudades);
}