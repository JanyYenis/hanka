"use strict";

// rutas 
const rutaEditar = "empleados.editar";

// id y clases
const formEditarEmpleado = "#formEditarEmpleado";
const editarEmpleado = "#editarEmpleado";
const modalEditarEmpleado = "#modalEditarEmpleado";
const rutabuscarCargos = route('empleados.buscarCargos');
const rutaBuscarUsuarios = route('usuarios.buscarUsuarios');
const selectUsuarios = '.selectUsuarios';
const selectCargos = '.selectCargos';

$(function () {
    generalidades.validarFormulario(formEditarEmpleado, enviarDatos);
});

$(document).on("click", ".btnEditarEmpleado", function () {
    let id = $(this).attr("data-modificar");
    if (id) {
        cargarDatos(id);
    }
});

const cargarDatos = (id) => {
    const ruta = route(rutaEditar, { "empleado": id });
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', ruta, 'body', modalEditarEmpleado, editarEmpleado, function(){
        // window.iniciarComponentesEmpleado(formEditarEmpleado);
        generalidades.Select2({
            "id": `${formEditarEmpleado} ${selectUsuarios}`,
            "ruta": rutaBuscarUsuarios,
            "minimo": 3,
        });
    
        generalidades.Select2({
            "id": `${formEditarEmpleado} ${selectCargos}`,
            "ruta": rutabuscarCargos,
            "minimo": 3
        });
        generalidades.marcarRequeridos(formEditarEmpleado);
    });
}

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formEditarEmpleado"));
    
    const config = {
        'method': 'PUT',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }

    const success = (response) => {
        if (response.estado == 'success') {
            $(modalEditarEmpleado).modal('hide');
        }
        generalidades.ocultarCargando(formEditarEmpleado);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        $("#tablaEmpleados").DataTable().ajax.reload(null, false);
    }

    const error = (response) => {
        generalidades.ocultarCargando(formEditarEmpleado);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    const rutaActualizar = route("empleados.actualizar", { "empleado": formData.get("id") });
    generalidades.edit(rutaActualizar, config, success, error);
    generalidades.mostrarCargando(formEditarEmpleado);
}