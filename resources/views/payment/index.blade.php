@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('payment.process')}}" method="POST">
        @csrf
        <div class="mb-3">
            <h4>Choose payment method</h4>
            <input type="hidden" name="order_id" value="{{ session('order_id') }}">
            <select class="form-select" name="method" id="">
                <option value="debit">Debit Card</option>
                <option value="credit">Credit Card</option>
                <option value="amex">PSE</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Pay Now</button>
    </form>
</div>
@endsection