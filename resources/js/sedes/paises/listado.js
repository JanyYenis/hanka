"use strict";

const tablaPaises = "#tablaPaises";
const rutaCargarListadoPaises = route("sedes.paises.listado");

$(function () {
    listadoPaises();
});

/**
 * Función que permite cargar el listado.
 */
const listadoPaises = () => {
    var table = $(tablaPaises).DataTable({
        paging: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            "url": rutaCargarListadoPaises,
            "type": "GET",                  
            
            "headers": {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            data: function (data) {
                generalidades.mostrarCargando(tablaPaises);
                data = Object.assign(data);
            },
            dataSrc: function (json) {
                generalidades.ocultarCargando(tablaPaises);
                return json.data
            },
        },
        buttons: [
            {
                text: '<i class="la la-plus mr-1"></i> Agregar',
                className: "btn btn-success",
                action: function () {
                    $("#modalCrearPaises").modal('show');
                }
            },
            {
                extend: "pdf",
                text: '<i class="fa fa-download"></i> PDF',
                className: "btn btn-outline-danger",
                title: "Listado paises.",
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
                name: 'nombre',
                render: function (data, type, full, meta) {
                    return full?.nombre ?? "N/A";
                }
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
            [5, 10, 20, 30, -1],
            [5, 10, 20, 30, "Todos"]
        ],
        pageLength: 5,
        dom: "<'row'<'col-12 text-right'B><'col-sm-5 col-xs-12'i><'col-sm-7 col-xs-12 dataTables_pager'lp>r><'table-scrollable't><'row'<'col-xs-5 col-sm-5'i><'col-xs-12 col-sm-7 text-right dataTables_pager'lp>>",
        initComplete: function () {}
    });
}