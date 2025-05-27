@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detalles de la Cafetería</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>{{ $map->name }}</h5>
                            <p>{{ $map->description }}</p>
                            <p><strong>Ubicación:</strong> X={{ $map->left }}%, Y={{ $map->top }}%</p>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <img src="{{ asset('images/Medellin.png') }}" alt="Mapa de Medellín" width="100%">
                                <div style="position: absolute; left: {{ $map->left }}%; top: {{ $map->top }}%; transform: translate(-50%, -50%);">
                                    <div style="width: 10px; height: 10px; background-color: black; border-radius: 50%;"></div>
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
                    <h5 class="card-title">{{ __('messages.info') }}</h5>
                    <p class="card-text">{{ $viewData['map']->getDescription() }}</p>
                    <ul class="list-unstyled">
                        <li><strong>{{ __('messages.dir') }}</strong> {{ $viewData['map']->getAddress() }}</li>
                        <li><strong>{{ __('messages.phone') }}</strong> {{ $viewData['map']->getPhone() }}</li>
                        <li><strong>{{ __('messages.openHours') }}</strong> {{ $viewData['map']->getOpeningHours() }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 