"use strict";

const modalCrearCiudades = "#modalCrearCiudades";
const formCrearCiudades = "#formCrearCiudades";
const crearCiudades = "#crearCiudades";
const rutaGuardarCiudades = route("ciudades.store");
const rutaCrearCiudades = "ciudades.create";

$(function () {
    generalidades.validarFormulario(formCrearCiudades, enviarDatos);
});

$(document).on("click", `#btnCiudadesCrear`, function () {
    let idPais = $('#btnCiudadesCrear').attr('data-pais');
    if (idPais) {
        crearCiudad(idPais);
    }
});

const crearCiudad = (id) => {
    const rutaCrearC = route(rutaCrearCiudades, { "pais": id });
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', rutaCrearC, 'body', modalCrearCiudades, crearCiudades, function(){
        window.iniciarComponentesCiudades(formCrearCiudades);
    });
}

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formCrearCiudades"));

    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            $(modalCrearCiudades).modal('hide');
            window.iniciarComponentesCiudades(formCrearCiudades);
        }
        generalidades.resetValidate(formCrearCiudades);
        generalidades.ocultarCargando(formCrearCiudades);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaCiudades").DataTable().ajax.reload(null, false);
    }
    const error = (response) => {
        generalidades.ocultarCargando(formCrearCiudades);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    generalidades.create(rutaGuardarCiudades, config, success, error);
    generalidades.mostrarCargando(formCrearCiudades);
}