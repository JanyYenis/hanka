/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/js/prueba/principal.js ***!
  \******************************************/
__webpack_require__.r(__webpack_exports__);
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'apexcharts'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());



$(function () {
  iniciarComponentes();
});
window.iniciarComponentes = function () {
  var form = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var options = {
    series: [44, 55, 13, 43, 22],
    chart: {
      width: 380,
      type: 'pie'
    },
    labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
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
  var chart = new Object(function webpackMissingModule() { var e = new Error("Cannot find module 'apexcharts'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())(document.querySelector("#chart"), options);
  chart.render();
};
/******/ })()
;