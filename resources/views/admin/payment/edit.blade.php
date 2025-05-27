@extends('layouts.admin')
@section('title',  __('messages.editPayment') )
@section('content')
<div class="container mt-4">
    <h2>{{ $viewData['payment']->getId() }}</h2>

    <form action="{{ route('admin.payment.update', ['id' => $viewData['payment']->getId()]) }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $viewData['payment']->getId() }}" />

        <label class="form-label">{{__('messages.payMethod')}}</label>
        <select class="form-select" name="method" id="">
            <option value="debit" {{ old('method', $viewData['payment']->getMethod()) == 'debit' ? 'selected' : '' }}>{{ __('messages.debit') }}</option>
            <option value="credit"{{ old('method', $viewData['payment']->getMethod()) == 'credit' ? 'selected' : '' }}>{{ __('messages.credit') }}</option>
            <option value="PSE"{{ old('method', $viewData['payment']->getMethod()) == 'PSE' ? 'selected' : '' }}>{{ __('messages.PSE') }}</option>
        </select>

        <label class="form-label">{{__('messages.status')}}</label>
        <select class="form-select" name="status" id="">
            <option value="Completed" {{ old('status', $viewData['payment']->getStatus()) == 'Completed' ? 'selected' : '' }}>{{ __('messages.completed') }}</option>
            <option value="Not completed"{{ old('status', $viewData['payment']->getStatus()) == 'Not Completed' ? 'selected' : '' }}>{{ __('messages.notCompleted') }}</option>
        </select>

        <button type="submit" class="btn btn-primary">{{ __('messages.updatePay') }}</button>
    </form>
</div>
@endsection
