<!-- NCP -->

@extends('layouts.app')
@section('title', __('messages.home'))
@section('content')

<h3>{{ __('messages.welcome') }}</h3>
<p>{{ __('messages.introduction') }}</p>
<div class="home">
    <div id="row">
    <p>{{ __('messages.registerHome') }}</p>    
    <a class="btn btn-primary" href="{{ route('register') }}">{{ __('messages.registerNow') }}</a>
    </div>
    <div id="row">
        <p>{{ __('messages.buyProducts') }}</p>
        <a class="btn btn-primary" href="{{ route('product.index') }}">{{ __('messages.viewProducts') }}</a>
    </div>
</div>

@endsection