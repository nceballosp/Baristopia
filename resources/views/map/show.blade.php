@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Detalles de la Cafetería</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>{{ $map->name }}</h5>
                            <p>{{ $map->description }}</p>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative">
                                <img src="{{ asset('images/Medellin.png') }}" alt="Mapa de Medellín" style="width: 100%;">
                                <div class="marker" style="position: absolute; left: {{ $map->left }}%; top: {{ $map->top }}%;">
                                    <i class="fas fa-map-marker-alt text-danger" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('map.index') }}" class="btn btn-secondary">Volver</a>
                        <form action="{{ route('map.delete') }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $map->id }}">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta cafetería?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .marker {
        transform: translate(-50%, -100%);
    }
</style>
@endpush
@endsection 