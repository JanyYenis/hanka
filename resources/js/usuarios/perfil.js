"use strict";
const selectCiudad = ".selectCiudad";
const rutaCiudades = route("ciudades.buscar");
const selectPais = ".selectPais";
const rutaBuscarPais = route("usuarios.buscar-paises");
const formEditarPerfil = "#formEditarPerfil";
const formCrearTelefono = "#formCrearTelefono";
const rutaEditarTelefono = "usuarios.editarTelefono";
const formEditarTelefono = "#formEditarTelefono";
const seccionEditar = "#editarTelefono";
const modalEditarTelefono = "#modalEditarTelefono";
const seccionTelefono = "#seccionTelefono";
const formEditarCorreo = "#formEditarCorreo";

$(function () {
    iniciarComponentesPerfil(formEditarPerfil);
    iniciarComponentesTelefono();
    $(`${formEditarPerfil} .selectPais`).trigger('change');
    generalidades.marcarRequeridos(formCrearTelefono);
    generalidades.validarFormulario(formCrearTelefono, guardarTelefono);
    generalidades.validarFormulario(formEditarTelefono, actualizarTelefono);
    generalidades.marcarRequeridos(formEditarPerfil);
    generalidades.validarFormulario(formEditarPerfil, enviarDatos);
    generalidades.validarFormulario(formEditarCorreo, acrualizarCorreo);
});

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formEditarPerfil"));
    formData.set('fecha_nacimiento', $('#fecha').val());
    
    const config = {
        'method': 'PUT',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }

    const success = (response) => {
        if (response.estado == 'success') {
            generalidades.ocultarValidaciones(formEditarPerfil);
        }
        generalidades.ocultarCargando(formEditarPerfil);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }

    const error = (response) => {
        generalidades.ocultarCargando(formEditarPerfil);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        generalidades.mostrarValidaciones(formEditarPerfil, response.validaciones);
    }
    const rutaActualizar = route("usuarios.actualizar", { "usuario": formData.get("id") });
    generalidades.edit(rutaActualizar, config, success, error);
    generalidades.mostrarCargando(formEditarPerfil);
}

const acrualizarCorreo = (form) => {
    let formData = new FormData(document.getElementById("formEditarCorreo"));
    
    const config = {
        'method': 'PUT',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }

    const success = (response) => {
        if (response.estado == 'success') {
            generalidades.ocultarValidaciones(formEditarCorreo);
        }
        generalidades.ocultarCargando(formEditarCorreo);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }

    const error = (response) => {
        generalidades.ocultarCargando(formEditarCorreo);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        generalidades.mostrarValidaciones(formEditarCorreo, response.validaciones);
    }
    const rutaActualizar = route("usuarios.actualizar", { "usuario": formData.get("id") });
    generalidades.edit(rutaActualizar, config, success, error);
    generalidades.mostrarCargando(formEditarCorreo);
}

const guardarTelefono = (form) => {
    let formData = new FormData(document.getElementById("formCrearTelefono"));
    let inputTelefono = generalidades.darTelefonoInput(`${formCrearTelefono} #tel`);
    let tel = inputTelefono?.getNumber(intlTelInputUtils.numberFormat.NATIONAL);
    tel = tel.replace(/\((\w+)\)/g, "$1");
    tel = tel.replace(/-/g, "");
	let codigo = inputTelefono?.getSelectedCountryData()?.dialCode ?? '';
    formData.set('numero', "+"+codigo+tel);
    
    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }

    const success = (response) => {
        if (response.estado == 'success') {
            $('#modalCrearTelefono').modal('hide');
            generalidades.ocultarValidaciones(formCrearTelefono);
            refrescarSeccionTelefono();
        }
        generalidades.ocultarCargando(formCrearTelefono);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }

    const error = (response) => {
        generalidades.ocultarCargando(formCrearTelefono);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        generalidades.mostrarValidaciones(formCrearTelefono, response.validaciones);
    }
    const rutaGuardarContacto = route("usuarios.guardarContacto");
    generalidades.create(rutaGuardarContacto, config, success, error);
    generalidades.mostrarCargando(formCrearTelefono);
}

