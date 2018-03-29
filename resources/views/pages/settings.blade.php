@extends('layouts.app')

@section('content')
  <div class="admin-page">
    <h2>Instellingen</h2>
    <p>Deze pagina is alleen maar toegankelijk voor admins</p>
    <p>Mogelijk kan de administrator hier de instellingen van de applicatie
    aanpassen, op back-, front- of embedded-niveau. Op dit moment kan
    de administrator alleen nieuwe gebruikers toevoegen, hiermee wordt voorkomen
    dat elke willekeurige persoon zich aanmeldt.</p>
    <a href="/settings/new-user">Nieuwe gebruiker</a>
  </div>
@endsection
