"use strict";

const tablaPedidos = "#tablaPedidos";
const rutaCargarListadoPedidos = route("pedidos.listado");

$(function () {
    listadoPedidos();
});

/**
 * Función que permite cargar el listado.
 */
const listadoPedidos = () => {
    var table = $(tablaPedidos).DataTable({
        paging: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            "url": rutaCargarListadoPedidos,
            "type": "GET",                  
            
            "headers": {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            data: function (data) {
                generalidades.mostrarCargando(tablaPedidos);
                data.usuario = window.misPedidos ?? 0;
                data = Object.assign(data);
            },
            dataSrc: function (json) {
                generalidades.ocultarCargando(tablaPedidos);
                return json.data
            },
        },
        buttons: [
            {
                extend: "pdf",
                text: '<i class="fa fa-download"></i> PDF',
                className: "btn btn-outline-danger",
                title: "Listado pedidos.",
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
                data: 'indicador',
                name: 'indicador',
                render: function(data, type, full, meta){
                    return full?.indicador ? '#'+full?.indicador : 'N/A';
                }
            },
            {
                data: 'info_tipo_pago.nombre',
                name: 'info_tipo_pago.nombre',
                render: function(data, type, full, meta){
                    return full?.info_tipo_pago?.nombre ?? 'N/A';
                }
            },
            {
                data: 'puntos_compra',
                name: 'puntos_compra',
                render: function(data, type, full, meta){
                    return full?.puntos_compra ? generalidades.formatoDinero(full?.puntos_compra) : '0';
                }
            },
            {
                data: 'usuario',
                name: 'usuario',
                render: function(data, type, full, meta){
                    return full?.usuario ? full?.usuario?.nombre+" "+full?.usuario?.apellido : 'N/A';
                }
            },
            {
                data: 'empleado.usuario',
                name: 'empleado.usuario',
                render: function(data, type, full, meta){
                    return full?.empleado?.usuario ? full?.empleado?.usuario?.nombre+" "+full?.empleado?.usuario?.apellido : 'N/A';
                }
            },
            {
                data: 'total',
                name: 'total',
                render: function(data, type, full, meta){
                    return full?.total ? generalidades.formatoDinero(full?.total) : '0';
                }
            },
            {
                data: 'sede',
                name: 'sede',
                render: function(data, type, full, meta){
                    return full?.sede ? full?.sede?.nombre : 'N/A';
                }
            },
            {
                data: 'fecha_pedido',
                name: 'fecha_pedido'
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
                data: 'direccion',
                name: 'direccion',
                render: function(data, type, full, meta){
                    return full?.direccion ?? 'N/A';
                }
            },
        ],
        order: [
            [0, "asc"]
        ], 
        lengthMenu: [
            [10, 15, 20, 50, -1],
            [10, 15, 20, 50, "Todos"]
        ],
        pageLength: 10,
        dom : `<'row mb-2'<'col-12 text-right'B>><'row'<'col-md-6 col-sm-12'i><'col-md-6 col-sm-12 text-right dataTables_pager'lp>><'table-scrollable't><'row'<'col-md-6 col-sm-12'i><'col-md-6 col-sm-12 text-right dataTables_pager'lp>>`,
        initComplete: function () {}
    });
}