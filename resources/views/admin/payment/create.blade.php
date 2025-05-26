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

    <h3>{{ __('messages.createPayment') }}</h3>

    <form method="POST" action="{{ route('admin.payment.save') }}" enctype="multipart/form-data">
        @csrf
        <select class="form-select" name="method" id="">
            <option value="Debit">{{ __('messages.debit') }}</option>
            <option value="Credit">{{ __('messages.credit') }}</option>
            <option value="PSE">{{ __('messages.PSE') }}</option>
        </select>
        <select class="form-select" name="status" id="">
            <option value="Completed">{{ __('messages.completed') }}</option>
            <option value="Not completed">{{ __('messages.notCompleted') }}</option>
        </select>
        
        <input type="submit" class="btn" value="Send" />
    </form>
</div>
@endsection