"use strict";

$(function () {
    iniciarComponentesPedidos();
});

window.iniciarComponentesPedidos = (form = "") => {	
}

// $(document).on('click', `.btnEliminar`, function () {
//     let id = $(this).attr("data-eliminar");
//     generalidades.mensajeGeneral('Confirmar acción', 'Desea eliminar realmente el registro?', 'info', 'Confirmar', 'Cancelar', () => {
//         eliminar(id);
//     });
// });

// const eliminar = (id) => {
// 	console.log('jany');
//     let ruta = route(rutaElimnarUsuario, { 'usuario': id } );
//     let config = {
//         "headers": {
//             "Accept": generalidades.CONTENT_TYPE_JSON,
//             "Content-Type": generalidades.CONTENT_TYPE_JSON
//         },
//         "method": "DELETE",
//         "body": {
//             'usuario': id
//         }
//     }
    
//     const success = (response) => {
//         if (response.estado == 'success') {
//             generalidades.ocultarCargando('body');
//             $("#tablaProductos").DataTable().ajax.reload(null, false);
//         }
//     }
//     generalidades.delete(ruta, config, success);
//     generalidades.mostrarCargando('body');
// }

// require("./editar");
// require("./crear");
require("./listado");