window.iniciarComponentesPerfil = (form = "") => {
	$(`${formEditarPerfil} .kt-selectpiker`).selectpicker();
    $(`${formEditarPerfil} .kt-selectpiker`)
        .selectpicker()
        .on("change", function () {
			let formularioCercano = $(this).closest("form");
			if (formularioCercano.data("validator")) {
					$(this).valid();
				}
			});
	generalidades.datePickerGenerico(`${formEditarPerfil} .fecha`);
	generalidades.maskFecha(`${formEditarPerfil} .fecha`);
	generalidades.maskCorreo(`${formCrearTelefono} .email`);

	generalidades.Select2({
        "id": `${formEditarPerfil} ${selectPais}`,
        "ruta": rutaBuscarPais,
        "minimo": 3
    });
	limpiar();
	$(selectCiudad).selectpicker();
    $(`${formEditarPerfil} ${selectCiudad}`)
        .selectpicker()
        .on("change", function () {
                let formularioCercano = $(this).closest("form");
                if (formularioCercano.data("validator")) {
                        $(this).valid();
                    }
                });

    $(`${formEditarPerfil} select${selectPais}`).on('change', function () {
        if (this.value) {
            cargarCiudades(formEditarPerfil, this.value);
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

$(document).on("click", ".btnEditarTelefono", function () {
    let id = $(this).attr("data-modificar");
    if (id) {
        cargarDatos(id);
    }
});

const cargarDatos = (id) => {
    const ruta = route(rutaEditarTelefono, { "telefono": id });
    generalidades.mostrarCargando('body');
    generalidades.ejecutar('GET', ruta, 'body', modalEditarTelefono, seccionEditar, function(){
        iniciarComponentesTelefono(formEditarTelefono);
        generalidades.marcarRequeridos(formEditarTelefono);
    });
}

const actualizarTelefono = (form) => {
    let formData = new FormData(document.getElementById("formEditarTelefono"));
    let inputTelefono = generalidades.darTelefonoInput(`${formEditarTelefono} #tel`);
	let tel = inputTelefono?.getNumber(intlTelInputUtils.numberFormat.NATIONAL);
    tel = tel.replace(/\((\w+)\)/g, "$1");
    tel = tel.replace(/-/g, "");
	let codigo = inputTelefono?.getSelectedCountryData()?.dialCode ?? '';
    formData.set('numero', "+"+codigo+tel);
    
    const config = {
        'method': 'PUT',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }

    const success = (response) => {
        if (response.estado == 'success') {
            $(modalEditarTelefono).modal('hide');
            generalidades.ocultarValidaciones(formEditarTelefono);
            iniciarComponentesTelefono();
            refrescarSeccionTelefono();
        }
        generalidades.ocultarCargando(formEditarTelefono);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }

    const error = (response) => {
        generalidades.ocultarCargando(formEditarTelefono);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
        generalidades.mostrarValidaciones(formEditarTelefono, response.validaciones);
    }
    const rutaActualizarTelefono = route("usuarios.actualizarTelefono", { "telefono": formData.get("id") });
    generalidades.edit(rutaActualizarTelefono, config, success, error);
    generalidades.mostrarCargando(formEditarTelefono);
}

const iniciarComponentesTelefono = (form = formCrearTelefono) => {
    $(`${form} .tiposTelefonos`).selectpicker();
    $(`${form} .tiposTelefonos`)
        .selectpicker()
        .on("change", function () {
			let formularioCercano = $(this).closest("form");
			if (formularioCercano.data("validator")) {
					$(this).valid();
				}
			});

    generalidades.initTelefonoInput(`${form} .tel`);
    generalidades.maskTelefono(`${form} .tel`);
}

const refrescarSeccionTelefono = () => {
    let ruta = route("usuarios.refrescar-seccion-telefono");
    generalidades.refrescarSeccion(null, ruta, seccionTelefono, function (response) {
        generalidades.ocultarCargando(seccionTelefono);
    });
}

$(document).on("click", ".btnPincipalTelefono", function () {
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
            if (response.estado == 'success') {
                refrescarSeccionTelefono();
            }
            generalidades.ocultarCargando('body');
            generalidades.toastrGenerico(response?.estado, response?.mensaje);
        }
    
        const error = (response) => {
            generalidades.ocultarCargando('body');
            generalidades.toastrGenerico(response?.estado, response?.mensaje);
        }
        const rutaPasarPrincipal = route("usuarios.actualizarTelefono", { "telefono": id });
        generalidades.edit(rutaPasarPrincipal, config, success, error);
        generalidades.mostrarCargando('body');
    }
});

require('./wizard-1');