/*
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
  window.Popper = require('popper.js').default;
  window.$ = window.jQuery = require('jquery');

  require('bootstrap');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
} catch (e) {
  console.log(e);
}

// require('./scripts/main')
/*-------------------------------------
  Mobile Detect
  -------------------------------------*/
let isMobile = /iPhone|iPad|iPod|Android|BlackBerry|BB10|Silk|Mobi/i.test(self._navigator && self._navigator.userAgent);
let isTouch = !!(('ontouchend' in window) || (self._navigator && self._navigator.maxTouchPoints > 0) || (self._navigator && self._navigator.msMaxTouchPoints > 0));

/*-------------------------------------
  Page Preloader
  -------------------------------------*/
$("#preloader").fadeOut("slow", () => {
  $(this).remove();
});
/*-------------------------------------
  Offcanvas Menu activation code
  -------------------------------------*/
$('#wrapper').on('click', '.offcanvas-menu-btn', e => {
  e.preventDefault();
  const removeOffcanvas = () => {
    wrapper.removeClass('open').find('> .offcanvas-mask').remove();
    $this.removeClass('menu-status-close').addClass('menu-status-open');
    if (position === 'left') {
      offCancas.css({
        'transform': 'translateX(-100%)'
      });
    } else {
      offCancas.css({
        'transform': 'translateX(100%)'
      });
    }
  }

  let $this = $(this),
    wrapper = $(this).parents('body').find('>#wrapper'),
    wrapMask = $('<div />').addClass('offcanvas-mask'),
    offCancas = $('#offcanvas-wrap'),
    position = offCancas.data('position') || 'left';

  if ($this.hasClass('menu-status-open')) {
    wrapper.addClass('open').append(wrapMask);
    $this.removeClass('menu-status-open').addClass('menu-status-close');
    offCancas.css({
      'transform': 'translateX(0)'
    });
  } else {
    removeOffcanvas();
  }

  $(".offcanvas-mask, .offcanvas-close").on('click', () => {
    removeOffcanvas();
  });

  return false;
});
/*-------------------------------------
  On Scroll
  -------------------------------------*/
$(window).on('scroll', () => {

  // Back Top Button
  if ($(window).scrollTop() > 700) {
    $('.scrollup').addClass('back-top');
  } else {
    $('.scrollup').removeClass('back-top');
  }
  if ($('body').hasClass('sticky-header')) {
    let stickyPlaceHolder = $("#rt-sticky-placeholder"),
      menu = $("#header-menu"),
      menuH = menu.outerHeight(),
      topHeaderH = $('#header-topbar').outerHeight() || 0,
      middleHeaderH = $('#header-middlebar').outerHeight() || 0,
      targrtScroll = topHeaderH + middleHeaderH;
    if ($(window).scrollTop() > targrtScroll) {
      menu.addClass('rt-sticky');
      stickyPlaceHolder.height(menuH);
    } else {
      menu.removeClass('rt-sticky');
      stickyPlaceHolder.height(0);
    }
  }
});
/*---------------------------------------
  On Click Section Switch
  --------------------------------------- */
$('[data-type="section-switch"]').on('click', () => {
  if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
    let target = $(this.hash);
    if (target.length > 0) {

      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      $('html,body').animate({
        scrollTop: target.offset().top
      }, 1000);
      return false;
    }
  }
});
