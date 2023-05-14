"use strict";

const modalVerPqrs = "#modalVerPqrs";
const formVerPqrs = "#formVerPqrs";
const rutaModalVer = "pqrs.ver";
const rutaGuardarVer = "pqrs.update";
const contenidoVerPqrs = "#contenidoVerPqrs";

$(function () {
    generalidades.validarFormulario(formVerPqrs, enviarDatos);
});

$(document).on("click", ".btnVerPqrs", function () {
    let id = $(this).attr("data-ver");
    if (id) {
        cargarDatos(id);
    }
});

$(document).on('click', `${formVerPqrs} .btnRefrescarTablaPqrs`, function () {
    $("#tablaPqrs").DataTable().ajax.reload(null, false);
});

const cargarDatos = (id = 1000) => {
    let ruta = route(rutaModalVer, {
        "pqrs": id
    });
    let method = 'GET';
    generalidades.mostrarCargando('body');
    generalidades.ejecutar(method, ruta, 'body', modalVerPqrs, contenidoVerPqrs, function(){
        window.iniciarComponentesPqrs(formVerPqrs);
    });
}

const enviarDatos = (form) => {

    let respuesta = $(form).find("#summernote").summernote("code").trim();
    let formData = new FormData(document.getElementById("formVerPqrs"));
    formData.append("descripcion_respuesta", respuesta);

    const config = {
        'method': 'PUT',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            $('#GuardarPrqs').addClass('d-none');
            $(modalVerPqrs).modal("hide");
            window.iniciarComponentes(formVerPqrs);
        }
        generalidades.ocultarCargando('body');
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaPqrs").DataTable().ajax.reload(null, false);
    }
    const error = (response) => {
        generalidades.ocultarCargando('body');
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    let ruta = route(rutaGuardarVer, { pqrs: formData.get('id') });
    generalidades.edit(ruta, config, success, error);
    generalidades.mostrarCargando('body');
}