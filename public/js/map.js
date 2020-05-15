(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/map"],{

/***/ "./node_modules/load-google-maps-api/index.js":
/*!****************************************************!*\
  !*** ./node_modules/load-google-maps-api/index.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

const API_URL = 'https://maps.googleapis.com/maps/api/js'
const CALLBACK_NAME = '__googleMapsApiOnLoadCallback'

const optionsKeys = ['channel', 'client', 'key', 'language', 'region', 'v']

let promise = null

module.exports = function (options = {}) {
  promise =
    promise ||
    new Promise(function (resolve, reject) {
      // Reject the promise after a timeout
      const timeoutId = setTimeout(function () {
        window[CALLBACK_NAME] = function () {} // Set the on load callback to a no-op
        reject(new Error('Could not load the Google Maps API'))
      }, options.timeout || 10000)

      // Hook up the on load callback
      window[CALLBACK_NAME] = function () {
        if (timeoutId !== null) {
          clearTimeout(timeoutId)
        }
        resolve(window.google.maps)
        delete window[CALLBACK_NAME]
      }

      // Prepare the `script` tag to be inserted into the page
      const scriptElement = document.createElement('script')
      const params = [`callback=${CALLBACK_NAME}`]
      optionsKeys.forEach(function (key) {
        if (options[key]) {
          params.push(`${key}=${options[key]}`)
        }
      })
      if (options.libraries && options.libraries.length) {
        params.push(`libraries=${options.libraries.join(',')}`)
      }
      scriptElement.src = `${options.apiUrl || API_URL}?${params.join('&')}`

      // Insert the `script` tag
      document.body.appendChild(scriptElement)
    })
  return promise
}


/***/ }),

/***/ "./resources/assets/blog/js/scripts/map.js":
/*!*************************************************!*\
  !*** ./resources/assets/blog/js/scripts/map.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*!
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/9/20, 3:48 PM
 *  @name          googleMap.js
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */
var loadGoogleMapsApi = __webpack_require__(/*! load-google-maps-api */ "./node_modules/load-google-maps-api/index.js");

function initMap() {
  loadGoogleMapsApi().then(function (googleMaps) {
    // var map = new googleMaps.Map(document.getElementById("map"), mapOptions);
    var map = new googleMaps.Map(document.getElementById("googleMap"), {
      center: {
        lat: -7.722641,
        lng: 110.358278
      },
      zoom: 17,
      styles: {
        "featureType": "administrative.neighborhood",
        "elementType": "geometry.stroke",
        "stylers": [{
          "visibility": "on"
        }]
      }
    }); // var mapOptions = {
    // 	zoom: 17,
    // 	center: myLatLng,
    // 	styles: styleArray,
    // 	scrollwheel: false
    // };

    var myLatLng = {
      lat: -7.722641,
      lng: 110.358278
    }; // var styleArray = {
    // 	"featureType": "administrative.neighborhood",
    // 	"elementType": "geometry.stroke",
    // 	"stylers": [
    // 		{
    // 			"visibility": "on"
    // 		}
    // 	]
    // };

    var contentString = "<div id='content'>" + "<div id='bodyContent'>" + "<p><i class='orion orion-mail'></i> <a href='official@oriontechno.co.id'>official@oriontechno.co.id</a></p>" + "<p><i class='orion orion-phone'></i> 0274 288 0937</p>" + "<p><i class='orion orion-map-marker'></i> Jln Merpati No.1 Jaban Tridadi Sleman Yogyakarta</p>" + "</div>" + "</div>";
    var infowindow = new googleMaps.InfoWindow({
      content: contentString,
      maxWidth: 400
    });
    var marker = new googleMaps.Marker({
      position: myLatLng,
      map: map,
      // icon: image,
      title: "Digital Agency / Software House"
    });
    infowindow.open(map, marker);
  }).catch(function (error) {
    console.error(error);
  });
}

window.initMap = initMap;

/***/ }),

/***/ 1:
/*!*******************************************************!*\
  !*** multi ./resources/assets/blog/js/scripts/map.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\blog\resources\assets\blog\js\scripts\map.js */"./resources/assets/blog/js/scripts/map.js");


/***/ })

},[[1,"/js/manifest"]]]);
//# sourceMappingURL=map.js.map