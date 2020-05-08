(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/script"],{

/***/ "./node_modules/jquery.easing/jquery.easing.js":
/*!*****************************************************!*\
  !*** ./node_modules/jquery.easing/jquery.easing.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*
 * jQuery Easing v1.4.1 - http://gsgd.co.uk/sandbox/jquery/easing/
 * Open source under the BSD License.
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * https://raw.github.com/gdsmith/jquery-easing/master/LICENSE
*/

(function (factory) {
	if (true) {
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")], __WEBPACK_AMD_DEFINE_RESULT__ = (function ($) {
			return factory($);
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
})(function($){

// Preserve the original jQuery "swing" easing as "jswing"
$.easing.jswing = $.easing.swing;

var pow = Math.pow,
	sqrt = Math.sqrt,
	sin = Math.sin,
	cos = Math.cos,
	PI = Math.PI,
	c1 = 1.70158,
	c2 = c1 * 1.525,
	c3 = c1 + 1,
	c4 = ( 2 * PI ) / 3,
	c5 = ( 2 * PI ) / 4.5;

// x is the fraction of animation progress, in the range 0..1
function bounceOut(x) {
	var n1 = 7.5625,
		d1 = 2.75;
	if ( x < 1/d1 ) {
		return n1*x*x;
	} else if ( x < 2/d1 ) {
		return n1*(x-=(1.5/d1))*x + 0.75;
	} else if ( x < 2.5/d1 ) {
		return n1*(x-=(2.25/d1))*x + 0.9375;
	} else {
		return n1*(x-=(2.625/d1))*x + 0.984375;
	}
}

$.extend( $.easing,
{
	def: 'easeOutQuad',
	swing: function (x) {
		return $.easing[$.easing.def](x);
	},
	easeInQuad: function (x) {
		return x * x;
	},
	easeOutQuad: function (x) {
		return 1 - ( 1 - x ) * ( 1 - x );
	},
	easeInOutQuad: function (x) {
		return x < 0.5 ?
			2 * x * x :
			1 - pow( -2 * x + 2, 2 ) / 2;
	},
	easeInCubic: function (x) {
		return x * x * x;
	},
	easeOutCubic: function (x) {
		return 1 - pow( 1 - x, 3 );
	},
	easeInOutCubic: function (x) {
		return x < 0.5 ?
			4 * x * x * x :
			1 - pow( -2 * x + 2, 3 ) / 2;
	},
	easeInQuart: function (x) {
		return x * x * x * x;
	},
	easeOutQuart: function (x) {
		return 1 - pow( 1 - x, 4 );
	},
	easeInOutQuart: function (x) {
		return x < 0.5 ?
			8 * x * x * x * x :
			1 - pow( -2 * x + 2, 4 ) / 2;
	},
	easeInQuint: function (x) {
		return x * x * x * x * x;
	},
	easeOutQuint: function (x) {
		return 1 - pow( 1 - x, 5 );
	},
	easeInOutQuint: function (x) {
		return x < 0.5 ?
			16 * x * x * x * x * x :
			1 - pow( -2 * x + 2, 5 ) / 2;
	},
	easeInSine: function (x) {
		return 1 - cos( x * PI/2 );
	},
	easeOutSine: function (x) {
		return sin( x * PI/2 );
	},
	easeInOutSine: function (x) {
		return -( cos( PI * x ) - 1 ) / 2;
	},
	easeInExpo: function (x) {
		return x === 0 ? 0 : pow( 2, 10 * x - 10 );
	},
	easeOutExpo: function (x) {
		return x === 1 ? 1 : 1 - pow( 2, -10 * x );
	},
	easeInOutExpo: function (x) {
		return x === 0 ? 0 : x === 1 ? 1 : x < 0.5 ?
			pow( 2, 20 * x - 10 ) / 2 :
			( 2 - pow( 2, -20 * x + 10 ) ) / 2;
	},
	easeInCirc: function (x) {
		return 1 - sqrt( 1 - pow( x, 2 ) );
	},
	easeOutCirc: function (x) {
		return sqrt( 1 - pow( x - 1, 2 ) );
	},
	easeInOutCirc: function (x) {
		return x < 0.5 ?
			( 1 - sqrt( 1 - pow( 2 * x, 2 ) ) ) / 2 :
			( sqrt( 1 - pow( -2 * x + 2, 2 ) ) + 1 ) / 2;
	},
	easeInElastic: function (x) {
		return x === 0 ? 0 : x === 1 ? 1 :
			-pow( 2, 10 * x - 10 ) * sin( ( x * 10 - 10.75 ) * c4 );
	},
	easeOutElastic: function (x) {
		return x === 0 ? 0 : x === 1 ? 1 :
			pow( 2, -10 * x ) * sin( ( x * 10 - 0.75 ) * c4 ) + 1;
	},
	easeInOutElastic: function (x) {
		return x === 0 ? 0 : x === 1 ? 1 : x < 0.5 ?
			-( pow( 2, 20 * x - 10 ) * sin( ( 20 * x - 11.125 ) * c5 )) / 2 :
			pow( 2, -20 * x + 10 ) * sin( ( 20 * x - 11.125 ) * c5 ) / 2 + 1;
	},
	easeInBack: function (x) {
		return c3 * x * x * x - c1 * x * x;
	},
	easeOutBack: function (x) {
		return 1 + c3 * pow( x - 1, 3 ) + c1 * pow( x - 1, 2 );
	},
	easeInOutBack: function (x) {
		return x < 0.5 ?
			( pow( 2 * x, 2 ) * ( ( c2 + 1 ) * 2 * x - c2 ) ) / 2 :
			( pow( 2 * x - 2, 2 ) *( ( c2 + 1 ) * ( x * 2 - 2 ) + c2 ) + 2 ) / 2;
	},
	easeInBounce: function (x) {
		return 1 - bounceOut( 1 - x );
	},
	easeOutBounce: bounceOut,
	easeInOutBounce: function (x) {
		return x < 0.5 ?
			( 1 - bounceOut( 1 - 2 * x ) ) / 2 :
			( 1 + bounceOut( 2 * x - 1 ) ) / 2;
	}
});

});


/***/ }),

