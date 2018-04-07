@extends('layouts.app')

@section('content')
  <h2 class="page-title">Kaart met prullenbakken</h2>
  <div id="map"></div>
  <div id="legend">
    <div>
      <img src="/img/empty.png" alt=""> Leeg
    </div>
    <div>
      <img src="/img/full.png" alt=""> Vol
    </div>
  </div>
  <script>
    var map;
    function initMap() {
      // Create the map variable
      var map = new google.maps.Map(document.getElementById('map'), {
        // set the user view, based of testing
        zoom: 14,
        center: new google.maps.LatLng({{$mapCenter['lat']}}, {{$mapCenter['lng']}}),
        mapTypeId: 'terrain',
        // disable UI so the user can scroll over the page
        // without the map instantly responding
        disableDefaultUI: true
      });

      // Put legend in the corner of the map
      map.controls[google.maps.ControlPosition.LEFT_TOP].push(document.getElementById('legend'));


      // Set the icons for full and empty
      var icons = {
        full_dump: {
          icon: '/img/full.png'
        },
        empty_dump: {
          icon: '/img/empty.png'
        },
      };

      // Loop over all the $coordinates
      // Every one will have a marker
      @foreach ($coordinates as $coordinate)
        window.setTimeout(function() {
          var marker{{$coordinate->id}} = new google.maps.Marker({
            position: new google.maps.LatLng({{$coordinate->latitude}}, {{$coordinate->longitude}}),
            label: '{{$coordinate->id}}',  // the marker will have an id identifier
            animation: google.maps.Animation.DROP,  // A fancy drop animation

            // Depending on the values of the coordinate it is now empty or full
            @if ($coordinate->last_empty < $coordinate->last_full)
              icon: icons.full_dump.icon,
            @else
              icon: icons.empty_dump.icon,
            @endif
            map: map  // assign the marker to the map
          });

          // Add a listener so the user can interact with the icon
          // the map zooms and focusses on the marker when clicked
          marker{{$coordinate->id}}.addListener('click', function() {
            map.setZoom(16);
            map.setCenter(marker{{$coordinate->id}}.getPosition());
          });

          // Add a infobox to the marker which appears when clicked
          var infoBox = document.createElement('a')
          infoBox.href = '/buckets/{{$coordinate->id}}'  // this redirects to the show view
          infoBox.innerHTML = 'Details'

          setInfo(marker{{$coordinate->id}}, infoBox);
        }, 200 * {{$coordinate->id}});  // Every 0.2 seconds the next marker drops
        // For this to work its essential the id's are incrementing integers!!!
      @endforeach

      function setInfo(marker, message) {
        var infowindow = new google.maps.InfoWindow({
          content: message
        });

        marker.addListener('click', function() {
          infowindow.open(marker.get('map'), marker);
        });
      }


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
