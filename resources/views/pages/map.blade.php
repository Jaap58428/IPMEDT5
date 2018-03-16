@extends('layouts.app')

@section('content')
  <h2>Kaart met prullenbakken</h2>
  <div id="map"></div>
  <script>
    var map;
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: new google.maps.LatLng(52.209868, 4.396633),
        mapTypeId: 'terrain',
        disableDefaultUI: true
      });

      // var script = document.createElement('script');
      // script.src = map.data.loadGeoJson('/home/getGeoJSON');
      // document.getElementsByTagName('head')[0].appendChild(script);
    }

    window.eqfeed_callback = function(results) {
      for (var i = 0; i < results.features.length; i++) {
        var coords = results.features[i].geometry.coordinates;
        var latLng = new google.maps.LatLng(coords[1],coords[0]);
        var marker = new google.maps.Marker({
          position: latLng,
          map: map
        });
      }
    }
  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH8tOny2YinK_sZe-vD2pMVacY8zh4YrA&callback=initMap">
  </script>
@endsection
