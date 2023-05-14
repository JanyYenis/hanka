"use strict";

const modalCrearCategorias = "#modalCrearCategorias";
const formCrearCategorias = "#formCrearCategorias";
const rutaGuardarCategoria = route("categorias.store");

$(function () {
    generalidades.marcarRequeridos(formCrearCategorias);
    generalidades.validarFormulario(formCrearCategorias, enviarDatos);
});

const enviarDatos = (form) => {
    let idDropzone = `#dropzoneArchivos`;
    let principal = 0;
    
    if ($(".dropzone-item").length) {
        const dropzone = darInstanciaDropzone(idDropzone);
        // hacemos que dropzone suba los archivos.
        dropzone.enqueueFiles(dropzone.getFilesWithStatus(Dropzone.ADDED));
        dropzone.on("sending", function (file, xhr, formData) {
            if( $('.principal').is(':checked') ){
                principal = 1;
            }
        
            $(`${idDropzone} .progress-bar`).css("opacity", "1");
            const nombreArchivo = $(`${idDropzone} .dropzone-chagefileName`).find("input").val();
            
            formData.append("descripcion", $(`.summernote`).val() ?? '');
            formData.append("nombre", $(`.nombre`).val() ?? '');
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