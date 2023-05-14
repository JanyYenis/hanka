"use strict";

const rutaVer = "terminos.ver";
const formVerTerminos = "#formVerTerminos";
const seccionVer = "#verTerminos";
const modalVerTerminos = "#modalVerTerminos";

$(function () {
    iniciarComponentesTerminos();
});

window.iniciarComponentesTerminos = (form = "") => {
	$(`${form} .summernote`).summernote({
        height: 100,
    });

    $('span.note-icon-caret').remove();

    $('.note-editable').css('background', '#fff');
}

$(document).on("click", "#btnVerTerminos", function () {
    verTerminosCondiciones();
});

const verTerminosCondiciones = () => {
    const ruta = route(rutaVer);
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', ruta, 'body', modalVerTerminos, seccionVer, function(){
        iniciarComponentesTerminos(formVerTerminos);
    });
}

require("./editar");
require("./crear");
require("./listado");