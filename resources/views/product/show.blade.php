@extends('layouts.app')
@section('title', 'Products')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["product"]->getName() }}
        </h5>
        <p class="card-text">Descripcion: {{ $viewData["product"]->getDescription()}}</p>
        <p class="card-text">Price: ${{ $viewData["product"]->getPrice()}}</p>
        <p class="card-text">Stock: {{ $viewData["product"]->getPrice()}}</p>

      </div>
    </div>
  </div>
</div>
@endsection

