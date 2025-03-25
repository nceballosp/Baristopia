@extends('layouts.app')
@section('title', 'Products')
@section('content')

<div>
  <form method = "GET" action="" >
  <input type="text" class="form-control mb-2" placeholder="Search Product" name="search"/>
  <input type="submit" class="btn btn-primary" value="Send" />
  </form>
</div>
<a href="{{ route('product.randomizer') }}" class="btn btn-primary">Surprise Me! 🎲</a>

<div class="row">
  @foreach ($viewData["products"] as $product)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('storage/' . $product->getImage()) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="btn bg-primary text-white">{{ $product->getName() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection