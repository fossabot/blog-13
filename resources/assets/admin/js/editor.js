import * as $ from "jquery"
import 'select2'
import 'gijgo'


$(document).ready(function() {
  $('.select2').select2();
});

$('#publish_date').datepicker({
  uiLibrary: 'bootstrap4'
});

$('#publish_time').timepicker();


