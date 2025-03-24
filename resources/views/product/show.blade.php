@extends('layouts.app')
@section('title', 'Products')
@section('content')

@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('storage/' . $viewData["product"]->getImage()) }}" class="card-img-top img-card">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["product"]->getName() }}
        </h5>
        <p class="card-text">Descripcion: {{ $viewData["product"]->getDescription()}}</p>
        <p class="card-text">Price: ${{ $viewData["product"]->getPrice()}}</p>
        <p class="card-text">Stock: {{ $viewData["product"]->getPrice()}}</p>
        <a href="{{ route('cart.add', $viewData["product"]->getId()) }}" class="btn btn-primary">Add to Cart</a>

      </div>
    </div>
  </div>
</div>
@endsection

