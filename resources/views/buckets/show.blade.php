@extends('layouts.app')

@section('content')
  <div class="page-title">
    <a href="/buckets">Terug naar lijst</a>
    <h2>Details over prullenbak {{$bucket->id}}</h2>
    Deze bak is nu
    @if ($bucket->last_empty < $bucket->last_full)
      <span class="span-full">Vol</span>
      @else
      <span class="span-empty">Leeg</span>
    @endif
    <p>Laatste lege meting<br/> {{$bucket->last_empty}}</p>
    <p>Laatste volle meting<br/> {{$bucket->last_full}}</p>
  </div>
  <div class="bucket-details-lijst">
    <p>Er zijn {{count($measurements)}} metingen bekend.</p>
    <hr>
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