/***/ "./node_modules/jquery.smoothscroll/src/apply.js":
/*!*******************************************************!*\
  !*** ./node_modules/jquery.smoothscroll/src/apply.js ***!
  \*******************************************************/
/*! exports provided: apply */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "apply", function() { return apply; });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);


function apply(params = {}) {
  const defaults = {
    target  : undefined,
    duration: 1000,
    easing  : 'easeOutQuint',
    offset  : 0,
    hash    : true,
  };

  const settings = jquery__WEBPACK_IMPORTED_MODULE_0___default.a.extend(defaults, params);

  const targetPermalink   = settings.currentTarget.href.split('#')[0];
  const locationPermalink = window.location.href.split('#')[0];

  if (targetPermalink !== locationPermalink) {
    return true;
  }

  const getTargetBody = () => {
    const wst = jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).scrollTop();
    if (0 === wst) {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).scrollTop(wst + 1);
    }

    if (0 < jquery__WEBPACK_IMPORTED_MODULE_0___default()('html').scrollTop()) {
      return jquery__WEBPACK_IMPORTED_MODULE_0___default()('html');
    }

    if (0 < jquery__WEBPACK_IMPORTED_MODULE_0___default()('body').scrollTop()) {
      return jquery__WEBPACK_IMPORTED_MODULE_0___default()('body');
    }
  };

  const body = getTargetBody();
  if (! body) {
    return;
  }

  const targetHash = settings.currentTarget.hash.split('%').join('\\%').split('(').join('\\(').split(')').join('\\)');
  const offset     = jquery__WEBPACK_IMPORTED_MODULE_0___default()(targetHash).eq(0).offset();

  if (! targetHash || ! offset) {
    return
  }

  const scroll = () => {
    const scrollOffset = 'function' === typeof settings.offset
      ? settings.offset()
      : settings.offset;

    body.animate(
      {
        scrollTop: offset.top - scrollOffset
      },
      settings.duration,
      settings.easing,
      () => {
        if (true === settings.hash) {
          window.history.pushState('', '', targetHash);
        }
      }
    );
  };

  const disableMouseWheel = () => {
    if (window.addEventListener) {
      window.addEventListener('DOMMouseScroll', () => body.stop(true), false);
    }

    window.onmousewheel = document.onmousewheel = function() {
      body.stop(true);
    };
  };

  scroll();
  disableMouseWheel();
}


