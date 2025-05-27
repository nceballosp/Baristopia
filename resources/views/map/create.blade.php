@extends('layouts.app')
@section('title',  __('messages.createMap') )
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mb-4">{{ __('messages.addCafe') }}</h1>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('map.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('messages.name') }}</label>
                    <input class="form-control mb-2" type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="description">{{ __('messages.description') }}</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="address">{{ __('messages.dir') }}</label>
                    <input class="form-control mb-2" type="text" class="form-control" id="address" name="address" required>
                </div>

                <div class="form-group">
                    <label for="phone">{{ __('messages.phone') }}</label>
                    <input class="form-control mb-2" type="text" class="form-control" id="phone" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="opening_hours">{{ __('messages.openHours') }}</label>
                    <input class="form-control mb-2" type="text" class="form-control" id="opening_hours" name="opening_hours" required>
                </div>

                <div class="form-group">
                    <label for="image">{{ __('messages.img') }}</label>
                    <input class="form-control mb-2" type="file" class="form-control-file" id="image" name="image" required>
                </div>

                <input type="hidden" id="latitude" name="latitude" required>
                <input type="hidden" id="longitude" name="longitude" required>

                <div class="form-group">
                    <label>{{ __('messages.mapLoc') }}</label>
                    <div id="map" style="height: 400px; width: 100%;"></div>
                    <small class="form-text text-muted">{{ __('messages.mapClick') }}</small>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{ $viewData['googleMapsApiKey'] }}&callback=initMap" async defer></script>
<script>
    let map;
    let marker;

    function initMap() {
        // Medellín coordinates
        const medellin = { lat: 6.2476, lng: -75.5658 };
        
        map = new google.maps.Map(document.getElementById("map"), {
            center: medellin,
            zoom: 13,
        });

        map.addListener("click", (event) => {
            placeMarker(event.latLng);
        });
    }

    function placeMarker(location) {
        if (marker) {
            marker.setPosition(location);
        } else {
            marker = new google.maps.Marker({
                position: location,
                map: map,
                draggable: true
            });

            marker.addListener("dragend", () => {
                updateCoordinates(marker.getPosition());
            });
        }

        updateCoordinates(location);
    }

    function updateCoordinates(location) {
        document.getElementById("latitude").value = location.lat();
        document.getElementById("longitude").value = location.lng();
    }
</script>
@endpush

@endsection 