<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Invoice #{{ $invoice->invoice_number }}</h1>
    <p><strong>Client Name:</strong> {{ $invoice->client->name }}</p>
    <p><strong>Client Address:</strong> {{ $invoice->client->address }}</p>
    <p><strong>Invoice Date:</strong> {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('Y-m-d') }}</p>
    <p><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($invoice->due_date)->format('Y-m-d') }}</p>
    <p><strong>Total Amount:</strong> {{ number_format($invoice->total_amount, 2) }} LE</p>

    <h2>Items</h2>
    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price per Unit</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->items as $item)
            <tr>
                <td>{{ $item->description }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price_per_unit, 2) }}</td>
                <td>{{ number_format($item->total, 2) }} LE</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
