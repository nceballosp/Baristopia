<!-- JJVG, NCP -->

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
      <img src="{{ asset('storage/' . $viewData['product']->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4>
           {{ $viewData['product']->getName() }}
        </h4>
        <p class="card-text">Descripcion: {{ $viewData['product']->getDescription()}}</p>
        <p class="card-text">Price: ${{ $viewData['product']->getPrice()}}</p>
        <p class="card-text">Stock: {{ $viewData['product']->getStock()}}</p>
        @if ($viewData['product']->getStock() != 0)    
        <form action="{{ route('cart.add', $viewData['product']->getId())  }}" method="POST">
          @csrf
          <label id="quantity-label" for="quantity">Quantity:</label>
          <input type="number" name="quantity" id="quantity" min="1" max="{{ $viewData['product']->getStock() }}" value="1" required> 
          <br>
          <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>
        @else
        <p class="card-text">No stock</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection

