<!-- NCP -->

@extends('layouts.admin')

@section('content')
<div class="container">
    @if($errors->any())
    <ul id="errors" class="alert alert-danger list-unstyled">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <h3>{{ __('messages.createOrder') }}</h3>

    <form method="POST" action="{{ route('admin.order.save') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" class="form-control mb-2" placeholder="Enter total" name="total" value="{{ old('total') }}" />
        <input type="text" class="form-control mb-2" placeholder="Enter total quantity" name="total_quantity" value="{{ old('total_quantity') }}" />
        <input type="submit" class="btn" value="Send" />
    </form>
        
</div>
@endsection