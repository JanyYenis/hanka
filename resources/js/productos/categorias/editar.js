"use strict";

// rutas 
const rutaEditar = "categorias.editar";

// id y clases
const formEditarCategorias = "#formEditarCategorias";
const seccionEditar = "#editarCategorias";
const modalEditarCategorias = "#modalEditarCategorias";

$(function () {
    generalidades.validarFormulario(formEditarCategorias, enviarDatos);
});

$(document).on("click", ".btnEditarCategoria", function () {
    let id = $(this).attr("data-modificar");
    if (id) {
        // id = JSON.parse(id);
        cargarDatos(id);
    }
});

const cargarDatos = (id) => {
    const ruta = route(rutaEditar, { "categoria": id });
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', ruta, 'body', modalEditarCategorias, seccionEditar, function(){
        window.iniciarComponentesCategorias(formEditarCategorias);
        generalidades.marcarRequeridos(formEditarCategorias);
    });
}

const enviarDatos = (form) => {
    let idDropzone = `#dropzoneArchivos`;
    let principal = 0;

    if ($(".dropzone-item").length) {
        let id = $(`.id`).val();
        const dropzone = darInstanciaDropzone(idDropzone);
        // hacemos que dropzone suba los archivos.
        dropzone.enqueueFiles(dropzone.getFilesWithStatus(Dropzone.ADDED));
        dropzone.on("sending", function (file, xhr, formData) {
            if( $('.principalEditar').is(':checked') ){
                principal = 1;
            }
            $(`${idDropzone} .progress-bar`).css("opacity", "1");
            const nombreArchivo = $(`${idDropzone} .dropzone-chagefileName`).find("input").val();
            
            formData.append("id", id);
            formData.append("descripcion", $(`.summernote`).val() ?? '');
            formData.append("nombre", $(`.nombreEditar`).val() ?? '');
            formData.append("nombreArchivo", nombreArchivo ?? 0);
            formData.append("principal", principal);
            
            file.previewElement.querySelector(`${idDropzone} .dropzone-start`).setAttribute("disabled", "disabled");
        });
    } else {
        generalidades.mensajeSwal("Debes cargar al menos un soporte");
    }
}

const darInstanciaDropzone = (idDropzone) => {
    return Dropzone.forElement(idDropzone);
}