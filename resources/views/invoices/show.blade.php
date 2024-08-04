@extends('admin_dashboard')

@section('admin')
<div class="content-wrapper">
    <div class="main-content">
        <head>
            <title>Invoice Details</title>
        </head>
        <body>
            <div class="container mt-5">
                <h4 class="mb-4">Invoice Details</h4>
                
                <div class="card">
                    <div class="card-header">
                        <h3>Invoice Number: {{ $invoice->invoice_number }}</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Client Name:</strong> {{ $invoice->client->name }}</p>
                        <p><strong>Client Address:</strong> {{ $invoice->client->address }}</p>
                        <p><strong>Invoice Date:</strong> {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('Y-m-d') }}</p>
                        <p><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($invoice->due_date)->format('Y-m-d') }}</p>
                        <p><strong>Total Amount:</strong> {{ number_format($invoice->total_amount, 2) }} LE</p>

                        <h4 class="mt-4">Items</h4>
                        <table class="table table-striped">
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
                                        <td>LE{{ number_format($item->total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('invoices.index') }}" class="btn btn-primary">Back to List</a>
<a href="{{ route('invoices.edit', ['invoice' => $invoice->id]) }}" class="btn btn-warning">Edit Invoice</a>

@if(auth()->user()->role==('admin'))
    <form action="{{ route('invoices.destroy', ['id' => $invoice->id]) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this invoice?');">Delete Invoice</button>
    </form>
@else
    <button class="btn btn-danger" disabled>Delete Invoice</button>
@endif

                        
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        </body>
    </div>
</div>
<a href="{{ route('invoice.download', ['id' => $invoice->id]) }}" class="btn btn-success">Download PDF</a>

@endsection
