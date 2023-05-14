"use strict";

// rutas 
const rutaEditarPais = "sedes.paises.editar";

// id y clases
const formEditarPaises = "#formEditarPaises";
const editarPaises = "#editarPaises";
const modalEditarPaises = "#modalEditarPaises";

$(function () {
    generalidades.validarFormulario(formEditarPaises, enviarDatos);
});

$(document).on("click", ".btnEditarPaises", function () {
    let id = $(this).attr("data-modificar");
    if (id) {
        cargarDatos(id);
    }
});

$(document).on("click", `${formEditarPaises} #verImagen`, function () {
    let ruta = $(`${formEditarPaises} #ruta`).val();
    if (ruta != '') {
        if ($(`${formEditarPaises} #imangenBanera`)){
            $(`${formEditarPaises} #imangenBanera`).remove();
        }
        let imgTag = document.createElement('img');
        imgTag.setAttribute('id', 'imangenBanera');
        imgTag.setAttribute('width', '100%');
        imgTag.setAttribute('height', '250%');
        imgTag.src = ruta;
        document.getElementById('imagenE').appendChild(imgTag);
    }
});

const cargarDatos = (id) => {
    const ruta = route(rutaEditarPais, { "pais": id });
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', ruta, 'body', modalEditarPaises, editarPaises, function(){
        window.iniciarComponentesPaises(formEditarPaises);
    });
}

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formEditarPaises"));
    
    const config = {
        'method': 'PUT',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }

    const success = (response) => {
        if (response.estado == 'success') {
            $(modalEditarPaises).modal('hide');
        }
        generalidades.ocultarCargando(form);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaPaises").DataTable().ajax.reload(null, false);
        generalidades.resetValidate(form);
    }

    const error = (response) => {
        generalidades.ocultarCargando(form);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    const rutaActualizarPais = route("sedes.paises.actualizar", { "pais": formData.get("id") });
    generalidades.edit(rutaActualizarPais, config, success, error);
    generalidades.mostrarCargando(form);
}