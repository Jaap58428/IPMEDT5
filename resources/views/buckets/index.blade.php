@extends('layouts.app')

@section('content')
  <h2>Lijst prullenbakken</h2>
  <p>Op elke prullenbak kan je klikken voor details</p>
  <p><i>Pagina uitleg: Itereer door alle bucket items.
    Wanneer een 'laatst geleegd' waarde kleiner is dan 'laatst vol'
    kunnen we concluderen dat de bak nog vol is.</i></p>
  @if (count($buckets) > 0)
    <ul>
      @foreach ($buckets as $bucket)
      <li class="list-item" onclick="location.href='/buckets/{{$bucket->id}}'">Vuilnisbak {{$bucket->id}} -
        @if ($bucket->last_full > $bucket->last_empty)
          <span class="list-vol">Vol</span>
          @else
            <span class="list-leeg">Leeg</span>
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
