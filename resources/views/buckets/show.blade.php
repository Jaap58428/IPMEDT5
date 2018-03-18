@extends('layouts.app')

@section('content')
  <a href="/buckets">Ga Terug</a>
  <h2>Details over prullenbak {{$bucket->id}}</h2>
  <p>Deze bak is het laast geleegd op {{$bucket->last_full}} en was het laatst vol op {{$bucket->last_empty}}.</p>
  <p>In totaal zijn er {{count($bucket->measurements)}} metingen bekend over deze bak.</p>
  <hr>
  @if (count($bucket->measurements) > 0)
    Metingen voor bak {{$bucket->id}}:
    <ul>
      @foreach ($bucket->measurements as $measurement)
        <li>Meting A: {{$measurement->sensor_a}} - Meting B: {{$measurement->sensor_b}} - Gemeten op: {{$measurement->updated_at}}</li>
      @endforeach
    </ul>
  @endif

@endsection
