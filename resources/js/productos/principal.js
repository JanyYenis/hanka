"use strict";

const formCrearProductos = "#formCrearProductos";
const seccionClickPaso = ".pasoClickeable";
const selectCategoria = "#selectCategoria";
const selectMarca = ".selectMarca";
const selectSubcategoria = '#selectSubcategoria';
const rutaBuscarCategorias = route('categorias.buscar');
const rutaBuscarMarcas = route('marcas.buscar');
const rutaBuscarSubcategorias = route('subcategorias.buscar');

$(function () {
    iniciarComponentesProductos();
});

window.iniciarComponentesProductos = (form = "") => {
	KTWizard1.init();
    generalidades.touchSpinGenerico(`.touchspin`);
    generalidades.maskValor('.precio');

    $(`.summernote`).summernote({
        height: 100,
    });

	limpiar();
	$(selectSubcategoria).selectpicker();
    $(`${form} ${selectSubcategoria}`)
        .selectpicker()
        .on("change", function () {
                let formularioCercano = $(this).closest("form");
                if (formularioCercano.data("validator")) {
                        $(this).valid();
                    }
                });

    $(`${form} select${selectCategoria}`).on('change', function () {
        if (this.value) {
            cargarSubcategoria(form, this.value);
        }
    });
}

$(document).on('shown.bs.modal', function(){
    let modal = '#'+$(".modal:visible").attr('id');
    generalidades.Select2({
        "id": `select${selectCategoria}`,
        "ruta": rutaBuscarCategorias,
        "minimo": 3,
		// "modal": modal
    });

	generalidades.Select2({
        "id": `select${selectMarca}`,
        "ruta": rutaBuscarMarcas,
        "minimo": 3,
		// "modal": modal
    });
});

const cargarSubcategoria = (form, id) => {
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
			const subcategorias = response?.subcategorias ?? [];
			const select = $(`${form} select${selectSubcategoria}`);
            select.empty().selectpicker("refresh");
			subcategorias.forEach((subcategoria) => {
				let selected = false;
				let idSubcategoria = $(selectSubcategoria).attr('data-subcategoria');
				if (idSubcategoria && subcategoria.id == idSubcategoria) {
					selected = true;
				}
				let opcion = new Option(subcategoria.text, subcategoria.id, selected, selected);
				select.append(opcion);
			});
            select.selectpicker('refresh');
	}
	generalidades.create(rutaBuscarSubcategorias, config, success);
}

const limpiar = () => {
	$(selectSubcategoria).empty().append('<option selected disabled>Seleccione la subcategoria</option>');
};

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

var KTWizard1 = function () {
	// Base elements
	var wizardEl;
	var formEl;
	var validator;
	var wizard;

	// Private functions
	var initWizard = function () {
		// Initialize form wizard
		wizard = new KTWizard('kt_wizard', {
			"startStep": 1, // initial active step number
			"clickableSteps": false  // allow step clicking
		});

		// Validation before going to next page
		wizard.on('beforeNext', function (wizardObj) {
            wizardObj.stop();
            let pasoActual = wizardObj.getStep();
			wizardObj.goTo(pasoActual + 1);
		});

		// Change event
		wizard.on('change', function(wizard) {
			KTUtil.scrollTop();
		});

		wizard.on('beforePrev', function (wizardObj) {
            wizardObj.stop();
			let pasoActual = wizardObj.getStep();
			wizardObj.stop();
			wizardObj.goTo(pasoActual - 1);
		});
	}

	var initValidation = function() {}

	var initSubmit = function () {
		$(document).on("click", ".btnGuardarProducto", function () {
		});
	}

	return {
		// public functions
		init: function () {
			initWizard();
			initSubmit();
		},
		getWizard: function () {
			return wizard;
		}
	};
}();

$(document).on("click", seccionClickPaso, function () {
	const wizard = KTWizard1.getWizard();
	let pasoDeseado = parseInt($(this).attr("data-paso"));

	wizard.start();
	wizard.goTo(pasoDeseado);
});

require("./editar");
require("./crear");
require("./listado");