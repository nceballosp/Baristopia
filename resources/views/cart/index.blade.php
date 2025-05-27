<!--JJGV, NCP-->

@extends('layouts.app')
@section('content')
@section('title',  __('messages.cart') )

@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

  <div class="row justify-content-center">
    <div class="col-md-12">
    <h4>{{ __('messages.cartProducts') }}</h4>
      <ul>
        @foreach($viewData["cartProducts"] as $key => $product)
          <li>
            {{ __('messages.name') }} {{ $product->getName() }} -
            {{ __('messages.price') }}{{ $product->getPrice() }} -
            {{ __('messages.quantity') }} {{ $product->quantity }} -
            $ {{ __('messages.subtotal') }}{{ $product->getPrice() * $product->quantity }}
            <a href="{{ route('cart.remove', $key) }}" id="btn-cart" class="btn btn-danger">{{ __('messages.remove') }}</a>     
          </li>
        @endforeach
      </ul>
      <a class="btn btn-danger" href="{{ route('cart.removeAll') }}">{{ __('messages.removeAll') }}</a>
    </div>

    @if(session('cart_product_data'))
    <form action="{{ route('order.checkout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">{{ __('messages.continue') }}</button>
    </form>
    @endif

  </div>
</div>
@endsection
