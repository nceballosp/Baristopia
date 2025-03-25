<!-- NCP -->

@extends('layouts.app')
@section('title', 'Recipes')
@section('content')

<div class="row">
  @foreach ($viewData["recipes"] as $recipe)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('storage/' . $recipe->getImage()) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('recipe.show', ['id'=> $recipe->getId()]) }}"
          class="btn btn-primary text-white">{{ $recipe->getName() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection