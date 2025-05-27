<!-- NCP -->

@extends('layouts.app')
@section('title',  __('messages.showRecipes') )
@section('content')

<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ $viewData['recipe']->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4>
           {{ $viewData['recipe']->getName() }}
        </h4>
        <p class="card-text">{{ __('messages.ingredients') }}{{ $viewData['recipe']->getIngredients()}}</p>
        <p class="card-text">{{ __('messages.description') }} {{ $viewData['recipe']->getDescription()}}</p>
      </div>
    </div>
  </div>
</div>
@endsection

