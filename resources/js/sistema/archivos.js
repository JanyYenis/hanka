"use strict";

/**
 * La clase de Archivo permite interactuar con el sistema de archivos que está en el backend, de tal
 * manera que resulte más fácil integrar un módulo con el trait correspondiente.
*/
class Archivo {

    /**
     * La clase de Archivo permite interactuar con el sistema de archivos que está en el backend, de tal
     * manera que resulte más fácil integrar un módulo con el trait correspondiente.
     */
    constructor() {
        this.mensajesDropzone();

        this.rutaCargarSoportes = route("archivos.listado");
        this.rutaSubirSoportes = route("archivos.store");
        this.rutaRequisitos = route("archivos.tipoArchivo");

        this.idRegistro = null;
        /** Contiene el ID del registro (id, no archivable_id) */
        this.idActualizar = null;
        this.nombreModelo = null;
        this.requisitoId = null;
        this.tieneRequisitos = null;
        this.soloAgregar = null;
        this.soloEditar = null;
        this.idEstado = null;
        this.idModalDropzone = "#modalSoportes";
        this.idModalVisualizar = "#view-file";
        this.modalFooterArchivos = ".modalFooterArchivos";
        this.formCrearArchivo = ".formCrearArchivo";
        this.idDatatable = null;
        this.tabAdministracionSoportes = ".tabAdministracionSoportes";
        this.seccionSubirArchivos = "#seccionSubirArchivos";
        this.tabSubirArchivos = "#tabSubirArchivos";

        this.idDropzone = "#dropzoneArchivos";

        this.LIMITE_SUMMERNOTE = 4000;
        this.idSummernote = "#justificacion-archivo";
        this.slectTipoArchivo = '#tipoSoporte';

        this.tablaListadoSoportes = "#soportesRegistrados";
        this.btnCrearArchivo = ".btnCrearArchivo";
        this.btnEditarSoporte = ".btnEditarArchivo";
        this.btnEliminarSoporte = ".btnEliminarArchivo";

        const archivos = this;
        $(document).on("click", this.btnEditarSoporte, function () {
            this.soloEditar = null;
            let datos = $(this).attr("data-archivo");
            if (datos) {
                archivos.editarArchivo(datos);
            }
        });

        $(document).on("click", this.btnEliminarSoporte, function () {
            const rutaEliminar = "archivos.destroy";
            let datosAdicionales = {
                "tipo_modal": eliminar.TIPO_SWAL
            };
            eliminar.eventoEliminar(this, rutaEliminar, function (response) {
                response.requisito_id = archivos.requisitoId;
                archivos.refrescarSeccionModal(response);
                $(archivos.idDatatable).DataTable().ajax.reload(null, false);
            }, null, datosAdicionales);
        });

        $(document).on("click", ".btnModalSoporte", function () {
            archivos.idActualizar = null;
            archivos.tieneRequisitos = null;
            archivos.soloAgregar = null;
            let datos = $(this).attr("data-soporte");
            if (datos) {
                datos = JSON.parse(datos);
                archivos.modalSoporte(datos);
            }
        });

        $(document).on("click", archivos.btnCrearArchivo, () => {
            this.enviarTodos();
        });

        /** Evento que se activa cuando se de clic en el tab de subir archivos. */
        $(document).on("click", `${archivos.tabAdministracionSoportes} #tabSubirArchivos`, function () {
            $(archivos.btnCrearArchivo).removeClass('d-none');
        });
        /** Evento que se activa cuando se de clic en el tab de subir archivos. */
        $(document).on("click", `${archivos.tabAdministracionSoportes} #tabListadoArchivos`, function () {
            let datos = {
                modelo: archivos.nombreModelo,
                id: archivos.idRegistro,
                requisito_id: archivos.requisitoId,
                tieneRequisitos: archivos.tieneRequisitos
            }
            archivos.cargarTipo(datos);
            archivos.idActualizar = null;
            archivos.soloAgregar = null;
            $(archivos.btnCrearArchivo).addClass('d-none');
        });
    }

