@extends('layouts.admin')
@section('title',  __('messages.editOrder') )

@section('content')
<div class="container mt-4">
    <h2>{{ $viewData['order']->getId() }}</h2>

    <form action="{{ route('admin.order.update', ['id' => $viewData['order']->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">{{__('messages.total')}}</label>
            <input type="number" step="0.01" name="total" class="form-control" value="{{ old('total', $viewData['order']->total) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.totalQuantity') }}</label>
            <input type="number" name="total_quantity" class="form-control" value="{{ old('total_quantity', $viewData['order']->total_quantity) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.updatePay') }}</button>
    </form>
</div>
@endsection
