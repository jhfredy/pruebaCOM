@extends('backend.contenido.principal')

@php
    $user = Auth::user();
@endphp

@section('body')
  @includeWhen($user, 'backend.cliente.cliente-home')
@endsection
