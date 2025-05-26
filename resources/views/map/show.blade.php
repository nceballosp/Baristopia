@extends('layouts.app')
@section('title', $viewData['map']->getName())
@section('content')

@php
    $locationData = [
        'lat' => $viewData['map']->getLatitude(),
        'lng' => $viewData['map']->getLongitude(),
        'name' => $viewData['map']->getName(),
        'description' => $viewData['map']->getDescription(),
        'address' => $viewData['map']->getAddress()
    ];
@endphp

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mb-4">{{ $viewData['map']->getName() }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $viewData['map']->getImage()) }}" class="img-fluid rounded" alt="{{ $viewData['map']->getName() }}">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
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

    <div class="row mt-4">
        <div class="col-md-12">
            <div id="map" style="height: 400px; width: 100%;"></div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{ $viewData['googleMapsApiKey'] }}&callback=initMap" async defer></script>
<script>
    const locationData = JSON.parse('{!! json_encode($locationData) !!}');

    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: locationData.lat, lng: locationData.lng },
            zoom: 15,
        });

        const marker = new google.maps.Marker({
            position: { lat: locationData.lat, lng: locationData.lng },
            map: map,
            title: locationData.name
        });

        const infoWindow = new google.maps.InfoWindow({
            content: `
                <div>
                    <h5>${locationData.name}</h5>
                    <p>${locationData.description}</p>
                    <p>${locationData.address}</p>
                </div>
            `
        });

        marker.addListener("click", () => {
            infoWindow.open(map, marker);
        });
    }
</script>
@endpush

@endsection 