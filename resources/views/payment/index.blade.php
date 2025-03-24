@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('payment.process') }}" method="POST">
        @csrf
        <div class="mb-3">
            <h3>Choose payment method</h3>
            <select name="method" id="">
                <option value="debit">Debit Card</option>
                <option value="credit">Credit Card</option>
                <option value="amex">PSE</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Pay Now</button>
    </form>
</div>
@endsection