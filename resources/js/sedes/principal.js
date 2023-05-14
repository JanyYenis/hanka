"use strict";
const selectPais = "#selectPais";
const selectCiudad = ".selectCiudad";
const rutaCiudades = route("ciudades.buscar");
const rutaBuscarPais = route("usuarios.buscar-paises");

$(function () {
    iniciarComponentesSedes();
});

window.iniciarComponentesSedes = (form = "") => {
    limpiar();
    $(selectCiudad).selectpicker();
    $(`${form} ${selectCiudad}`)
        .selectpicker()
        .on("change", function () {
                let formularioCercano = $(this).closest("form");
                if (formularioCercano.data("validator")) {
                        $(this).valid();
                    }
                });
    generalidades.Select2({
        "id": `${form} ${selectPais}`,
        "ruta": rutaBuscarPais,
        "minimo": 3
    });

    generalidades.initTelefonoInput(`${form} .tel`);
    generalidades.maskTelefono(`${form} .tel`);
    generalidades.maskCorreo(`${form} .email`);

    $(`${form} select${selectPais}`).on('change', function () {
        if (this.value) {
            cargarCiudades(form, this.value);
        }
    });
}

const cargarCiudades = (form, id) => {
    const config = {
		'method': 'POST',
		'headers': {
			'Accept': generalidades.CONTENT_TYPE_JSON,
			'Content-Type': generalidades.CONTENT_TYPE_JSON,
		},
		'body': {
			"id": id
		}
	}

    const success = (response) => {
			const ciudades = response?.ciudades ?? [];
			const select = $(`${form} select${selectCiudad}`);
            select.empty().selectpicker("refresh");
			ciudades.forEach((ciudad) => {
				let selected = false;
				let idCiudad = $("#idCiudad").attr('data-ciudad');
				if (idCiudad && ciudad.id == idCiudad) {
					selected = true;
				}
				let opcion = new Option(ciudad.text, ciudad.id, selected, selected);
				select.append(opcion);
			});
            select.selectpicker('refresh');
	}
	generalidades.create(rutaCiudades, config, success);
}

const limpiar = () => {
	$(selectCiudad).empty().append('<option selected disabled>Seleccione una ciudad...</option>');
};

$(document).on("click", ".btnPincipalSede", function () {
    let id = $(this).attr("data-principal");
    if (id) {
        const config = {
            'method': 'PUT',
            'headers': {
                'Accept': generalidades.CONTENT_TYPE_JSON,
            },
            'body': {
                'cambiarPrincipal': 1
            }
        }
    
        const success = (response) => {
            generalidades.ocultarCargando('body');
            generalidades.toastrGenerico(response?.estado, response?.mensaje);
            $("#tablaSedes").DataTable().ajax.reload(null, false);
        }
    
        const error = (response) => {
            generalidades.ocultarCargando('body');
            generalidades.toastrGenerico(response?.estado, response?.mensaje);
        }
        const rutaActualizar = route("sedes.actualizar", { "sede": id });
        generalidades.edit(rutaActualizar, config, success, error);
        generalidades.mostrarCargando('body');
    }
});

require("./editar");
require("./crear");
require("./listado");
require("./paises/principal");