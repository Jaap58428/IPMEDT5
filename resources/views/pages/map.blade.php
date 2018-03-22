@extends('layouts.app')

@section('content')
  <h2 class="page-title">Kaart met prullenbakken</h2>
  <div id="map"></div>
  <script>
    var map;
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: new google.maps.LatLng({{$mapCenter['lat']}}, {{$mapCenter['lng']}}),
        mapTypeId: 'terrain',
        disableDefaultUI: true
      });

      var icons = {
        full_dump: {
          icon: '/groep_g/public/img/full.png'
        },
        empty_dump: {
          icon: '/groep_g/public/img/empty.png'
        },
      };

      @foreach ($coordinates as $coordinate)
        var marker{{$coordinate->id}} = new google.maps.Marker({
          position: new google.maps.LatLng({{$coordinate->latitude}}, {{$coordinate->longitude}}),
          @if ($coordinate->last_empty < $coordinate->last_full)
            icon: icons.full_dump.icon,
          @else
            icon: icons.empty_dump.icon,
          @endif
          map: map
        });
      @endforeach

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