    /**
     * Función que permite sobreescribir los mensajes usados por defecto de DropzoneJS.
     */
    mensajesDropzone() {
        Dropzone.prototype.defaultOptions.dictFileTooBig = "Tamaño máximo es de {{maxFilesize}} Mb.";
        Dropzone.prototype.defaultOptions.dictRemoveFile = "Eliminar archivo";
        Dropzone.prototype.defaultOptions.dictCancelUpload = "Cancelar";
        Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "¿Deseas cancelar la subida?";
        Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "Sólo puedes cargar {{maxFiles}} soporte(s).";
    }

    /**
     * Función que permite inicializar el dropzone con varios parámetros por defecto, de una manera
     * rápida. El dropzone se encarga de hacer la subida de los archivos.
     * @param {string} idDropzone
     * @param {boolean} autoQueue Permitir subida automática del archivo. Por defecto, no permitir (false).
     * @param {number} maxFilesize Tamaño máximo del archivo, en MB. Por defecto, 1 MB.
     * @param {number} maxFiles Cantidad máxima de archivos a subir, por defecto, 1.
     */
    crearDropzone(config = false) {
        if (!config) {
            config = {
                autoQueue: false,
                maxFilesize: 1,
                maxFiles: 1,
                success: function (file, response) {
                    generalidades.ocultarCargando(archivos.idModalDropzone);
                    generalidades.inHabilitarBoton(archivos.modalFooterArchivos, false, archivos.btnCrearArchivo);
                    if (response.estado == "success" && response.id && response.modelo) {
                        generalidades.ocultarValidaciones(archivos.formCrearArchivo);
                        archivos.idActualizar = null;
                        if (archivos.soloAgregar || archivos.soloEditar) {
                            if (!archivos.tieneRequisitos) {
                                generalidades.refrescarDT("#dtListadoAnexo");
                            }
                            $(archivos.idModalDropzone).modal("hide");
                        } else {
                            archivos.refrescarSeccionModal(response);
                        }
                    }
                    generalidades.toastrGenerico(response.estado, response.mensaje);
                    generalidades.refrescarDT(archivos.tablaListadoSoportes);
                },
                error: function (file, response) {
                    generalidades.mostrarValidaciones(archivos.formCrearArchivo, response.validaciones);
                    generalidades.ocultarCargando(archivos.idModalDropzone);
                    generalidades.inHabilitarBoton(archivos.modalFooterArchivos, false, archivos.btnCrearArchivo);
                    generalidades.toastrGenerico(response.estado, response.mensaje);
                }
            }
        }
        let idDropzone = this.idDropzone;
        // verificamos si existe el ID para dropzone
        if (!$(idDropzone).length) {
            return;
        }

        // resetear el posible dropzone que ya esté inicializado.
        const previewNode = $(`${idDropzone} .dropzone-item`);
        const previewTemplate = previewNode.parent(".dropzone-items").html();
        previewNode.remove();

        // resetear las extensiones permitidas.
        const extensionesPermitidas = this.darExtensionesPermitidas();
        const archivos = this;

        // inicializar el dropzone.
        const dropzone = new Dropzone(idDropzone, {
            "acceptedFiles": extensionesPermitidas,
            "maxFiles": config.maxFiles ?? 1,
            "maxFilesize": config.maxFilesize ?? 1,
            "url": this.rutaSubirSoportes,
            "headers": {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            "autoQueue": config.autoQueue ?? false,
            "addRemoveLinks": true,
            "previewTemplate": previewTemplate,
            "previewsContainer": `${idDropzone} .dropzone-items`, // contenedor para previsualizar archivos.
            "clickable": `${idDropzone} .dropzone-select` // define el elemento usado para la selección de archivos.
        });

        // si se pasa de la cantidad de soportes permitidos.
        dropzone.on("maxfilesexceeded", function (file) {
            this.removeFile(file);
            generalidades.mensajeSwal("No puedes cargar más soportes.", "error", "Error");
        });

        // no hacer nada si tira error al enviar los archivos.
        dropzone.on("error", config.error ?? false);

        // al agregar un archivo, mostrar y ocultar secciones.
        dropzone.on("addedfile", function (file) {
            // validar el tamaño del archivo.
            if (file.size > ((config.maxFilesize ?? 1) * 1000000)) {
                this.removeFile(file);
                let megabytes = file.size / 1000000; //tamaño dado en bytes, convertimos de Bytes a MB.

                // redondeamos
                megabytes = megabytes.toFixed(2);
                generalidades.mensajeSwal(`El tamaño máximo para subir archivos es de ${config.maxFilesize} MB (subiste de ${megabytes} MB)`, 'info', null)
                // generalidades.toastrGenerico("error", `El tamaño máximo para subir archivos es de ${config.maxFilesize} MB (subiste de ${megabytes} MB)`);
                return false;
            }

            this.options.acceptedFiles = archivos.darExtensionesPermitidas();
            const elemento = file.previewElement.querySelector(`${idDropzone} .dropzone-start`);
            $(elemento).on("click", () => dropzone.enqueueFile(file));

            $(document).find(`${idDropzone} .dropzone-item`).css("display", "");
            $(`${idDropzone} .dropzone-upload, ${idDropzone} .dropzone-remove-all`).css("display", "inline-block");
            $(`${idDropzone} .dropzone-chagefileName`).removeClass("d-none").find("input").val(file.upload.filename);
        });

        // barra de progreso del dropzone.
        dropzone.on("totaluploadprogress", function (progress) {
            $(`${idDropzone} .progress-bar`).css("width", `${progress}%`);
        });

        // al dar respuesta correcta del controlador, refrescar el listado y
        // resetear todo.
        dropzone.on("success", config.success ?? false);

        // ocultar la barra de progreso cuando se envie todo.
        dropzone.on("complete", function () {
            const barra = `${idDropzone} .dz-complete`;
            setTimeout(function () {
                $(`${barra} .progress-bar, ${barra} .progress, ${barra} .dropzone-start`).css("opacity", "0");
            }, 300);
        });

        // si se da click en el botón de eliminar todo, quitar todos los archivos y ocultar botones de subida y eliminar todo.
        $(`${idDropzone} .dropzone-remove-all`).on("click", function () {
            $(`${idDropzone} .dropzone-upload, ${idDropzone} .dropzone-remove-all`).css("display", "none");
            dropzone.removeAllFiles(true);
        });

        // Cuando se complete la subida de los archivos, ocultar indicador de subida.
        dropzone.on("queuecomplete", function () {
            $(`${idDropzone} .dropzone-upload`).css("display", "none");
        });

        // cuando se eliminen archivos y no quede ninguno, ocultar varias secciones del dropzone.
        dropzone.on("removedfile", function () {
            if (dropzone.files.length == 0) {
                $(`${idDropzone} .dropzone-upload, ${idDropzone} .dropzone-remove-all`).css("display", "none");
                $(`${idDropzone} .dropzone-chagefileName`).addClass("d-none").find("input").attr("placeholder", "");
            }
        });

        return dropzone;
    }

    /**
     * Función que permite enviar los archivos de soporte.
     */
    enviarTodos() {
        generalidades.ocultarCargando(this.idModalDropzone);
        generalidades.inHabilitarBoton(this.modalFooterArchivos, false, this.btnCrearArchivo);
        if (!$(this.slectTipoArchivo).val()) {
            generalidades.toastrGenerico("error", "Por favor, selecciona un tipo de soporte.");
            return false;
        }
        if ($(".dropzone-item").length) {
            generalidades.mostrarCargando(this.idModalDropzone);
            generalidades.inHabilitarBoton(this.modalFooterArchivos, true, this.btnCrearArchivo);
            let datos = {
                archivableId : this.idRegistro,
                archivableType : this.nombreModelo,
                tipoArchivo : $(this.slectTipoArchivo).val(),
                descripcion : $(this.idSummernote).summernote("code"),
                idActualizar : this.idActualizar,
                tieneRequisitos : this.tieneRequisitos
            };
            this.guardarArchivo(datos);
        } else {
            generalidades.mensajeSwal("Debes cargar al menos un soporte");
        }
    }

    /**
     * Función que permite cargar un archivo para la edición.
     * @param {number} id Número del registro de archivo, de la tabla archivos.
     * @returns {void}
     */
    editarArchivo(datos) {
        if (datos) {
            let json = JSON.parse(datos);
            this.idRegistro = json?.id;
            this.nombreModelo = json?.modelo;
            const rutaInfoSoporte = route("archivos.show", { "archivo": json.archivoId });
            const config = {
                headers: {
                    "Content-Type": generalidades.CONTENT_TYPE_JSON,
                    "Accept": generalidades.CONTENT_TYPE_JSON
                },
                method: "GET"
            };
    
            const success = (response) => {
                if (response.estado == "success") {
                    let tipoId = response?.archivo?.tipo_id ?? '';
                    json.tipo_id = tipoId;
                    json.alCargar = () => {
                        this.idActualizar = json.archivoId;
                        $(this.idSummernote).summernote("code", response?.archivo?.descripcion);
                    }
                    this.cargarTipo(json);
                    $(this.tabSubirArchivos).trigger("click");
                }
            }
            generalidades.get(rutaInfoSoporte, config, success);
        }
    }

    /**
     * Función que envia archivos al controlador usando peticiones.
     * @param {string} idDropzone ID del elemento del dropzone.
     * @param {number} archivableId ID del registro (archivable_id)
     * @param {string} archivableType Contiene el nombre del archivableType
     * @param {string} descripcion Descripción del archivo.
     */
    guardarArchivo(datos = null) {
        let idDropzone = this.idDropzone;

        // obtenemos la instancia actual del dropzone.
        const dropzone = this.darInstanciaDropzone(idDropzone);
        // hacemos que dropzone suba los archivos.
        dropzone.enqueueFiles(dropzone.getFilesWithStatus(Dropzone.ADDED));
        dropzone.on("sending", function (file, xhr, formData) {
            $(`${idDropzone} .progress-bar`).css("opacity", "1");
            const nombreSoporte = $(`${idDropzone} .dropzone-chagefileName`).find("input").val();
            
            if (datos.idActualizar) {
                formData.append("id", datos.idActualizar);
            }
            formData.append("descripcion", datos?.descripcion ?? '');
            formData.append("nombre", nombreSoporte);
            formData.append("archivable_type", datos?.archivableType ?? '');
            formData.append("archivable_id", datos?.archivableId ?? '');
            formData.append("tieneRequisitos", datos?.tieneRequisitos ?? '');

            const info = JSON.parse(datos.tipoArchivo) ?? {};
            formData.append("tipo_id", info?.tipo ?? '');
            formData.append("evidencia_id", info?.evidencia_id ?? '');
            formData.append("opcion_id", info?.opcion_id ?? '');
            formData.append("requisito_id", info?.requisito_id ?? '');
            
            file.previewElement.querySelector(`${idDropzone} .dropzone-start`).setAttribute("disabled", "disabled");
        });
    }

    /**
     * Función que permite eliminar
     */
    eliminarArchivosDropzone() {
        this.idActualizar = null;
        const dropzone = this.darInstanciaDropzone(this.idDropzone);
        dropzone.removeAllFiles(true);
    }

    /**
     * Función que permite iniciar todos los componentes del modal de subir archivo.
     */
    iniciarComponentes() {
        const archivos = this;
        $(this.slectTipoArchivo).on("change", function () {
            let extensiones = archivos.darExtensionesPermitidas();
            archivos.darTamanioMaximo();
            $(".dz-hidden-input").attr("accept", extensiones);
        });

        const toolbarSummer = [
            ['style', ['bold', 'italic', 'underline']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']]
        ];

        $(`${this.slectTipoArchivo}`).selectpicker("refresh");
        $(`${this.slectTipoArchivo}`)
            .selectpicker()
            .on("change", function () {
                let formularioCercano = $(this).closest("form");
                if (formularioCercano.data("validator")) {
                    $(this).valid();
                }
            });
            this.crearDropzone();
        generalidades.summernoteGenerico(this.idSummernote, 150, toolbarSummer, this.LIMITE_SUMMERNOTE);
    }

    /**
     * Función que permite dar las extensiones permitidas dependiendo del valor del select seleccionado.
     * @returns {string} Retorna un string con todas las extensiones permitidas para el tipo de soporte seleccionado. (formato: ".docx,.xlsx,.pdf...")
     */
    darExtensionesPermitidas() {
        let datos = $(this.slectTipoArchivo).val() ?? null;
        let extensionesPermitidas = null;
        if (datos) {
            extensionesPermitidas = JSON.parse(extensionesPermitidas)?.extensiones ?? null;
        }
        if (extensionesPermitidas) {
            extensionesPermitidas = extensionesPermitidas.split(",");
            extensionesPermitidas.forEach((extension, idx) => extensiones[idx] = `.${extension}`);
            extensionesPermitidas = extensiones.join(",");
        }
        return extensionesPermitidas;
    }

    /**
     * Función que permite ajustar el tamaño máximo aceptado por el Dropzone de acuerdo a la opción seleccionada en el select de
     * tipo de soporte. Si no hay ningún valor, se retorna por defecto que sea 1 MB.
     * @return {number} Retorna el tamaño del archivo.
     */
    darTamanioMaximo() {
        let datos = $(this.slectTipoArchivo).val() ?? null;
        let tamanio = 1;
        if (datos) {
            tamanio = JSON.parse(tamanio)?.peso ?? 1;
        }
        let dropzone = this.darInstanciaDropzone();
        dropzone.options.maxFilesize = tamanio;
        return tamanio;
    }

    /**
     * Función que permite cargar el listado de archivos que han sido subidos.
     * @param {number} archivableId ID del Archivable Id.
     * @param {string} archivableType String del nombre del modelo.
     * @param {number} accion ???
     */
    cargarListadoArchivos(info) {
        let tablaListadoSoportes = this.tablaListadoSoportes;
        let rutaCargarSoportes = this.rutaCargarSoportes;
        let tieneRequisitos = info?.tieneRequisitos ?? this.tieneRequisitos;
        if ($.fn.DataTable.isDataTable(tablaListadoSoportes)) {
            $(tablaListadoSoportes).DataTable().destroy();
        }
        const config = {
            "paging": true,
            "responsive": true,
            "ajax": {
                "url": rutaCargarSoportes,
                "type": "GET",
                "headers": {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                "data": function (data) {
                    data.archivable_id = info.id ?? '';
                    data.archivable_type = info.modelo ?? '';
                    data.requisito_id = info.requisito_id ?? '';
                    data.tieneRequisitos = tieneRequisitos;
                    data.accion = info.puedeEditar ?? 1;
                    generalidades.mostrarCargando(tablaListadoSoportes);
                },
                "dataSrc": function (json) {
                    generalidades.ocultarCargando(tablaListadoSoportes);
                    return json.data
                },
            },
            "buttons": [
                {
                    "text": '<i class="fa fa-sync-alt"></i> Actualizar',
                    "className": "btn btn-secondary",
                    "action": function (e, dt, node, config) {
                        dt.ajax.reload(null, false);
                    }
                }
            ],
            "serverSide": true,
            "autowidth": false,
            "columnDefs": [
                {
                    "targets": "all",
                    "className": "text-center"
                },
                {
                    "targets": "none",
                    "className": "text-justify"
                }
            ],
            "columns": [
                {
                    "data": 'DT_RowIndex',
                    "name": 'DT_RowIndex',
                    "orderable": false,
                    "searchable": false
                },
                {
                    "data": "ruta_archivo",
                    "name": "ruta_archivo"
                },
                {
                    "data": "descripcion",
                    "name": "descripcion"
                },
                {
                    "data": "nombreTipo",
                    "name": "tipo_id"
                },
                {
                    "data": "fechaSubida",
                    "name": "fechaSubida"
                },
                {
                    "data": "acciones",
                    "name": "acciones",
                    "orderable": false,
                    "searchable": false
                }
            ],
            "order": [
                [0, "asc"]
            ],
            "lengthMenu": [
                [15, 20, 50, 100, -1],
                [15, 20, 50, 100, "Todos"] // change per page values here
            ],
            "pageLength": 15,
            "dom": `
                <'row'
                    <'col-12 text-right'B>
                >
                <'table-scrollable't>
                <'row'
                    <'col-sm-6 col-xs-12'i>
                    <'col-sm-6 col-xs-12 text-right dataTables_pager'lp>
                >
            `
        };
        generalidades.dataTables(tablaListadoSoportes, config);
    }

    /**
     * Función que permite asignar los datos para el registro de soportes.
     * @param {number} id Registro al cual se le agregará el soporte (archivable_id).
     * @param {string} modelo Nombre del modelo (archivable_type).
     * @param {number} estado Estado del registro.
     * @param {number|null} numeroSoporte ?????
     * @param {boolean} puedeEditar ¿Parametro no usado?
     */
    modalSoporte(info) {
        this.refrescarSeccionModal(info);
        this.idRegistro = info.id;
        this.nombreModelo = info.modelo;
        this.idEstado = info.estado;
        this.idDatatable = $(info.id).closest(".table").prop("id");
    }

    /**
     * Función que permite refrescar las opciones del modal de soporte,
     * @param {number} archivableId
     * @param {string} archivableType
     */
    refrescarSeccionModal(info) {
        let soloAgregar = info?.soloAgregar ?? '';
        this.soloAgregar = soloAgregar;
        this.cargarTipo(info);
        if (!soloAgregar) {
            $(`${this.tabAdministracionSoportes} #tabListadoArchivos`)
                .trigger('click');
            this.cargarListadoArchivos(info);
        }
    }

    /**
     * Función que permite cargar la vista de subida de soportes, la cual incluye todos los requisitos
     * para la subida de archivos, y los tipos de archivo.
     * @param {number} archivableId ID del archivo.
     * @param {string} archivableType Modelo del archivo.
     */
    cargarTipo(info) {
        let soloAgregar = info?.soloAgregar ?? '';
        let soloEditar = info?.soloEditar ?? '';
        this.soloAgregar = soloAgregar;
        this.soloEditar = soloEditar;
        this.requisitoId = info?.requisito_id ?? '';
        this.tieneRequisitos = info?.tieneRequisitos ?? '';
        let formData = new FormData();
        formData.append("modelo", info.modelo ?? '');
        formData.append("id", info.id ?? '');
        formData.append("requisito_id", this.requisitoId);
        formData.append("tipo_id", info?.tipo_id ?? '');
        formData.append("tieneRequisitos", this.tieneRequisitos);

        const config = {
            "method": "POST",
            "headers": {
                "Accept": generalidades.CONTENT_TYPE_JSON,
                "Content-Type": generalidades.CONTENT_TYPE_JSON
            },
            "body": formData
        };

        const success = (response) => {
            $(this.seccionSubirArchivos).html(response.view);
            if (info?.alCargar) {
                info?.alCargar();
            }
            if (response.estado == "success") {
                this.iniciarComponentes();
                if (soloAgregar || soloEditar) {
                    $(".listaVerSoportes").addClass("d-none");
                    $(`${this.tabAdministracionSoportes} #tabSubirArchivos`)
                        .trigger('click');
                } else {
                    $(".listaVerSoportes").removeClass("d-none");
                }
                $(this.idModalDropzone).modal("show");
            } else if (response.estado == 'info') {
                generalidades.mensajeSwal(response.mensaje, response.estado, null);
            }
        };
        generalidades.post(this.rutaRequisitos, config, success);
    }

    /**
     * Función que permite obtener la instancia del dropzone dependiendo del ID dado.
     * @param {string} idDropzone ID del dropzone.
     * @returns {Dropzone} Instancia del dropzone.
     */
    darInstanciaDropzone() {
        return Dropzone.forElement(this.idDropzone);
    }
}

// instancia de la clase.
window.Archivo = new Archivo();