/***/ }),

/***/ "./node_modules/jquery.smoothscroll/src/jquery.smoothscroll.js":
/*!*********************************************************************!*\
  !*** ./node_modules/jquery.smoothscroll/src/jquery.smoothscroll.js ***!
  \*********************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _apply__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./apply */ "./node_modules/jquery.smoothscroll/src/apply.js");
/**
 * Name: jquery.smoothscroll
 * Author: Takashi Kitajima (inc2734)
 * Author URI: https://2inc.org
 * License: MIT
 *
 * easing: http://gsgd.co.uk/sandbox/jquery/easing/
 * @param { duration, easing, offset, hash)
 */






;(function($) {
  const methods = {
    init: function(params) {
      $(document).on(
        'click.SmoothScroll',
        params.target,
        (event) => {
          event.preventDefault();

          params.currentTarget = event.currentTarget;
          Object(_apply__WEBPACK_IMPORTED_MODULE_1__["apply"])(params);
        }
      );
      return this;
    },

    off: function(params) {
      $(document).off('click.SmoothScroll', params.target);
      return this;
    }
  }

  $.fn.SmoothScroll = function(method) {
    if (methods[method]) {
      return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
    } else if (typeof method === 'object' || ! method) {
      return methods.init.apply(this, arguments);
    } else {
      $.error('Method ' +  method + ' does not exist');
    }
  };
})(jQuery);


/***/ }),

/***/ "./node_modules/webpack/buildin/global.js":
/*!***********************************!*\
  !*** (webpack)/buildin/global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || new Function("return this")();
} catch (e) {
	// This works if the window reference is available
	if (typeof window === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),

/***/ "./resources/assets/admin/sass/admin.scss":
/*!************************************************!*\
  !*** ./resources/assets/admin/sass/admin.scss ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/admin/sass/editor.scss":
/*!*************************************************!*\
  !*** ./resources/assets/admin/sass/editor.scss ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/blogxer/js/script.js":
/*!***********************************************!*\
  !*** ./resources/assets/blogxer/js/script.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

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
  window.Popper = __webpack_require__(/*! popper.js */ "./node_modules/popper.js/dist/esm/popper.js")["default"];
  window.$ = window.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

  __webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.js");

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
} catch (e) {
  console.log(e);
}

__webpack_require__(/*! ./scripts/main */ "./resources/assets/blogxer/js/scripts/main.js");

/***/ }),

/***/ "./resources/assets/blogxer/js/scripts/jquery.meanmenu.js":
/*!****************************************************************!*\
  !*** ./resources/assets/blogxer/js/scripts/jquery.meanmenu.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*!
* jQuery meanMenu v2.0.8
* @Copyright (C) 2012-2014 Chris Wharton @ MeanThemes (https://github.com/meanthemes/meanMenu)
*
*/

