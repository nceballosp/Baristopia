<!-- JJVG -->

@extends('layouts.app')
@section('title',  __('messages.paySummary') )

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <body>
        <div class="container">
            <h2>{{ __('messages.paySummary') }}</h2>
            <p><strong>{{ __('messages.payID') }}</strong> {{ $viewData['payment']->getId() }}</p>
            <p><strong>{{ __('messages.orderID') }}</strong> {{ $viewData['order']->getId() }}</p>
            <p><strong>{{ __('messages.totalAmount') }}</strong> ${{ number_format($viewData['order']->getTotal(), 2) }}</p>
            <p><strong>{{ __('messages.payMethod') }}</strong> {{ $viewData['payment']->getMethod() }}</p>
            <p><strong>{{ __('messages.status') }}</strong> {{ $viewData['payment']->getStatus() }}</p>

            <h3>{{ __('messages.orderItems') }}</h3>
            <table>
                <tr>
                    <th>{{ __('messages.product') }}</th>
                    <th>{{ __('messages.quantity') }}</th>
                    <th>{{ __('messages.subtotal') }}</th>
                </tr>
                @foreach ($viewData['order']->getItems() as $item)
                    <tr>
                        <td>{{ $item->getProduct()->getName() }}</td>
                        <td>{{ $item->getQuantity() }}</td>
                        <td>${{ number_format($item->getSubTotal(), 2) }}</td>
                    </tr>
                @endforeach
            </table>
            <br>

            <a href="{{ route('payment.pdf', $viewData['payment']->getId()) }}" class="btn btn-primary">{{ __('messages.download') }}</a>
        </div>
    </body>

    
</div>
@endsection