"use strict";
const seccionClickPaso = ".pasoClickeable";
const rutaGuardarPedido = route("pedidos.store");
const formHacerPedido = '#formHacerPedido';

$(function () {
    KTWizard1.init();
	iniciarComponenteRealizarPedido();
    generalidades.validarFormulario(formHacerPedido, enviarDatos);
});

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
			prefactura();
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
		$(document).on("click", ".btnGuardarPedido", function () {
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
	prefactura();

	wizard.start();
	wizard.goTo(pasoDeseado);
});

const iniciarComponenteRealizarPedido = (form = '') => {
	generalidades.initTelefonoInput(`${form} .tel`);
	$(`${form} .kt-selectpicker`).selectpicker();
    $(`${form} .kt-selectpicker`)
        .selectpicker()
        .on("change", function () {
			let formularioCercano = $(this).closest("form");
			if (formularioCercano.data("validator")) {
					$(this).valid();
				}
			});
}

const prefactura = () => {
	let textoTipo = 'Pasarela de pago';
	let tipo = $('#tipoPagoPedido').val();
	let direccion = $('#direccionPedido').val();

	if (window.pedidos.EFECTIVO == tipo) {
		textoTipo = 'Efectivo';
	}

	if ($('#usarPuntos').is(':checked')) {
		$('#seccionPuntosUsuario').removeClass('d-none');
		$('#totalConPuntos').removeClass('d-none');
		$('#totalSinPuntos').addClass('d-none');
	} else {
		$('#seccionPuntosUsuario').addClass('d-none');
		$('#totalSinPuntos').removeClass('d-none');
		$('#totalConPuntos').addClass('d-none');
	}

	$('#facturaTipoPago').text(textoTipo);
	$('#facturaDireccion').text(direccion);
}

const enviarDatos = (form) => {
    let formData = new FormData(document.getElementById("formHacerPedido"));

    const config = {
        'method': 'POST',
        'headers': {
            'Accept': generalidades.CONTENT_TYPE_JSON,
        },
        'body': formData
    }
    const success = (response) => {
        if (response.estado == 'success') {
            iniciarComponenteRealizarPedido(formHacerPedido);
            generalidades.ocultarValidaciones(formHacerPedido);
            generalidades.mensajeSwal('Se le a enviado la factura al su correo electronico.', 'success', 'Correcto', null, function(){
				window.location.href = `/pedidos/mis-pedidos`;
			});
        }
        generalidades.ocultarCargando(formHacerPedido);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    const error = (response) => {
        generalidades.mostrarValidaciones(formHacerPedido, response.validaciones);
        generalidades.ocultarCargando(formHacerPedido);
        generalidades.toastrGenerico(response?.estado, response?.mensaje);
    }
    generalidades.create(rutaGuardarPedido, config, success, error);
    generalidades.mostrarCargando(formHacerPedido);
}