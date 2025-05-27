<!-- NCP, JJVG, SCL -->

@extends('layouts.app')
@section('title',  __('messages.viewProducts') )
@section('content')

<div class="search">
  <form method = "get" action="" class="d-flex">
    <input type="text" class="form-control me-2" placeholder="Search Product" name="search"/>
    <input type="submit" class="btn btn-primary" value="Send" />
    <input type="submit" class="btn" value="Sort By Price" name ="sort" id="sort"/>
  </form>
</div>
<a href="{{ route('product.random') }}" id="random" class="btn">{{ __('messages.random') }}</a>

<div class="row">
  @foreach ($viewData["products"] as $product)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('storage/' . $product->getImage()) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('product.show', ['id'=> $product->getId()]) }}"
          class="btn btn-primary text-white">{{ $product->getName() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection