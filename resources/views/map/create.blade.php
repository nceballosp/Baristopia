@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Agregar Cafetería</div>
                <div class="card-body">
                    <form action="{{ route('map.save') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ubicación</label>
                            <div class="position-relative">
                                <img src="{{ asset('images/Medellin.png') }}" alt="Mapa de Medellín" id="mapImage" style="width: 100%;">
                                <div id="marker" class="marker" style="display: none;">
                                    <i class="fas fa-map-marker-alt text-danger" style="font-size: 24px;"></i>
                                </div>
                            </div>
                            <small class="form-text text-muted">Haz clic en el mapa para seleccionar la ubicación</small>
                            <input type="hidden" name="left" id="left">
                            <input type="hidden" name="top" id="top">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('map.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .position-relative {
        position: relative;
    }
    .marker {
        position: absolute;
        transform: translate(-50%, -100%);
        cursor: pointer;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mapImage = document.getElementById('mapImage');
        const marker = document.getElementById('marker');
        const leftInput = document.getElementById('left');
        const topInput = document.getElementById('top');

        mapImage.addEventListener('click', function(e) {
            const rect = mapImage.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            // Calcular porcentajes
            const leftPercent = (x / rect.width) * 100;
            const topPercent = (y / rect.height) * 100;
            
            // Actualizar posición del marcador
            marker.style.left = leftPercent + '%';
            marker.style.top = topPercent + '%';
            marker.style.display = 'block';
            
            // Actualizar inputs
            leftInput.value = leftPercent.toFixed(2);
            topInput.value = topPercent.toFixed(2);
        });
    });
</script>
@endpush
@endsection 