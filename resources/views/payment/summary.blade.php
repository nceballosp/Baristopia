@extends('layouts.app')
@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <body>
        <div class="container">
            <h1>Payment Summary</h1>
            <p><strong>Payment ID:</strong> {{ $viewData['payment']->getId() }}</p>
            <p><strong>Order ID:</strong> {{ $viewData['order']->getId() }}</p>
            <p><strong>Total Amount:</strong> ${{ number_format($viewData['order']->getTotal(), 2) }}</p>
            <p><strong>Payment Method:</strong> {{ $viewData['payment']->getMethod() }}</p>
            <p><strong>Status:</strong> {{ $viewData['payment']->getStatus() }}</p>

            <h3>Order Items</h3>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                @foreach ($viewData['order']->getItems() as $item)
                    <tr>
                        <td>{{ $item->getProduct()->getName() }}</td>
                        <td>{{ $item->getQuantity() }}</td>
                        <td>${{ number_format($item->getSubTotal(), 2) }}</td>
                    </tr>
                @endforeach
            </table>

            <a href="{{ route('payment.pdf', $viewData['payment']->getId()) }}" class="btn btn-primary">Download PDF</a>
        </div>
    </body>

    
</div>
@endsection