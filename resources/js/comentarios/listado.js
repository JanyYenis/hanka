"use strict";

const tablaComentarios = "#tablaComentarios";
const rutaCargarListadoComentarios = route("comentarios.listado");

$(function () {
    listadoComentarios();
});

/**
 * Función que permite cargar el listado.
 */
const listadoComentarios = () => {
    var table = $(tablaComentarios).DataTable({
        paging: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            "url": rutaCargarListadoComentarios,
            "type": "GET",                  
            
            "headers": {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            data: function (data) {
                generalidades.mostrarCargando(tablaComentarios);
                data = Object.assign(data);
            },
            dataSrc: function (json) {
                generalidades.ocultarCargando(tablaComentarios);
                return json.data
            },
        },
        buttons: [
            {
                extend: "pdf",
                text: '<i class="fa fa-download"></i> PDF',
                className: "btn btn-outline-danger",
                title: "Listado comentarios.",
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
                data: 'producto.nombre_producto',
                name: 'producto.nombre_producto'
            },
            {
                data: 'usuario',
                name: 'usuario',
                render: function(data, type, full, meta){
                    return full?.usuario ? full?.usuario?.nombre+" "+full?.usuario?.apellido : 'N/A';
                }
            },
            {
                data: 'estrellas',
                name: 'estrellas'
            },
            {
                data: 'fecha',
                name: 'fecha'
            },
            {
                data: 'estado',
                name: 'estado'
            },
            {
                data: 'comentario',
                name: 'comentario'
            },
        ],
        order: [
            [0, "asc"]
        ], 
        lengthMenu: [
            [5, 10, 20, 50, -1],
            [5, 10, 20, 50, "Todos"]
        ],
        pageLength: 5,
        dom : `<'row mb-2'<'col-12 text-right'B>><'row'<'col-md-6 col-sm-12'i><'col-md-6 col-sm-12 text-right dataTables_pager'lp>><'table-scrollable't><'row'<'col-md-6 col-sm-12'i><'col-md-6 col-sm-12 text-right dataTables_pager'lp>>`,
        initComplete: function () {}
    });
}