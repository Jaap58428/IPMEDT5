@extends('layouts.app')

@section('content')
  <h2>Nieuwe gebruiker invoeren</h2>
  <p>Admins kunnen nieuwe gebruikers toevoegen</p>
  @include('auth.register')
@endsection
