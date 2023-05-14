@extends("dashboard.layouts.index")

@section('contenido')
<div class="card-header border-0 pt-5">
    <h1 class="mt-4">prueba</h1>
</div><br><br>
<div class="card-body pt-2 pb-0 mt-n3">
    <main>
        {{-- Wizard --}}
        {{-- <div class="wizard wizard-1" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="true">
            <!--begin::Wizard Nav-->
            <div class="wizard-nav border-bottom">
                <div class="wizard-steps p-8 p-lg-10">
                    <!--begin::Wizard Step 1 Nav-->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                        <div class="wizard-label">
                            <i class="wizard-icon fas fa-info-circle"></i>
                            <h3 class="wizard-title">
                                1. Datos Basicos
                            </h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <!--end::Wizard Step 1 Nav-->
                    <!--begin::Wizard Step 2 Nav-->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-label">
                            <i class="wizard-icon flaticon-list"></i>
                            <h3 class="wizard-title">
                                2. Detalles del producto
                            </h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <!--end::Wizard Step 2 Nav-->
                </div>
            </div>
            <!--end::Wizard Nav-->
            <!--begin::Wizard Body-->
            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                <div class="col-xl-12 col-xxl-7">
                    <!--begin::Wizard Form-->
                    <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form">
                        <!--begin::Wizard Step 1-->
                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                            <h3 class="mb-10 font-weight-bold text-dark">Datos basicos del producto.</h3>
                            hola
                        </div>
                        <!--end::Wizard Step 1-->
                        <!--begin::Wizard Step 2-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <h4 class="mb-10 font-weight-bold text-dark">Detalles del producto.</h4>
                            que mas
                        </div>
                        <!--end::Wizard Step 2-->
                        <!--begin::Wizard Actions-->
                        <div class="d-flex justify-content-between border-top mt-5 pt-10">
                            <div class="mr-2">
                                <button type="button" class="beforePrev btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                <button type="button" class="beforeNext btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                            </div>
                        </div>
                        <!--end::Wizard Actions-->
                    </form>
                    <!--end::Wizard Form-->
                </div>
            </div>
            <!--end::Wizard Body-->
        </div> --}}

        {{-- Qr --}}
        {{-- <div class="container">
            {!! QrCode::size(300)->generate(route('admin.index')) !!}
        </div> --}}

        {{-- Graficas --}}
        {{-- <div class="container">
            <div class="row">
                <div id="chart1">
                </div>
                <div id="chart2">
                </div>
            </div>
        </div> --}}

        {{-- Duplicacion --}}
        {{-- <div id="kt_repeater_1">
          <div class="form-group row" id="kt_repeater_1">
              <label class="col-lg-2 col-form-label text-right">Telefonos</label>
              <div data-repeater-list="" class="col-lg-10">
                  <div data-repeater-item class="form-group row align-items-center">
                      <div class="col-md-5">
                          <div class="input-group flex-nowrap">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="fas fa-phone-alt"></i>
                                  </span>
                              </div>
                              <input type="text" class="form-control tel" name="telefonos" value="{{$usuario?->telefono ?? ''}}"/>
                              <div class="d-md-none mb-2"></div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="radio-inline">
                              <label class="checkbox checkbox-success">
                                  <input type="checkbox" class="whatsapp" name="whatsapp"/>
                                  <span></span>
                                  &nbsp;<i class="text-success flaticon-whatsapp"></i>&nbsp;WhatsApp
                              </label>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger btnEliminarDuplicadoTelefono">
                              <i class="flaticon2-rubbish-bin-delete-button"></i>Eliminar
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="form-group row">
              <label class="col-lg-2 col-form-label text-right"></label>
              <div class="col-lg-4">
                  <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                      <i class="la la-plus"></i>Agregar
                  </a>
              </div>
          </div>
      </div>
      <div class="separator separator-dashed my-10"></div>
      <div id="kt_repeater_2">
          <div class="form-group row" id="kt_repeater_2">
              <label class="col-lg-2 col-form-label text-right">E-mails</label>
              <div data-repeater-list="" class="col-lg-10">
                  <div data-repeater-item class="form-group row align-items-center">
                      <div class="col-md-5">
                          <div class="input-group flex-nowrap">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="flaticon-email"></i>
                                  </span>
                              </div>
                              <input type="text" name="emails" class="form-control email" value="{{$usuario?->email ?? ''}}"/>
                              <div class="d-md-none mb-2"></div>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger btnEliminarDuplicadoTelefono">
                              <i class="flaticon2-rubbish-bin-delete-button"></i>Eliminar
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="form-group row">
              <label class="col-lg-2 col-form-label text-right"></label>
              <div class="col-lg-4">
                  <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                      <i class="la la-plus"></i>Agregar
                  </a>
              </div>
          </div>
      </div> --}}
    </main>
