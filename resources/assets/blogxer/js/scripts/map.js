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
const loadGoogleMapsApi = require("load-google-maps-api");

function initMap() {
  loadGoogleMapsApi().then(googleMaps => {
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
        "stylers": [
          {
            "visibility": "on"
          }
        ]
      }
    });

    // var mapOptions = {
    // 	zoom: 17,
    // 	center: myLatLng,
    // 	styles: styleArray,
    // 	scrollwheel: false
    // };

    var myLatLng = {lat: -7.722641, lng: 110.358278};

    // var styleArray = {
    // 	"featureType": "administrative.neighborhood",
    // 	"elementType": "geometry.stroke",
    // 	"stylers": [
    // 		{
    // 			"visibility": "on"
    // 		}
    // 	]
    // };


    var contentString =
      "<div id='content'>"+
      "<div id='bodyContent'>"+
      "<p><i class='orion orion-mail'></i> <a href='official@oriontechno.co.id'>official@oriontechno.co.id</a></p>" +
      "<p><i class='orion orion-phone'></i> 0274 288 0937</p>"+
      "<p><i class='orion orion-map-marker'></i> Jln Merpati No.1 Jaban Tridadi Sleman Yogyakarta</p>"+
      "</div>"+
      "</div>";

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
