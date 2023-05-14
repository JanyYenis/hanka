"use strict";
const rutabuscarCargos = route('empleados.buscarCargos');
const rutaBuscarUsuarios = route('usuarios.buscarUsuarios');
const selectUsuarios = '.selectUsuarios';
const selectCargos = '.selectCargos';

$(function () {
    iniciarComponentesEmpleado();
});

window.iniciarComponentesEmpleado = (form = "") => {
    // let configMultiSelect = {
    //     elemento: '.selectCargos',
    //     selectableHeaderText: "Cragos Disponibles",
    //     selectionHeaderText: "Cargos Asignados",
    //     selectableHeaderPlaceholder: "Escribe el nombre del cargo",
    //     selectionHeaderPlaceholder: "Escribe el nombre del cargo"
    // }
    // generalidades.multiSelect(configMultiSelect);
    // cargos();
    generalidades.Select2({
        "id": `${form} ${selectUsuarios}`,
        "ruta": rutaBuscarUsuarios,
        "minimo": 3,
    });

    generalidades.Select2({
        "id": `${form} ${selectCargos}`,
        "ruta": rutabuscarCargos,
        "minimo": 3
    });
}

const cargos = () => {
    const config = {
        "method": "POST",
        "body": {
            "empleado": null
        },
        "headers": {
            "Content-Type": generalidades.CONTENT_TYPE_JSON,
            "Accept": generalidades.CONTENT_TYPE_JSON
        }
    };

    const success = (response) => {
        if (response.estado === "success") {
            $(".selectCargos").multiSelect("deselect");
            $(".selectCargos option").remove();
            $(".selectCargos").multiSelect("refresh");
            let options = "";

            let seleccionados = [];
            
            Object.entries(response.cargos).forEach(([id, cargo]) => {
                options = options + `<option value="${cargo.id}" ${cargo.seleccionado ? "selected" : ""}>${cargo.nombre}</option>`;
                if (cargo.seleccionado) {
                    seleccionados.push(cargo.id);
                }
            });

            $(".selectCargos").append(options);
            $(".selectCargos").val(seleccionados);
            $(".selectCargos").multiSelect("refresh");
        }
        generalidades.ocultarCargando("body");
    };
    const error = (response) => {
        generalidades.toastrGenerico(response.estado, response.mensaje);
        generalidades.ocultarCargando("body");
    }

    generalidades.mostrarCargando("body");
    generalidades.post(rutabuscarCargos, config, success, error);
};

require("./editar");
require("./crear");
require("./listado");
require('./cagos/principal');