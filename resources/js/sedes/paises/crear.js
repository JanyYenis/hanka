"use strict";

const modalCrearPaises = "#modalCrearPaises";
const formCrearPaises = "#formCrearPaises";
const rutaGuardarPais = route("sedes.paises.store");

$(function () {
    generalidades.validarFormulario(formCrearPaises, enviarDatos);
});

$(document).on("click", `${formCrearPaises} #verImagen`, function () {
    let ruta = $(`${formCrearPaises} #ruta`).val();
    if (ruta != '') {
        if ($(`${formCrearPaises} #imangenBanera`)){
            $(`${formCrearPaises} #imangenBanera`).remove();
        }
        let imgTag = document.createElement('img');
        imgTag.setAttribute('id', 'imangenBanera');
        imgTag.setAttribute('class', 'w-100 rounded');
        imgTag.src = ruta;
        document.getElementById('imagen').appendChild(imgTag);
    }
});

$(document).on("click", `${formCrearPaises} .btnLimpiar`, function () {
    generalidades.resetValidate(formCrearPaises);
    $(`${formCrearPaises} #imangenBanera`).remove();
});

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formCrearPaises"));

    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            $(modalCrearPaises).modal('hide');
            generalidades.resetValidate(formCrearPaises);
        }
        generalidades.ocultarCargando(formCrearPaises);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaPaises").DataTable().ajax.reload(null, false);
    }
    const error = (response) => {
        generalidades.ocultarCargando(formCrearPaises);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    generalidades.create(rutaGuardarPais, config, success, error);
    generalidades.mostrarCargando(formCrearPaises);
}