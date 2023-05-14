"use strict";

$(function () {
    iniciarComponentesComentarios();
});

window.iniciarComponentesComentarios = (form = "") => {
	$(`${form} .summernote`).summernote({
        height: 100,
    });

    $('span.note-icon-caret').remove();

    $('.note-editable').css('background', '#fff');
}

require("./listado");