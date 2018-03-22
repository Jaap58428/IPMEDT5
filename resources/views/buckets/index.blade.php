@extends('layouts.app')

@section('content')
  <div class="page-title">
    <h2>Prullenbakken lijst</h2>
    <p>Selecteer een prullenbak voor details.</p>
  </div>
  @if (count($buckets) > 0)
    <ul class="bucketlist">
      @foreach ($buckets as $bucket)
        <li
        onclick="location.href='/groep_g/public/buckets/{{$bucket->id}}'"
        @if ($bucket->last_full > $bucket->last_empty)
          class="list-item list-full"
          @else
            class="list-item list-empty"
        @endif
          >Vuilnisbak {{$bucket->id}} -
          @if ($bucket->last_full > $bucket->last_empty)
            <span class="span-full">Vol</span>
            @else
              <span class="span-empty">Leeg</span>
          @endif<br />
          <div class="list-small">
            <small>Laatst vol: {{$bucket->last_full}}</small>
            <small>Laatst leeg: {{$bucket->last_empty}}</small>
            @if (Auth::user()->isAdmin)
              <small>Laatst geleegd door: {{$bucket->user->name}}</small>
            @endif
          </div>
        </li>
      @endforeach
    </ul>
    @else
      <p>Geen vuilnisbakken gevonden.</p>
  @endif
@endsection
