@extends('layouts.app')
@section('title', 'Home')
@section('content')

<h3>Welcome to Baristopia!</h3>
<p>Baristopia is a coffee shop that offers a variety of coffee products. Our goal is to provide our customers with the best products and the best coffee experience. </p>
<div class="home">
    <div id="row">
        <p>You can create your own products to sell and your own coffee recipes if you register to our page!</p>
        <a class="btn btn-primary" href="{{ route('register') }}">Register Now!</a>
    </div>
    <div id="row">
        <p>Or you can take a look and buy some of our products.</p>
        <a class="btn btn-primary" href="{{ route('product.index') }}">View Products</a>
    </div>
</div>

@endsection