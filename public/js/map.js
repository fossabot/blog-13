/*! For license information please see map.js.LICENSE.txt */
(window.webpackJsonp=window.webpackJsonp||[]).push([[5],{1:function(o,n,i){o.exports=i("ZKpm")},ZKpm:function(o,n,i){var e=i("pwkN");window.initMap=function(){e().then((function(o){var n=new o.Map(document.getElementById("googleMap"),{center:{lat:-7.722641,lng:110.358278},zoom:17,styles:{featureType:"administrative.neighborhood",elementType:"geometry.stroke",stylers:[{visibility:"on"}]}}),i=new o.InfoWindow({content:"<div id='content'><div id='bodyContent'><p><i class='orion orion-mail'></i> <a href='official@oriontechno.co.id'>official@oriontechno.co.id</a></p><p><i class='orion orion-phone'></i> 0274 288 0937</p><p><i class='orion orion-map-marker'></i> Jln Merpati No.1 Jaban Tridadi Sleman Yogyakarta</p></div></div>",maxWidth:400}),e=new o.Marker({position:{lat:-7.722641,lng:110.358278},map:n,title:"Digital Agency / Software House"});i.open(n,e)})).catch((function(o){console.error(o)}))}},pwkN:function(o,n){const i="__googleMapsApiOnLoadCallback",e=["channel","client","key","language","region","v"];let t=null;o.exports=function(o={}){return t=t||new Promise((function(n,t){const a=setTimeout((function(){window[i]=function(){},t(new Error("Could not load the Google Maps API"))}),o.timeout||1e4);window[i]=function(){null!==a&&clearTimeout(a),n(window.google.maps),delete window[i]};const r=document.createElement("script"),l=["callback="+i];e.forEach((function(n){o[n]&&l.push(`${n}=${o[n]}`)})),o.libraries&&o.libraries.length&&l.push("libraries="+o.libraries.join(",")),r.src=`${o.apiUrl||"https://maps.googleapis.com/maps/api/js"}?${l.join("&")}`,document.body.appendChild(r)})),t}}},[[1,0]]]);
//# sourceMappingURL=map.js.map