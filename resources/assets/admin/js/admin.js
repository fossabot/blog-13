/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
  window.Popper = require('popper.js').default;
  window.$ = window.jQuery = require('jquery');

  window.Vue = require('vue');

  require('bootstrap');
  require('./AdminLTE');


  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
} catch (e) {
  console.log(e);
}

$(document).on('hidden.bs.modal', '.modal', function () {
  $('.modal:visible').length && $(document.body).addClass('modal-open');
});
