"use strict";
const modalCrearPqrs = "#modalCrearPqrs";
const formPqrs = "#formPqrs";
const rutaModal = "pqrs.create";
const rutaGuardar = route("pqrs.store");
const contenidoPqrs = "#contenidoPqrs";

$(function () {
    // let myDropzone = new Dropzone("#kt_dropzone_4");
    // myDropzone.on("addedfile", file => {
    // console.log(`File added: ${file.name}`);
    // });
    generalidades.validarFormulario(formPqrs, enviarDatos);
});

$(document).on("click", ".btnPqrs", function () {
    let id = $(this).attr("data-crear");
    if (id) {
        cargarDatos(id);
    }
});

const cargarDatos = (id = 1000) => {
    let ruta = route(rutaModal, {
        "usuario": id
    });
    let method = 'GET';

    generalidades.mostrarCargando('body');
    generalidades.ejecutar(method, ruta, 'body', modalCrearPqrs, contenidoPqrs, function(){
        window.iniciarComponentesPqrs(formPqrs);
    });
}

const enviarDatos = (form) => {

    let descripcion = $(form).find("#summernote").summernote("code").trim();
    let formData = new FormData(document.getElementById("formPqrs"));
    formData.append("descripcion", descripcion);

    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            ocultarModales(modalCrearPqrs);
            window.iniciarComponentesPqrs(formPqrs);
        }
        generalidades.resetValidate(formPqrs);
        generalidades.ocultarCargando('body');
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    const error = (response) => {
        generalidades.ocultarCargando('body');
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    generalidades.create(rutaGuardar, config, success, error);
    generalidades.mostrarCargando('body');
}


let ocultarModales = (id) => {
    $(id).modal("hide");
};
