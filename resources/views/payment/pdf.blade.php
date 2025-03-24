<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
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
        <h1>Payment Receipt</h1>
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
    </div>
</body>
</html>
