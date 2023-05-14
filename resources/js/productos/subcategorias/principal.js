"use strict";
const selectCategoria = "#selectCategoria";
const rutaBuscarCategorias = route('categorias.buscar');

$(function () {
    iniciarComponentesSubcategorias();
});

window.iniciarComponentesSubcategorias = (form = "") => {
	$(`${form} .summernote`).summernote({
        height: 100,
    });

    $('span.note-icon-caret').remove();

    $('.note-editable').css('background', '#fff');

    generalidades.Select2({
        "id": `${form} select${selectCategoria}`,
        "ruta": rutaBuscarCategorias,
        "minimo": 3
    });
}

require("./editar");
require("./crear");
require("./listado");