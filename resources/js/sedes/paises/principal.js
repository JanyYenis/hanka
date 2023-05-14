"use strict";
const modalVerCiudades = '#modalVerCiudades';
const formVerCiudades = '#formVerCiudades';
const verCiudades = '#verCiudades';
const rutaCargarCiudad = 'sedes.paises.ciudades';

$(function () {
    iniciarComponentesPaises();
});

window.iniciarComponentesPaises = (form = "") => {
}

$(document).on("click", ".btnCiudades", function () {
    let id = $(this).attr("data-ver");
    if (id) {
        cargarCiudades(id);
    }
});

const cargarCiudades = (id) => {
    const rutaC = route(rutaCargarCiudad, { "pais": id });
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', rutaC, 'body', modalVerCiudades, verCiudades, function(){
        window.iniciarComponentesCiudades(formVerCiudades);
        window.listadoCiudades(id);
    });
}

require("./editar");
require("./crear");
require("./listado");
require("../ciudades/principal");