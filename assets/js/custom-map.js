$(function(){
  'use strict';

  var mapMarker = new GMaps({
    el: '#map2',
    lat: 13.070021,
    lng: 80.264069,
    zoom: 13.91
  });

  mapMarker.addMarker({
    lat: 13.070021,
    lng: 80.264069,
    title: 'Themepixels',
    click: function(e) {
      alert('Collector details');
    }
  });

});