<!-- NCP -->

@extends('layouts.admin')

@section('content')
<div class="container">
  <div>
        <h2>{{ __('messages.payments') }}</h2>
        <a href="{{ route('admin.payment.create') }}" class="btn">{{ __('messages.newPayment') }}</a>
    </div>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>{{ __('messages.id') }}</th>
                <th>{{ __('messages.payMethod') }}</th>
                <th>{{ __('messages.status') }}</th>
                <th>{{ __('messages.order') }}</th>
                <th>{{ __('messages.view') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viewData["payments"] as $payment)
                <tr>
                    <td>{{ $payment->getId() }}</td>
                    <td>{{ $payment->getMethod()}}</td>
                    <td>{{ $payment->getStatus() }}</td>
                    <td>{{ $payment->getOrder()->getId() }}</td>
                    <td>
                        <a href="{{ route('admin.payment.show', ['id'=> $payment->getId()]) }}" class="btn">{{ __('messages.view') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection