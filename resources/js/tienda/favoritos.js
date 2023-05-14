"use strict";

const rutaFavoritos = "favoritos.listado";
const seccionListadoFavoritos = "#seccionListadoFavoritos";
const btnPagina = ".btnPagina";
const slectCantidadPorPagina = ".slectCantidadPorPagina";

let paginaActual = 1;
let cantidadPagina = 6;

$(function () {
    cargarListado();
    // iniciar();
});

$(document).on("click", btnPagina, function () {
    let pagina = $(this).attr("data-pagina");
    if (pagina) {
        cargarListado(pagina);
    }
});

$(document).on("change", slectCantidadPorPagina, function (e) {
    cantidadPagina = this.value;
    $(document).find(slectCantidadPorPagina).val(cantidadPagina);
    cargarListado(paginaActual);
});

const cargarListado = (pagina = 1) => {
    generalidades.mostrarCargando(seccionListadoFavoritos);
    let datos = [];
    const elemento = $(slectCantidadPorPagina);
    if (elemento.length) {
        datos["cantidad_pagina"] = elemento.val();
    }
    datos = generalidades.formToJson(datos);
    datos.pagina = pagina;
    const ruta = route(rutaFavoritos, datos);
    generalidades.refrescarSeccion(null, ruta, seccionListadoFavoritos, function (response) {
        generalidades.ocultarCargando(seccionListadoFavoritos);
        $(slectCantidadPorPagina).val(cantidadPagina);
        paginaActual = pagina;
    });
}

const iniciar = () => {
    const driver = new Driver();
        driver.highlight({
        element: '#selectT',
        popover: {
            title: 'Title for the Popover',
            description: 'Description for it',
        }
    });
}