"use strict";

const tablaProductos = "#tablaProductos";
const rutaCargarListadoProductos = route("productos.listado");

$(function () {
    listadoProductos();
});

/**
 * Función que permite cargar el listado.
 */
const listadoProductos = () => {
    var table = $(tablaProductos).DataTable({
        paging: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            "url": rutaCargarListadoProductos,
            "type": "GET",                  
            
            "headers": {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            data: function (data) {
                generalidades.mostrarCargando(tablaProductos);
                data = Object.assign(data);
            },
            dataSrc: function (json) {
                generalidades.ocultarCargando(tablaProductos);
                return json.data
            },
        },
        buttons: [
            {
                extend: "pdf",
                text: '<i class="fa fa-download"></i> PDF',
                className: "btn btn-outline-danger",
                title: "Listado productos.",
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
                data: 'imagen',
                name: 'imagen'
            },
            {
                data: 'nombre_producto',
                name: 'nombre_producto'
            },
            {
                data: 'precio_venta',
                name: 'precio_venta',
                render: function(data, type, full, meta){
                    return full?.precio_venta ? generalidades.formatoDinero(full?.precio_venta) : '0';
                }
            },
            {
                data: 'cantidad',
                name: 'cantidad',
                render: function(data, type, full, meta){
                    return full?.cantidad ? generalidades.formatoDinero(full?.cantidad) : '0';
                }
            },
            {
                data: 'descripcion',
                name: 'descripcion'
            },
            {
                data: 'descuento',
                name: 'descuento',
                render: function(data, type, full, meta){
                    return full?.descuento ? full?.descuento+'%' : '0%';
                }
            },
            {
                data: 'iva',
                name: 'iva',
                render: function(data, type, full, meta){
                    return full?.iva ? full?.iva+'%' : '0%';
                }
            },
            {
                data: 'garantia',
                name: 'garantia',
                render: function(data, type, full, meta){
                    return full?.garantia ? full?.garantia : 'N/A';
                }
            },
            {
                data: 'subcategoria',
                name: 'subcategoria',
                render: function(data, type, full, meta){
                    return full?.subcategoria?.nombre ?? 'N/A';
                }
            },
            {
                data: 'marca',
                name: 'marca',
                render: function(data, type, full, meta){
                    return full?.marca?.nombre ?? 'N/A';
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
            [10, 15, 20, 50, -1],
            [10, 15, 20, 50, "Todos"]
        ],
        pageLength: 10,
        dom : `<'row mb-2'<'col-12 text-right'B>><'row'<'col-md-6 col-sm-12'i><'col-md-6 col-sm-12 text-right dataTables_pager'lp>><'table-scrollable't><'row'<'col-md-6 col-sm-12'i><'col-md-6 col-sm-12 text-right dataTables_pager'lp>>`,
        initComplete: function () {}
    });
}