<!-- NCP -->

@extends('layouts.app')
@section('title', 'Recipes')
@section('content')

<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('storage/' . $viewData['recipe']->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4>
           {{ $viewData['recipe']->getName() }}
        </h4>
        <p class="card-text">Ingredients: ${{ $viewData['recipe']->getIngredients()}}</p>
        <p class="card-text">Descripcion: {{ $viewData['recipe']->getDescription()}}</p>
      </div>
    </div>
  </div>
</div>
@endsection

