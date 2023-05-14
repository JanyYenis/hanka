"use strict";
const selectCiudad = ".selectCiudad";
const rutaCiudades = route("ciudades.buscar");
const selectPais = ".selectPais";
const rutaBuscarPais = route("usuarios.buscar-paises");
const rutaElimnarUsuario = 'usuarios.delete';

$(function () {
    iniciarComponentesUsuarios();
});

window.iniciarComponentesUsuarios = (form = "") => {
	$('.kt-selectpiker').selectpicker();
    $(`${form} .kt-selectpiker`)
        .selectpicker()
        .on("change", function () {
			let formularioCercano = $(this).closest("form");
			if (formularioCercano.data("validator")) {
					$(this).valid();
				}
			});
	generalidades.datePickerGenerico(`${form} .fecha`);
	generalidades.maskFecha(`${form} .fecha`);
	generalidades.initTelefonoInput(`${form} .tel`);
	generalidades.maskTelefono(`${form} .tel`);
	generalidades.maskCorreo(`${form} .email`);

	$(document).on("click", `${form} #verClave`, function () {
		generalidades.revelarClave(`${form} .clave`, this);
	});
	
	$(document).on("click", `${form} #verClave2`, function () {
		generalidades.revelarClave(`${form} .clave2`, this);
	});

	generalidades.Select2({
        "id": `${form} ${selectPais}`,
        "ruta": rutaBuscarPais,
        "minimo": 3
    });
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

$(document).on('click', `.btnEliminar`, function () {
    let id = $(this).attr("data-eliminar");
    generalidades.mensajeGeneral('Confirmar acción', 'Desea eliminar realmente el registro?', 'info', 'Confirmar', 'Cancelar', () => {
        eliminar(id);
    });
});

const eliminar = (id) => {
    let ruta = route(rutaElimnarUsuario, { 'usuario': id } );
    let config = {
        "headers": {
            "Accept": generalidades.CONTENT_TYPE_JSON,
            "Content-Type": generalidades.CONTENT_TYPE_JSON
        },
        "method": "DELETE",
        "body": {
            'usuario': id
        }
    }
    
    const success = (response) => {
        if (response.estado == 'success') {
            generalidades.ocultarCargando('body');
            $("#tablaUsuarios").DataTable().ajax.reload(null, false);
        }
    }
    generalidades.delete(ruta, config, success);
    generalidades.mostrarCargando('body');
}

require("./editar");
require("./crear");
require("./listado");
require("./crear-clave");
// require("./perfil");
// require("./wizard-1");