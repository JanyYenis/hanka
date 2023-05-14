"use strict";

const tablaPqrs = "#tablaPqrs";
const rutaCargarListadoPqrs = route('pqrs.listado');
const formBuscarPortafolio = "#formBusquedaPortafolio";

$(function () {
    listadoPqrs();
});

/**
 * Función que permite cargar el listado.
 */
const listadoPqrs = () => {
    var table = $(tablaPqrs).DataTable({
        paging: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            "url": rutaCargarListadoPqrs,
            "type": "GET",                  
            
            "headers": {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            data: function (data) {
                generalidades.mostrarCargando(tablaPqrs);
                data = Object.assign(data);
            },
            dataSrc: function (json) {
                generalidades.ocultarCargando(tablaPqrs);
                return json.data
            },
        },
        buttons: [
            {
                extend: "pdf",
                text: '<i class="fa fa-download"></i> PDF',
                className: "btn btn-outline-danger",
                title: "Listado PQRS.",
                exportOptions: {
                    columns: ":not(.excluir)"
                }
            },
            {
                text: '<i class="fa fa-sync-alt"></i> Actualizar',
                className: "btn btn-secondary",
                action: function (e, dt, node, config) {
                    dt.ajax.reload(null, false);
                }
            }
        ],
        autowidth: false,
        columnDefs: [
            {
                targets: "all",
                className: "text-center"
            },
            {
                targets: "none",
                className: "text-justify"
            }
        ],
        columns: [
            {
                render: function (data, type, full, meta) {
                    return meta.row + 1;
                }
            },
            {
                data: 'nombre',
                name: 'nombre'
            },
            {
                data: 'documento',
                name: 'documento'
            },
            {
                data: 'tipo_documento',
                name: 'tipo_documento'
            },
            {
                data: 'tipo_solicitud',
                name: 'tipo_solicitud'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'estado',
                name: 'estado'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
            {
                data: 'fecha_radicada',
                name: 'fecha_radicada'
            },
            {
                data: 'fecha_respuesta',
                name: 'fecha_respuesta'
            },
            {
                data: 'id_usuario_radica',
                name: 'id_usuario_radica'
            },
            {
                data: 'id_usuario_responde',
                name: 'id_usuario_responde'
            },
            {
                data: 'medio_notificacion',
                name: 'medio_notificacion'
            },
        ],
        order: [
            [0, "asc"]
        ], 
        lengthMenu: [
            [15, 20, 50, 100, -1],
            [15, 20, 50, 100, "Todos"]
        ],
        pageLength: 15,
        dom : `<'row mb-2'<'col-12 text-right'B>><'row'<'col-md-6 col-sm-12'i><'col-md-6 col-sm-12 text-right dataTables_pager'lp>><'table-scrollable't><'row'<'col-md-6 col-sm-12'i><'col-md-6 col-sm-12 text-right dataTables_pager'lp>>`,
        initComplete: function () {}
    });
}