@extends('layouts.app')
@section('content')

@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

  <div class="row justify-content-center">
    <div class="col-md-12">
    <h1>Products in cart</h1>
      <ul>
        @foreach($viewData["cartProducts"] as $key => $product)
          <li>
            Id: {{ $key }} - 
            Name: {{ $product["name"] }} -
            Price: {{ $product["price"] }}
            <a href="{{ route('cart.remove', $key) }}" class="btn btn-danger">Remove</a>
                    
          </li>
        @endforeach
      </ul>
      <a href="{{ route('cart.removeAll') }}">Remove all products from cart</a>
    </div>
  </div>
</div>
@endsection
