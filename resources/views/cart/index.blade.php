<!--JJGV, NCP-->

@extends('layouts.app')
@section('content')

@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

  <div class="row justify-content-center">
    <div class="col-md-12">
    <h4>Products in cart</h4>
      <ul>
        @foreach($viewData["cartProducts"] as $key => $product)
          <li>
            Name: {{ $product->getName() }} -
            Price: ${{ $product->getPrice() }} -
            Quantity: {{ $product->quantity }} -
            Subtotal: ${{ $product->getPrice() * $product->quantity }}
            <a href="{{ route('cart.remove', $key) }}" id="btn-cart" class="btn btn-danger">Remove</a>     
          </li>
        @endforeach
      </ul>
      <a class="btn btn-danger" href="{{ route('cart.removeAll') }}">Remove all products from cart</a>
    </div>

    @if(session('cart_product_data'))
    <form action="{{ route('order.checkout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Continue Purchase</button>
    </form>
    @endif

  </div>
</div>
@endsection
