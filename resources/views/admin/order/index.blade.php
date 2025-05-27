<!-- NCP -->

@extends('layouts.admin')
@section('title',  __('messages.viewOrders') )

@section('content')
<div class="container">
  <div>
        <h2>{{ __('messages.orders') }}</h2>
        <a href="{{ route('admin.order.create') }}" class="btn">{{ __('messages.newOrder') }}</a>
  </div>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('messages.id') }}</th>
                <th>{{ __('messages.total') }}</th>
                <th>{{ __('messages.totalQuantity') }}</th>
                <th>{{ __('messages.items') }}</th>
                <th>{{ __('messages.view') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viewData["orders"] as $order)
                <tr>
                    <td>{{ $order->getId() }}</td>
                    <td>${{ number_format($order->getTotal(), 2) }}</td>
                    <td>{{ $order->getTotalQuantity() }}</td>
                    <td>
                        <ul>
                            @foreach ($order->getItems() as $item)
                                <li>{{ $item->getProduct()->getName() }}{{  $item->getProduct()->getPrice() }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('admin.order.show', ['id'=> $order->getId()]) }}" class="btn">{{ __('messages.view') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection