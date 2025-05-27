@extends('layouts.app')
@section('title',  __('messages.map') )
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/map.css') }}">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Mapa de Medellín</h4>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div style="position: relative;">
                            <img src="{{ asset('images/Medellin.png') }}" alt="Mapa de Medellín" width="100%">
                            @foreach($cafeterias as $cafeteria)
                                <div style="position: absolute; left: {{ $cafeteria->left }}%; top: {{ $cafeteria->top }}%; transform: translate(-50%, -50%);">
                                    <div style="width: 10px; height: 10px; background-color: black; border-radius: 50%;"></div>
                                    <div style="margin-top: 5px; text-align: center; font-weight: bold;">{{ $cafeteria->name }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>Agregar Nueva Cafetería</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('map.save') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name">{{ __('messages.name') }}<</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description">{{ __('messages.description') }}<</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>{{ __('messages.mapLoc') }}<</label>
                                            <img src="{{ asset('images/Medellin.png') }}" alt="Mapa de Medellín" width="100%">
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label for="left">{{ __('messages.posX') }}</label>
                                                    <input type="number" class="form-control" id="left" name="left" min="0" max="100" step="0.01" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="top">{{ __('messages.posY') }}</label>
                                                    <input type="number" class="form-control" id="top" name="top" min="0" max="100" step="0.01" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">{{ __('messages.saveCafe') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

