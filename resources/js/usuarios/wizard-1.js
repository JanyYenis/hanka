"use strict";
const seccionClickPaso = ".pasoClickeable";

$(function () {
    KTWizard1.init();
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
		$(document).on("click", ".btnGuardarUsuario", function () {
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