/*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* THIS SOFTWARE AND DOCUMENTATION IS PROVIDED "AS IS," AND COPYRIGHT
* HOLDERS MAKE NO REPRESENTATIONS OR WARRANTIES, EXPRESS OR IMPLIED,
* INCLUDING BUT NOT LIMITED TO, WARRANTIES OF MERCHANTABILITY OR
* FITNESS FOR ANY PARTICULAR PURPOSE OR THAT THE USE OF THE SOFTWARE
* OR DOCUMENTATION WILL NOT INFRINGE ANY THIRD PARTY PATENTS,
* COPYRIGHTS, TRADEMARKS OR OTHER RIGHTS.COPYRIGHT HOLDERS WILL NOT
* BE LIABLE FOR ANY DIRECT, INDIRECT, SPECIAL OR CONSEQUENTIAL
* DAMAGES ARISING OUT OF ANY USE OF THE SOFTWARE OR DOCUMENTATION.
*
* You should have received a copy of the GNU General Public License
* along with this program. If not, see <http://gnu.org/licenses/>.
*
* Find more information at http://www.meanthemes.com/plugins/meanmenu/
*
*/
(function ($) {
  "use strict";

  $.fn.meanmenu = function (options) {
    var defaults = {
      meanMenuTarget: jQuery(this),
      // Target the current HTML markup you wish to replace
      meanMenuContainer: 'body',
      // Choose where meanmenu will be placed within the HTML
      meanMenuClose: "X",
      // single character you want to represent the close menu button
      meanMenuCloseSize: "18px",
      // set font size of close button
      meanMenuOpen: "<span /><span /><span />",
      // text/markup you want when menu is closed
      meanRevealPosition: "right",
      // left right or center positions
      meanRevealPositionDistance: "0",
      // Tweak the position of the menu
      meanRevealColour: "",
      // override CSS colours for the reveal background
      meanScreenWidth: "480",
      // set the screen width you want meanmenu to kick in at
      meanNavPush: "",
      // set a height here in px, em or % if you want to budge your layout now the navigation is missing.
      meanShowChildren: true,
      // true to show children in the menu, false to hide them
      meanExpandableChildren: true,
      // true to allow expand/collapse children
      meanExpand: "+",
      // single character you want to represent the expand for ULs
      meanContract: "-",
      // single character you want to represent the contract for ULs
      meanRemoveAttrs: false,
      // true to remove classes and IDs, false to keep them
      onePage: false,
      // set to true for one page sites
      meanDisplay: "block",
      // override display method for table cell based layouts e.g. table-cell
      removeElements: "" // set to hide page elements

    };
    options = $.extend(defaults, options); // get browser width

    var currentWidth = window.innerWidth || document.documentElement.clientWidth;
    return this.each(function () {
      var meanMenu = options.meanMenuTarget;
      var meanContainer = options.meanMenuContainer;
      var meanMenuClose = options.meanMenuClose;
      var meanMenuCloseSize = options.meanMenuCloseSize;
      var meanMenuOpen = options.meanMenuOpen;
      var meanRevealPosition = options.meanRevealPosition;
      var meanRevealPositionDistance = options.meanRevealPositionDistance;
      var meanRevealColour = options.meanRevealColour;
      var meanScreenWidth = options.meanScreenWidth;
      var meanNavPush = options.meanNavPush;
      var meanRevealClass = ".meanmenu-reveal";
      var meanShowChildren = options.meanShowChildren;
      var meanExpandableChildren = options.meanExpandableChildren;
      var meanExpand = options.meanExpand;
      var meanContract = options.meanContract;
      var meanRemoveAttrs = options.meanRemoveAttrs;
      var onePage = options.onePage;
      var meanDisplay = options.meanDisplay;
      var removeElements = options.removeElements; //detect known mobile/tablet usage

      var isMobile = false;

      if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/Blackberry/i) || navigator.userAgent.match(/Windows Phone/i)) {
        isMobile = true;
      }

      if (navigator.userAgent.match(/MSIE 8/i) || navigator.userAgent.match(/MSIE 7/i)) {
        // add scrollbar for IE7 & 8 to stop breaking resize function on small content sites
        jQuery('html').css("overflow-y", "scroll");
      }

      var meanRevealPos = "";

      var meanCentered = function meanCentered() {
        if (meanRevealPosition === "center") {
          var newWidth = window.innerWidth || document.documentElement.clientWidth;
          var meanCenter = newWidth / 2 - 22 + "px";
          meanRevealPos = "left:" + meanCenter + ";right:auto;";

          if (!isMobile) {
            jQuery('.meanmenu-reveal').css("left", meanCenter);
          } else {
            jQuery('.meanmenu-reveal').animate({
              left: meanCenter
            });
          }
        }
      };

      var menuOn = false;
      var meanMenuExist = false;

      if (meanRevealPosition === "right") {
        meanRevealPos = "right:" + meanRevealPositionDistance + ";left:auto;";
      }

      if (meanRevealPosition === "left") {
        meanRevealPos = "left:" + meanRevealPositionDistance + ";right:auto;";
      } // run center function


      meanCentered(); // set all styles for mean-reveal

      var $navreveal = "";

      var meanInner = function meanInner() {
        // get last class name
        if (jQuery($navreveal).is(".meanmenu-reveal.meanclose")) {
          $navreveal.html(meanMenuClose);
        } else {
          $navreveal.html(meanMenuOpen);
        }
      }; // re-instate original nav (and call this on window.width functions)


      var meanOriginal = function meanOriginal() {
        jQuery('.mean-bar,.mean-push').remove();
        jQuery(meanContainer).removeClass("mean-container");
        jQuery(meanMenu).css('display', meanDisplay);
        menuOn = false;
        meanMenuExist = false;
        jQuery(removeElements).removeClass('mean-remove');
      }; // navigation reveal


      var showMeanMenu = function showMeanMenu() {
        var meanStyles = "background:" + meanRevealColour + ";color:" + meanRevealColour + ";" + meanRevealPos;

        if (currentWidth <= meanScreenWidth) {
          jQuery(removeElements).addClass('mean-remove');
          meanMenuExist = true; // add class to body so we don't need to worry about media queries here, all CSS is wrapped in '.mean-container'

          jQuery(meanContainer).addClass("mean-container");
          jQuery('.mean-container').prepend('<div class="mean-bar"><a href="#nav" class="meanmenu-reveal" style="' + meanStyles + '">Show Navigation</a><nav class="mean-nav"></nav></div>'); //push meanMenu navigation into .mean-nav

          var meanMenuContents = jQuery(meanMenu).html();
          jQuery('.mean-nav').html(meanMenuContents); // remove all classes from EVERYTHING inside meanmenu nav

          if (meanRemoveAttrs) {
            jQuery('nav.mean-nav ul, nav.mean-nav ul *').each(function () {
              // First check if this has mean-remove class
              if (jQuery(this).is('.mean-remove')) {
                jQuery(this).attr('class', 'mean-remove');
              } else {
                jQuery(this).removeAttr("class");
              }

              jQuery(this).removeAttr("id");
            });
          } // push in a holder div (this can be used if removal of nav is causing layout issues)


          jQuery(meanMenu).before('<div class="mean-push" />');
          jQuery('.mean-push').css("margin-top", meanNavPush); // hide current navigation and reveal mean nav link

          jQuery(meanMenu).hide();
          jQuery(".meanmenu-reveal").show(); // turn 'X' on or off

          jQuery(meanRevealClass).html(meanMenuOpen);
          $navreveal = jQuery(meanRevealClass); //hide mean-nav ul

          jQuery('.mean-nav ul').hide(); // hide sub nav

          if (meanShowChildren) {
            // allow expandable sub nav(s)
            if (meanExpandableChildren) {
              jQuery('.mean-nav ul ul').each(function () {
                if (jQuery(this).children().length) {
                  jQuery(this, 'li:first').parent().append('<a class="mean-expand" href="#" style="font-size: ' + meanMenuCloseSize + '">' + meanExpand + '</a>');
                }
              });
              jQuery('.mean-expand').on("click", function (e) {
                e.preventDefault();

                if (jQuery(this).hasClass("mean-clicked")) {
                  jQuery(this).text(meanExpand);
                  jQuery(this).prev('ul').slideUp(300, function () {});
                } else {
                  jQuery(this).text(meanContract);
                  jQuery(this).prev('ul').slideDown(300, function () {});
                }

                jQuery(this).toggleClass("mean-clicked");
              });
            } else {
              jQuery('.mean-nav ul ul').show();
            }
          } else {
            jQuery('.mean-nav ul ul').hide();
          } // add last class to tidy up borders


          jQuery('.mean-nav ul li').last().addClass('mean-last');
          $navreveal.removeClass("meanclose");
          jQuery($navreveal).click(function (e) {
            e.preventDefault();

            if (menuOn === false) {
              $navreveal.css("text-align", "center");
              $navreveal.css("text-indent", "0");
              $navreveal.css("font-size", meanMenuCloseSize);
              jQuery('.mean-nav ul:first').slideDown();
              menuOn = true;
            } else {
              jQuery('.mean-nav ul:first').slideUp();
              menuOn = false;
            }

            $navreveal.toggleClass("meanclose");
            meanInner();
            jQuery(removeElements).addClass('mean-remove');
          }); // for one page websites, reset all variables...

          if (onePage) {
            jQuery('.mean-nav ul > li > a:first-child').on("click", function () {
              jQuery('.mean-nav ul:first').slideUp();
              menuOn = false;
              jQuery($navreveal).toggleClass("meanclose").html(meanMenuOpen);
            });
          }
        } else {
          meanOriginal();
        }
      };

      if (!isMobile) {
        // reset menu on resize above meanScreenWidth
        jQuery(window).resize(function () {
          currentWidth = window.innerWidth || document.documentElement.clientWidth;

          if (currentWidth > meanScreenWidth) {
            meanOriginal();
          } else {
            meanOriginal();
          }

          if (currentWidth <= meanScreenWidth) {
            showMeanMenu();
            meanCentered();
          } else {
            meanOriginal();
          }
        });
      }

      jQuery(window).resize(function () {
        // get browser width
        currentWidth = window.innerWidth || document.documentElement.clientWidth;

        if (!isMobile) {
          meanOriginal();

          if (currentWidth <= meanScreenWidth) {
            showMeanMenu();
            meanCentered();
          }
        } else {
          meanCentered();

          if (currentWidth <= meanScreenWidth) {
            if (meanMenuExist === false) {
              showMeanMenu();
            }
          } else {
            meanOriginal();
          }
        }
      }); // run main menuMenu function on load

      showMeanMenu();
    });
  };
})(jQuery);

