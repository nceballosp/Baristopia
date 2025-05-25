@extends('layouts.app')

@section('title', 'Mapa de Medellín')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/map.css') }}">
@endpush

@section('content')
<div class="map-container">
    <img src="{{ asset('images/medellin.png') }}" alt="Mapa de Medellín" class="map-image">

    <div class="marker poblado"><span class="marker-label">El Poblado</span></div>
    <div class="marker laureles"><span class="marker-label">Laureles</span></div>
    <div class="marker envigado"><span class="marker-label">Envigado</span></div>
    <div class="marker bello"><span class="marker-label">Bello</span></div>

    <!-- Ventana de información -->
    <div id="infoWindow" class="info-window">
        <h5></h5>
        <p></p>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/map.js') }}"></script>
@endpush 