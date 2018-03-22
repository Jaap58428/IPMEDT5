@extends('layouts.app')

@section('content')
  <div class="page-title">
    <a href="/groep_g/public/buckets">Terug naar lijst</a>
    <h2>Details over prullenbak {{$bucket->id}}</h2>
    Deze bak is nu
    @if ($bucket->last_empty < $bucket->last_full)
      <span class="span-full">Vol</span>
      @else
      <span class="span-empty">Leeg</span>
    @endif
    <p>Laatste lege meting<br/> {{$bucket->last_empty}}</p>
    <p>Laatste volle meting<br/> {{$bucket->last_full}}</p>
    <p>Er zijn {{count($measurements)}} metingen bekend.</p>
  </div>
  <div id="maplocal"></div>
  <script>
    var map;
    function initMap() {
      var map = new google.maps.Map(document.getElementById('maplocal'), {
        zoom: 16,
        center: new google.maps.LatLng({{$bucket->latitude}}, {{$bucket->longitude}}),
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

      var marker{{$bucket->id}} = new google.maps.Marker({
        position: new google.maps.LatLng({{$bucket->latitude}}, {{$bucket->longitude}}),
        @if ($bucket->last_empty < $bucket->last_full)
          icon: icons.full_dump.icon,
        @else
          icon: icons.empty_dump.icon,
        @endif
        map: map
      });

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
  <div class="bucket-details-lijst">
    @if (count($measurements) > 0)
      <ul class="measurement-list">
        @foreach ($measurements as $measurement)
          <li>Meting A: {{$measurement->sensor_a}} - Meting B: {{$measurement->sensor_b}}<br/>
            Gemeten op: {{$measurement->updated_at}}</li>
        @endforeach
      </ul>
    @endif
  </div>
@endsection