</div>
@endsection

@section('scripts')
    {{-- Wizard --}}
    {{-- <script>
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
                    wizardObj.goTo(wizardObj.getStep() + 1);
                });

                // Change event
                wizard.on('change', function(wizard) {
                    KTUtil.scrollTop();
                });

                wizard.on('beforePrev', function (wizardObj) {
                    KTUtil.scrollTop();
                    wizardObj.stop();
                    let pasoActual = wizardObj.getStep();
                    wizardObj.stop();
                    wizardObj.goTo(pasoActual - 1);
                });
            }

            var initValidation = function() {}

            var initSubmit = function () {
                $(document).on("click", ".btnTerminar", function () {
                    console.log('jany');
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

        jQuery(document).ready(function () {
            KTWizard1.init();
        });
    </script> --}}

    {{-- Graficas --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    {{-- <script>
        
        var options = {
          series: [44, 55, 13, 43, 22],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Una estrella', 'Dos estrellas', 'Tres estrellas', 'Cuatro estrellas', 'Cinco estrellas'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();
    </script> --}}
    {{-- <script>
        var options = {
          series: [{
          name: 'Porcentaje',
          data: [2.3, 3.1, 4.0, 10.1]
        }],
          chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val + "%";
          },
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        
        xaxis: {
          categories: ["P", "Q", "R", "S"],
          position: 'top',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val + "%";
            }
          }
        
        },
        title: {
          text: 'Datos de las PQRS',
          floating: true,
          offsetY: 330,
          align: 'center',
          style: {
            color: '#444'
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();
    </script> --}}
    {{-- <script>
        var options = {
          series: [{
            name: "Ventas de este año",
            data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
          }
        ],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: [5, 7, 5],
          curve: 'straight',
          dashArray: [0, 8, 5]
        },
        title: {
          text: 'Page Statistics',
          align: 'left'
        },
        legend: {
          tooltipHoverFormatter: function(val, opts) {
            return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
          }
        },
        markers: {
          size: 0,
          hover: {
            sizeOffset: 6
          }
        },
        xaxis: {
          categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
            'Octubre', 'Noviembre', 'Diciembre'
          ],
        },
        tooltip: {
          y: [
            {
              title: {
                formatter: function (val) {
                  return val + " (mins)"
                }
              }
            },
          ]
        },
        grid: {
          borderColor: '#f1f1f1',
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();
    </script> --}}

    {{-- Duplicacion --}}
    {{-- <script>
      var KTFormRepeater = function() {
      var demo1 = function() {
          $('#kt_repeater_1').repeater({
              initEmpty: false,
              isFirstItemUndeletable: true,

              show: function () {
                  $(this).find('.iti__flag-container').remove();
                  $(this).find('.iti').removeClass('iti--allow-dropdown');
                  generalidades.maskTelefono(`${formEditarContacto} .tel`);
                  $(this).slideDown();
              },

              hide: function (deleteElement) {
                  $(this).slideUp(deleteElement);
              }
          });
      }
      var demo2 = function() {
          $('#kt_repeater_2').repeater({
              initEmpty: false,
              isFirstItemUndeletable: true,

              show: function () {
                  generalidades.maskCorreo(`${formEditarContacto} .email`);
                  $(this).slideDown();
              },

              hide: function (deleteElement) {
                  $(this).slideUp(deleteElement);
              }
          });
      }

      return {
          init: function() {
              demo1();
              demo2();
          }
      };
      }();
      jQuery(document).ready(function() {
      KTFormRepeater.init();
      });
    </script> --}}
@endsection