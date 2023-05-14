"use strict";

const tablaUsuarios = "#tablaUsuarios";
const rutaCargarListadoUsuarios = route("usuarios.listado");

$(function () {
    listadoUsuarios();
});

/**
 * Función que permite cargar el listado.
 */
const listadoUsuarios = () => {
    var table = $(tablaUsuarios).DataTable({
        paging: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            "url": rutaCargarListadoUsuarios,
            "type": "GET",                  
            
            "headers": {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            data: function (data) {
                generalidades.mostrarCargando(tablaUsuarios);
                data = Object.assign(data);
            },
            dataSrc: function (json) {
                generalidades.ocultarCargando(tablaUsuarios);
                return json.data
            },
        },
        buttons: [
            {
                extend: "pdf",
                text: '<i class="fa fa-download"></i> PDF',
                className: "btn btn-outline-danger",
                title: "Listado usuarios.",
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
                data: 'nombreCompleto',
                name: 'nombreCompleto'
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
                data: 'puntos',
                name: 'puntos',
                render: function(data, type, full, meta){
                    return generalidades.formatoDinero(full?.puntos);
                }
            },
            {
                data: 'genero',
                name: 'genero'
            },
            {
                data: 'fecha_nacimiento',
                name: 'fecha_nacimiento'
            },
            {
                data: 'telefono',
                name: 'telefono'
            },
            {
                data: 'direccion',
                name: 'direccion'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'id_ciudad',
                name: 'id_ciudad'
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