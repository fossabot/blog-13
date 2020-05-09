/*
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/1/20, 3:15 AM
 *  @name          main.js
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

'use strict';

import 'jquery.smoothscroll';
import './jquery.meanmenu';
import 'jquery.easing';

(function ($) {

  /*-------------------------------------
  Mobile Detect
  -------------------------------------*/
  let isMobile = /iPhone|iPad|iPod|Android|BlackBerry|BB10|Silk|Mobi/i.test(self._navigator && self._navigator.userAgent);
  let isTouch = !!(('ontouchend' in window) || (self._navigator && self._navigator.maxTouchPoints > 0) || (self._navigator && self._navigator.msMaxTouchPoints > 0));

  /*-------------------------------------
  Background Rain
  -------------------------------------*/
  const pageRain = $('#page-rain');
  if (pageRain.length && !isMobile && !isTouch) {
    let image = pageRain[0];
    image.onload = function () {
      let engine = new RainyDay({
        image: this,
        parentElement: $('.comingsoon-back-img')[0]
      });
      engine.rain([
        [1, 2, 5000]
      ]); // add 4000 drops of size from 1 - 2
      engine.rain(
        [
          [3, 3, 1],
          [5, 5, 1],
          [6, 2, 1],
          [6, 2, 1],
          [5, 5, 1]
        ],
        100); // every 100ms
    };
    image.crossOrigin = 'anonymous';
    image.src = pageRain.attr('src');
  }

  /*-------------------------------------
  Countdown activation code
  -------------------------------------*/
  const eventCounter = $('.countdown');
  if (eventCounter.length) {
    eventCounter.countdown('2019/10/21', function (e) {
      $(this).html(e.strftime("<div class='countdown-section'><div><div class='countdown-number'>%D</div> <div class='countdown-unit'>Day%!D</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%H</div> <div class='countdown-unit'>Hour%!H</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%M</div> <div class='countdown-unit'>Minutes</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%S</div> <div class='countdown-unit'>Second</div> </div></div>"))

    });
  }

  /*-------------------------------------
  Counter
  -------------------------------------*/
  const counterContainer = $('.counter');
  if (counterContainer.length) {
    counterContainer.counterUp({
      delay: 50,
      time: 2000
    });
  }

  /*-------------------------------------
      Theia Side Bar
  -------------------------------------*/
  if (typeof ($.fn.theiaStickySidebar) !== "undefined") {
    $('#fixed-bar-coloum').theiaStickySidebar({
      'additionalMarginTop': 50,
      'sidebarBehavior': 'stick-to-top'
    });
  }

  /*-------------------------------------
  MeanMenu activation code
  --------------------------------------*/
  if ($.fn.meanmenu) {
    $('nav#dropdown').meanmenu({
      siteLogo: "<div class='mobile-menu-nav-back'><a class='logo-mobile' href='index.html'><img src='img/logo-mobile.png' alt='logo' class='img-fluid'/></a></div>"
    });
  }

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

  /*-------------------------------------
  Jquery Serch Box
  -------------------------------------*/
  $('a[href="#header-search"]').on("click", event => {
    event.preventDefault();
    let target = $("#header-search");
    target.addClass("open");
    setTimeout(function () {
      target.find('input').focus();
    }, 600);
    return false;
  });

  $("#header-search, #header-search button.close").on("click keyup", event => {
    if (
      event.target === this ||
      event.target.className === "close" ||
      event.keyCode === 27
    ) {
      $(this).removeClass("open");
    }
  });

  /*-------------------------------------
  Section background image
  -------------------------------------*/
  $("[data-bg-image]").each( () => {
    let img = $(this).data("bg-image");
    $(this).css({
      backgroundImage: "url(" + img + ")"
    });
  });

  /*-------------------------------------
  Page Preloader
  -------------------------------------*/
  $("#preloader").fadeOut("slow", () => {
    $(this).remove();
  });

  /*-------------------------------------
  Masonry
  -------------------------------------*/
  let galleryIsoContainer = $("#no-equal-gallery");
  if (galleryIsoContainer.length) {
    let blogGallerIso = galleryIsoContainer.imagesLoaded( () => {
      blogGallerIso.isotope({
        itemSelector: ".no-equal-item",
        masonry: {
          columnWidth: ".no-equal-item"
        }
      });
    });
  }

  $(function () {

    /*-------------------------------------
    Video Popup
    -------------------------------------*/
    let yPopup = $(".popup-youtube");
    if (yPopup.length) {
      yPopup.magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
      });
    }



    /*-------------------------------------
    Google Map
    -------------------------------------*/
    if ($("#googleMap").length) {
      window.onload = () => {
        let styles = [{
          featureType: 'water',
          elementType: 'geometry.fill',
          stylers: [{
            color: '#b7d0ea'
          }]
        }, {
          featureType: 'road',
          elementType: 'labels.text.fill',
          stylers: [{
            visibility: 'off'
          }]
        }, {
          featureType: 'road',
          elementType: 'geometry.stroke',
          stylers: [{
            visibility: 'off'
          }]
        }, {
          featureType: 'road.highway',
          elementType: 'geometry',
          stylers: [{
            color: '#c2c2aa'
          }]
        }, {
          featureType: 'poi.park',
          elementType: 'geometry',
          stylers: [{
            color: '#b6d1b0'
          }]
        }, {
          featureType: 'poi.park',
          elementType: 'labels.text.fill',
          stylers: [{
            color: '#6b9a76'
          }]
        }];
        let options = {
          mapTypeControlOptions: {
            mapTypeIds: ['Styled']
          },
          center: new google.maps.LatLng(-37.81618, 144.95692),
          zoom: 10,
          disableDefaultUI: true,
          mapTypeId: 'Styled'
        };
        let div = document.getElementById('googleMap');
        let map = new google.maps.Map(div, options);
        let styledMapType = new google.maps.StyledMapType(styles, {
          name: 'Styled'
        });
        map.mapTypes.set('Styled', styledMapType);

        let marker = new google.maps.Marker({
          position: map.getCenter(),
          animation: google.maps.Animation.BOUNCE,
          icon: 'img/map-marker.png',
          map: map
        });
      };
    }
  });

})(jQuery);
