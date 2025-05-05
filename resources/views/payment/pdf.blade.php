<!-- JJVG -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.receipt') }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        h1 { text-align: center; }
        .details { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ __('messages.receipt') }}</h1>
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
    </div>
</body>
</html>
