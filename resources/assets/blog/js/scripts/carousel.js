/*
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/1/20, 3:53 AM
 *  @name          carousell.js
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */
'use strict';

import $ from 'jquery';
import 'owl.carousel';

/*-------------------------------------
    Carousel slider initiation
-------------------------------------*/
;(function($) {

  const methods = {
    init: function (params) {

      $('.rc-carousel').each(() => {
        let carousel = $(this),
          loop = carousel.data('loop'),
          items = carousel.data('items'),
          margin = carousel.data('margin'),
          stagePadding = carousel.data('stage-padding'),
          autoplay = carousel.data('autoplay'),
          autoplayTimeout = carousel.data('autoplay-timeout'),
          smartSpeed = carousel.data('smart-speed'),
          dots = carousel.data('dots'),
          nav = carousel.data('nav'),
          navSpeed = carousel.data('nav-speed'),
          rXsmall = carousel.data('r-x-small'),
          rXsmallNav = carousel.data('r-x-small-nav'),
          rXsmallDots = carousel.data('r-x-small-dots'),
          rXmedium = carousel.data('r-x-medium'),
          rXmediumNav = carousel.data('r-x-medium-nav'),
          rXmediumDots = carousel.data('r-x-medium-dots'),
          rSmall = carousel.data('r-small'),
          rSmallNav = carousel.data('r-small-nav'),
          rSmallDots = carousel.data('r-small-dots'),
          rMedium = carousel.data('r-medium'),
          rMediumNav = carousel.data('r-medium-nav'),
          rMediumDots = carousel.data('r-medium-dots'),
          rLarge = carousel.data('r-large'),
          rLargeNav = carousel.data('r-large-nav'),
          rLargeDots = carousel.data('r-large-dots'),
          rExtraLarge = carousel.data('r-extra-large'),
          rExtraLargeNav = carousel.data('r-extra-large-nav'),
          rExtraLargeDots = carousel.data('r-extra-large-dots'),
          center = carousel.data('center'),
          custom_nav = carousel.data('custom-nav') || '';
        carousel.addClass('owl-carousel');
        let owl = carousel.owlCarousel({
          loop: (!!loop),
          items: (items ? items : 4),
          lazyLoad: true,
          margin: (margin ? margin : 0),
          autoplay: !!autoplay,
          autoplayTimeout: (autoplayTimeout ? autoplayTimeout : 1000),
          smartSpeed: (smartSpeed ? smartSpeed : 250),
          dots: !!dots,
          nav: !!nav,
          navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
          ],
          navSpeed: !!navSpeed,
          center: !!center,
          responsiveClass: true,
          responsive: {
            0: {
              items: (rXsmall ? rXsmall : 1),
              nav: (!!rXsmallNav),
              dots: (!!rXsmallDots)
            },
            576: {
              items: (rXmedium ? rXmedium : 2),
              nav: (!!rXmediumNav),
              dots: (!!rXmediumDots)
            },
            768: {
              items: (rSmall ? rSmall : 3),
              nav: (!!rSmallNav),
              dots: (!!rSmallDots)
            },
            992: {
              items: (rMedium ? rMedium : 4),
              nav: (!!rMediumNav),
              dots: (!!rMediumDots)
            },
            1200: {
              items: (rLarge ? rLarge : 5),
              nav: (!!rLargeNav),
              dots: (!!rLargeDots)
            },
            1400: {
              items: (rExtraLarge ? rExtraLarge : 6),
              nav: (!!rExtraLargeNav),
              dots: (!!rExtraLargeDots)
            }
          }
        });
        if (custom_nav) {
          let nav = $(custom_nav),
            nav_next = $('.rt-next', nav),
            nav_prev = $('.rt-prev', nav);

          nav_next.on('click', e => {
            e.preventDefault();
            owl.trigger('next.owl.carousel');
            return false;
          });

          nav_prev.on('click', e => {
            e.preventDefault();
            owl.trigger('prev.owl.carousel');
            return false;
          });
        }
      });

    }
  }


})(jQuery);

