@extends('layouts.app')

@section('content')
  <div class="admin-page">
    <h2>Nieuwe gebruiker invoeren</h2>
    @include('auth.register')
  </div>
@endsection
