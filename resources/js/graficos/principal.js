"use strict";

$(function () {
  iniciarComponentesGraficos();
});

window.iniciarComponentesGraficos = () => {
  $(".kt-selectpicker").selectpicker();
  
  iniciarPqrs("#PQRS");
  iniciarComentarios("#comentarios");
  iniciarPedido("#ventas");

  $(document).on("change", "select#selectAños", function () {
    if (this.value) {
      cargarGraficos(this.value);
    }
  });
}

const cargarGraficos = (ano) => {
  const rutaRefrescar = route("graficos.refrescar", { 'ano': ano });

  generalidades.mostrarCargando('body');
    generalidades.refrescarSeccion(null, rutaRefrescar, '#seccionRefrescar', function (response) {
        if (response.estado == 'success') {
          window.pqrs = response.pqrs;
          window.pedidos = response.pedidos;
          window.comentarios = response.comentarios;
          iniciarPqrs("#PQRS");
          iniciarComentarios("#comentarios");
          iniciarPedido("#ventas");
        }
        generalidades.ocultarCargando('body');
    });
}

const iniciarComentarios = (elemento) => {
  let comentarios = window.comentarios;
    var options = {
        series: [comentarios.unaEstrella, comentarios.dosEstrellas, comentarios.tresEstrellas, comentarios.cuatroEstrellas, comentarios.cincoEstrellas],
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

      var chart = new ApexCharts(document.querySelector(elemento), options);
      chart.render();
}

const iniciarPqrs = (elemento) => {
  let pqrs = window.pqrs;
    var options = {
        series: [{
        name: 'Porcentaje',
        data: [pqrs.peticiones, pqrs.quejas, pqrs.reclamos, pqrs.sugerencias]
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
          return generalidades.formatoDinero(val);
        },
        offsetY: -20,
        style: {
          fontSize: '12px',
          colors: ["#304758"]
        }
      },
      
      xaxis: {
        categories: ["Peticiones", "Quejas", "Reclamos", "Sugerencias"],
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
            return generalidades.formatoDinero(val);
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

      var chart = new ApexCharts(document.querySelector(elemento), options);
      chart.render();
}

const iniciarPedido = (elemento) => {
  let pedidos = window.pedidos;
  var options = {
    series: [{
      name: "Ventas por año",
      data: [pedidos.enero, pedidos.febrero, pedidos.marzo, pedidos.abril, pedidos.mayo, pedidos.junio, pedidos.julio, pedidos.agosto, pedidos.septiembre, pedidos.octubre, pedidos.noviembre, pedidos.diciembre]
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
            return val
          }
        }
      },
    ]
  },
  grid: {
    borderColor: '#f1f1f1',
  }
  };

  var chart = new ApexCharts(document.querySelector(elemento), options);
  chart.render();
}