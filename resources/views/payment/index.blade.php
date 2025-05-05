<!-- JJVG, NCP -->

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
            <h4>{{ __('messages.choosePayment') }}</h4>
            <input type="hidden" name="order_id" value="{{ session('order_id') }}">
            <select class="form-select" name="method" id="">
                <option value="debit">{{ __('messages.debit') }}</option>
                <option value="credit">{{ __('messages.credit') }}</option>
                <option value="amex">{{ __('messages.PSE') }}</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.pay') }}</button>
    </form>
</div>
@endsection