import '../metronic/tools/webpack/vendors/global';
import '../metronic/tools/webpack/scripts';
import '../metronic/tools/webpack/vendors/custom/datatables';
import 'jquery-validation/dist/localization/messages_es.js';
import ApexCharts from 'apexcharts';
import Driver from 'driver.js';
import 'driver.js/dist/driver.min.css';
window.Driver = Driver;
import 'multiselect';
import "jquery.quicksearch";

window.intlTelInput = require("intl-tel-input");
import 'intl-tel-input/build/css/intlTelInput.css';

import '../../node_modules/intl-tel-input/build/js/utils.js';

require('./constantes');
require('./generalidades');
require('./bootstrap');