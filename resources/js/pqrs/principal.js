"use strict";
const formPqrs = '#formPqrs';

$(function () {
    iniciarComponentesPqrs();
});

window.iniciarComponentesPqrs = (form = "") => {
    $(`${form} .summernote`).summernote({
        height: 100,
    });

    $('span.note-icon-caret').remove();

    $('.note-editable').css('background', '#fff');
    
    $(document).on("click", "#tabVerPrqs", function () {
        $('#GuardarPrqs').addClass('d-none');
    });

    $(document).on("click", "#tabResponederPqrs", function () {
        $('#GuardarPrqs').removeClass('d-none');
    });

    $(".kt-selectpicker").selectpicker("refresh");
    $(`${form} .kt-selectpicker`)
        .selectpicker()
        .on("change", function () {
            let formularioCercano = $(this).closest("form");
            if (formularioCercano.data("validator")) {
                $(this).valid();
            }
        });

    // $(`${form} select${selecTipos}`).on('change', function () {
    //     if (this.value) {
    //         mostarSelects(form, this.value);
    //     }
    // });
}

require("./listado");
require("./crear");
require("./ver");