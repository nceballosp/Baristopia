<!-- JJVG -->

@extends('layouts.app')
@section('title',  __('messages.allieService') )
@section('content')

<div class="container mt-4">
    <h2>{{ $viewData['additionalData']['storeName'] }}</h1>
    <a href="{{ $viewData['additionalData']['storeProductsLink'] }}" class="btn btn-primary mt-3" target="_blank">
        {{ ('messages.viewProductAllies') }}
    </a>
</div>
<div class="row">
  @foreach ($viewData['products'] as $product)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="$product['image']" class="card-img-top img-card">
      <div class="card-body text-center">
        <a class="btn btn-primary text-white">{{ $product['name'] }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection