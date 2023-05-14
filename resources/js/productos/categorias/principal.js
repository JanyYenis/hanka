"use strict";
const modalCrearCategorias = "#modalCrearCategorias";
const formCrearCategorias = "#formCrearCategorias";

$(function () {
    iniciarComponentesCategorias();
});

window.iniciarComponentesCategorias = (form = "") => {
	$(`${form} .summernote`).summernote({
        height: 100,
    });

    $('span.note-icon-caret').remove();

    $('.note-editable').css('background', '#fff');

    let configDropzone = {
        'maxFiles': 1,
        'ruta': route("categorias.store"),
        'extenciones': 'image/*',
        'success': success,
        'error': error
    };
    generalidades.crearDropzone(`${form} #dropzoneArchivos`, configDropzone);
}

const success = (response) => {
    if (response.estado == 'success') {
        console.log(1111);
    }
    $(".modal:visible").modal('hide');
    $("#tablaCategorias").DataTable().ajax.reload(null, false);
    generalidades.ocultarValidaciones('');
    generalidades.resetValidate('');
    generalidades.ocultarCargando('');
    generalidades.toastrGenerico(response?.estado, response?.mensaje);
}
const error = (response) => {
    generalidades.mostrarValidaciones('', response.validaciones);
    generalidades.ocultarCargando('');
    generalidades.toastrGenerico(response?.estado, response?.mensaje);
}

require("./editar");
require("./crear");
require("./listado");