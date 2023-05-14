"use strict";

$(function () {
    iniciarComponentesMarcas();
});

window.iniciarComponentesMarcas = (form = "") => {
	$(`${form} .summernote`).summernote({
        height: 100,
    });

    $('span.note-icon-caret').remove();

    $('.note-editable').css('background', '#fff');
}

require("./editar");
require("./crear");
require("./listado");