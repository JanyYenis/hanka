"use strict";

const rutaProductos = "productos.listado-general";
const formFiltro = "#formFiltroProductos";
const seccionListadoProductos = "#seccionListadoProductos";
const btnPagina = ".btnPagina";
const slectCantidadPorPagina = ".slectCantidadPorPagina";
const selectFiltrarVerProductos = "#selectFiltrarVerProductos";
const modalCrearComentarios = "#modalCrearComentarios";
const formCrearComentarios = "#formCrearComentarios";
const formFiltroProductos = "#formFiltroProductos";
const rutaGuardarComentario = route("comentarios.store");

let paginaActual = 1;
let cantidadPagina = 6;

$(function () {
    cargarListado();
    iniciarComponentesProductosVer();
    generalidades.validarFormulario(formCrearComentarios, enviarDatos);
    // iniciar();
});

const iniciarComponentesProductosVer = () => {
    $('#selectFiltrarVerProductos').selectpicker();
    $(`${formFiltroProductos} ${selectFiltrarVerProductos}`)
        .selectpicker()
        .on("change", function () {
                let formularioCercano = $(this).closest("form");
                if (formularioCercano.data("validator")) {
                        $(this).valid();
                    }
                });
}

$(document).on("click", btnPagina, function () {
    let pagina = $(this).attr("data-pagina");
    if (pagina) {
        cargarListado(pagina);
    }
});

$(document).on("change", slectCantidadPorPagina, function (e) {
    cantidadPagina = this.value;
    $(document).find(slectCantidadPorPagina).val(cantidadPagina);
    cargarListado();
});

$(document).on("change", selectFiltrarVerProductos, function (e) {
    let valor = this.value;
    $(document).find(selectFiltrarVerProductos).val(valor);
    cargarListado();
});

const cargarListado = (pagina = 1) => {
    generalidades.mostrarCargando(seccionListadoProductos);
    let datos = new FormData(document.querySelector(formFiltroProductos));
    datos.delete("cantidad_pagina");
    const elemento = $(slectCantidadPorPagina);
    if (elemento.length) {
        datos.set('cantidad_pagina', elemento.val());
    }
    datos = generalidades.formToJson(datos);
    datos.pagina = pagina;
    const ruta = route(rutaProductos, datos);
    generalidades.refrescarSeccion(null, ruta, seccionListadoProductos, function (response) {
        generalidades.ocultarCargando(seccionListadoProductos);
        $(slectCantidadPorPagina).val(cantidadPagina);
        paginaActual = pagina;
    });
}

$(document).on("click", '.btnAgregarCarrito', function () {
    let id = $(this).attr("data-producto");
    if (id) {
        agregarCarrito(id);
    }
});

const agregarCarrito = (id) => {
    let ruta = route('carrito.store', { 'producto': id });
    let config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        }
    }

    const success = (response) => {
        generalidades.ocultarCargando('body');
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    const error = (response) => {
        generalidades.ocultarCargando('body');
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }

    generalidades.mostrarCargando('body');
    generalidades.post(ruta, config, success, error);
}

$(document).on("click", '.btnAgregarFavorito', function () {
    let id = $(this).attr("data-producto");
    if (id) {
        agregarFavoritos(id);
    }
});

const agregarFavoritos = (id) => {
    let ruta = route('favoritos.store', { 'producto': id });
    let config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        }
    }

    const success = (response) => {
        generalidades.ocultarCargando('body');
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    const error = (response) => {
        generalidades.ocultarCargando('body');
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }

    generalidades.mostrarCargando('body');
    generalidades.post(ruta, config, success, error);
}

$(document).on("click", '.btnAgregarComentario', function () {
    let id = $(this).attr("data-producto");
    if (id) {
        agregarComentario(id);
    }
});

const agregarComentario = (id) => {
    let ruta = route('comentarios.create', { 'producto': id});
    generalidades.refrescarSeccion(null, ruta, "#seccionComentario", function (response) {
        generalidades.ocultarCargando('body');
        $(modalCrearComentarios).modal('show');
        $(`${formCrearComentarios} .summernote`).summernote({
            height: 100,
        });
        $('span.note-icon-caret').remove();
        $('.note-editable').css('background', '#fff');
    });
}

const enviarDatos = (form) => {

    let formData = new FormData(document.getElementById("formCrearComentarios"));
    let descripcion = $(formCrearComentarios).find(".summernote").summernote("code").trim();
    formData.append("comentario", descripcion);

    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            $(modalCrearComentarios).modal('hide');
        }
        generalidades.ocultarCargando('body');
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    const error = (response) => {
        generalidades.ocultarCargando('body');
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    generalidades.create(rutaGuardarComentario, config, success, error);
    generalidades.mostrarCargando('body');
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