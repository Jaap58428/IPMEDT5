@extends('layouts.app')

@section('content')
  <a href="/buckets">Ga Terug</a>
  <h2>Details over prullenbak {{$bucket->id}} - Deze bak is nu
  @if ($bucket->last_empty < $bucket->last_full)
    <span class="">Vol</span>
    @else
    <span class="">Leeg</span>
  @endif
  </h2>
  <p>Deze bak is het laast geleegd op {{$bucket->last_empty}} en was het laatst vol op {{$bucket->last_full}}.</p>
  <p>In totaal zijn er {{count($measurements)}} metingen bekend over deze bak.</p>
  <hr>
  @if (count($measurements) > 0)
    Metingen voor bak {{$bucket->id}}:
    <ul>
      @foreach ($measurements as $measurement)
        <li>Meting A: {{$measurement->sensor_a}} - Meting B: {{$measurement->sensor_b}} - Gemeten op: {{$measurement->updated_at}}</li>
      @endforeach
    </ul>
  @endif

@endsection
