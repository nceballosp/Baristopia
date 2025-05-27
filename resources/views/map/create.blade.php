@extends('layouts.app')
@section('title',  __('messages.createMap') )
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('messages.addCafe') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('map.save') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">{{ __('messages.name') }}</label>
                                    <input type="text" class="form-control mb-2" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description">{{ __('messages.description') }}</label>
                                    <textarea class="form-control mb-2" id="description" name="description" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>{{ __('messages.mapLoc') }}</label>
                                    <div style="position: relative;">
                                        <img src="{{ asset('images/Medellin.png') }}" alt="Mapa de Medellín" width="100%" id="mapImage">
                                        <div id="marker" style="display: none; position: absolute; width: 10px; height: 10px; background-color: red; border-radius: 50%; transform: translate(-50%, -50%);"></div>
                                    </div>
                                    <input type="hidden" name="left" id="left">
                                    <input type="hidden" name="top" id="top">
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('map.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('messages.saveCafe') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('mapImage').addEventListener('click', function(e) {
    const rect = e.target.getBoundingClientRect();
    const x = ((e.clientX - rect.left) / rect.width) * 100;
    const y = ((e.clientY - rect.top) / rect.height) * 100;
    
    document.getElementById('left').value = x.toFixed(2);
    document.getElementById('top').value = y.toFixed(2);
    
    const marker = document.getElementById('marker');
    marker.style.display = 'block';
    marker.style.left = x + '%';
    marker.style.top = y + '%';
});
</script>
@endpush 