/***/ }),

/***/ "./resources/assets/blogxer/js/scripts/main.js":
/*!*****************************************************!*\
  !*** ./resources/assets/blogxer/js/scripts/main.js ***!
  \*****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var jquery_smoothscroll__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! jquery.smoothscroll */ "./node_modules/jquery.smoothscroll/src/jquery.smoothscroll.js");
/* harmony import */ var _jquery_meanmenu__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./jquery.meanmenu */ "./resources/assets/blogxer/js/scripts/jquery.meanmenu.js");
/* harmony import */ var _jquery_meanmenu__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_jquery_meanmenu__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var jquery_easing__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! jquery.easing */ "./node_modules/jquery.easing/jquery.easing.js");
/* harmony import */ var jquery_easing__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(jquery_easing__WEBPACK_IMPORTED_MODULE_3__);
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







(function ($) {
  var _this = this;

  /*-------------------------------------
  Mobile Detect
  -------------------------------------*/
  var isMobile = /iPhone|iPad|iPod|Android|BlackBerry|BB10|Silk|Mobi/i.test(self._navigator && self._navigator.userAgent);
  var isTouch = !!('ontouchend' in window || self._navigator && self._navigator.maxTouchPoints > 0 || self._navigator && self._navigator.msMaxTouchPoints > 0);
  /*-------------------------------------
  Background Rain
  -------------------------------------*/

  var pageRain = $('#page-rain');

  if (pageRain.length && !isMobile && !isTouch) {
    var image = pageRain[0];

    image.onload = function () {
      var engine = new RainyDay({
        image: this,
        parentElement: $('.comingsoon-back-img')[0]
      });
      engine.rain([[1, 2, 5000]]); // add 4000 drops of size from 1 - 2

      engine.rain([[3, 3, 1], [5, 5, 1], [6, 2, 1], [6, 2, 1], [5, 5, 1]], 100); // every 100ms
    };

    image.crossOrigin = 'anonymous';
    image.src = pageRain.attr('src');
  }
  /*-------------------------------------
  Countdown activation code
  -------------------------------------*/


  var eventCounter = $('.countdown');

  if (eventCounter.length) {
    eventCounter.countdown('2019/10/21', function (e) {
      $(this).html(e.strftime("<div class='countdown-section'><div><div class='countdown-number'>%D</div> <div class='countdown-unit'>Day%!D</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%H</div> <div class='countdown-unit'>Hour%!H</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%M</div> <div class='countdown-unit'>Minutes</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%S</div> <div class='countdown-unit'>Second</div> </div></div>"));
    });
  }
  /*-------------------------------------
  Counter
  -------------------------------------*/


  var counterContainer = $('.counter');

  if (counterContainer.length) {
    counterContainer.counterUp({
      delay: 50,
      time: 2000
    });
  }
  /*-------------------------------------
      Theia Side Bar
  -------------------------------------*/


  if (typeof $.fn.theiaStickySidebar !== "undefined") {
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


  $('#wrapper').on('click', '.offcanvas-menu-btn', function (e) {
    e.preventDefault();
    var $this = $(_this),
        wrapper = $(_this).parents('body').find('>#wrapper'),
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

    var removeOffcanvas = function removeOffcanvas() {
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
    };

    $(".offcanvas-mask, .offcanvas-close").on('click', function () {
      removeOffcanvas();
    });
    return false;
  });
  /*-------------------------------------
  On Scroll
  -------------------------------------*/

  $(window).on('scroll', function () {
    // Back Top Button
    if ($(window).scrollTop() > 700) {
      $('.scrollup').addClass('back-top');
    } else {
      $('.scrollup').removeClass('back-top');
    }

    if ($('body').hasClass('sticky-header')) {
      var stickyPlaceHolder = $("#rt-sticky-placeholder"),
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

  $('[data-type="section-switch"]').on('click', function () {
    if (location.pathname.replace(/^\//, '') === _this.pathname.replace(/^\//, '') && location.hostname === _this.hostname) {
      var target = $(_this.hash);

      if (target.length > 0) {
        target = target.length ? target : $('[name=' + _this.hash.slice(1) + ']');
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

  $('a[href="#header-search"]').on("click", function (event) {
    event.preventDefault();
    var target = $("#header-search");
    target.addClass("open");
    setTimeout(function () {
      target.find('input').focus();
    }, 600);
    return false;
  });
  $("#header-search, #header-search button.close").on("click keyup", function (event) {
    if (event.target === _this || event.target.className === "close" || event.keyCode === 27) {
      $(_this).removeClass("open");
    }
  });
  /*-------------------------------------
  Section background image
  -------------------------------------*/

  $("[data-bg-image]").each(function () {
    var img = $(_this).data("bg-image");
    $(_this).css({
      backgroundImage: "url(" + img + ")"
    });
  });
  /*-------------------------------------
  Page Preloader
  -------------------------------------*/

  $("#preloader").fadeOut("slow", function () {
    $(_this).remove();
  });
  /*-------------------------------------
  Masonry
  -------------------------------------*/

  var galleryIsoContainer = $("#no-equal-gallery");

  if (galleryIsoContainer.length) {
    var blogGallerIso = galleryIsoContainer.imagesLoaded(function () {
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
    var yPopup = $(".popup-youtube");

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
      window.onload = function () {
        var styles = [{
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
        var options = {
          mapTypeControlOptions: {
            mapTypeIds: ['Styled']
          },
          center: new google.maps.LatLng(-37.81618, 144.95692),
          zoom: 10,
          disableDefaultUI: true,
          mapTypeId: 'Styled'
        };
        var div = document.getElementById('googleMap');
        var map = new google.maps.Map(div, options);
        var styledMapType = new google.maps.StyledMapType(styles, {
          name: 'Styled'
        });
        map.mapTypes.set('Styled', styledMapType);
        var marker = new google.maps.Marker({
          position: map.getCenter(),
          animation: google.maps.Animation.BOUNCE,
          icon: 'img/map-marker.png',
          map: map
        });
      };
    }
  });
})(jQuery);

/***/ }),

/***/ "./resources/assets/blogxer/sass/carousel.scss":
/*!*****************************************************!*\
  !*** ./resources/assets/blogxer/sass/carousel.scss ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/blogxer/sass/style.scss":
/*!**************************************************!*\
  !*** ./resources/assets/blogxer/sass/style.scss ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./resources/assets/blogxer/js/script.js ./resources/assets/blogxer/sass/style.scss ./resources/assets/blogxer/sass/carousel.scss ./resources/assets/admin/sass/admin.scss ./resources/assets/admin/sass/editor.scss ***!
  \*********************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\laragon\www\blog\resources\assets\blogxer\js\script.js */"./resources/assets/blogxer/js/script.js");
__webpack_require__(/*! C:\laragon\www\blog\resources\assets\blogxer\sass\style.scss */"./resources/assets/blogxer/sass/style.scss");
__webpack_require__(/*! C:\laragon\www\blog\resources\assets\blogxer\sass\carousel.scss */"./resources/assets/blogxer/sass/carousel.scss");
__webpack_require__(/*! C:\laragon\www\blog\resources\assets\admin\sass\admin.scss */"./resources/assets/admin/sass/admin.scss");
module.exports = __webpack_require__(/*! C:\laragon\www\blog\resources\assets\admin\sass\editor.scss */"./resources/assets/admin/sass/editor.scss");


/***/ })

},[[0,"/js/manifest","/js/vendor"]]]);
//# sourceMappingURL=script.js.map