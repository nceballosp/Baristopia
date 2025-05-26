@extends('layouts.app')

@section('title', 'Mapa de Medellín')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/map.css') }}">
@endpush

@section('content')
<div class="map-container" id="mapContainer">
    <img src="{{ asset('images/medellin.png') }}" alt="Mapa de Medellín" class="map-image" id="mapImage">

    @foreach($cafeterias as $cafeteria)
        <div class="marker"
             style="left: {{ $cafeteria->left }}%; top: {{ $cafeteria->top }}%;"
             title="{{ $cafeteria->name }}">
            <span class="marker-label">{{ $cafeteria->name }}</span>
        </div>
    @endforeach
</div>

<div class="cafeteria-form-container">
    <h4>Agregar nueva cafetería</h4>
    <form method="POST" action="{{ route('map.store') }}">
        @csrf
        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Descripción:</label>
            <input type="text" id="description" name="description" required>
        </div>
        <input type="hidden" name="left" id="inputLeft">
        <input type="hidden" name="top" id="inputTop">
        <div>
            <button type="submit">Guardar cafetería</button>
        </div>
        <div id="posMsg" style="color: #888; font-size: 13px; margin-top: 5px;"></div>
    </form>
    <p style="font-size: 13px; color: #888;">Haz clic en el mapa para seleccionar la ubicación.</p>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/map-form-interaction.js') }}"></script>
@endpush 