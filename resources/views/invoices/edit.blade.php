@extends('admin_dashboard')
@section('admin')
<div class="content-wrapper">

<head>
    <title>Edit Invoice</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div class="container">
        <h4>Edit Invoice</h4>
        <form id="invoice-form" method="POST" action="{{ route('invoices.update', $invoice->id) }}">
            @csrf
            @method('PUT')
            
            <!-- Form Fields -->
            <div class="form-group">
                <label for="invoice_number">Invoice Number:</label>
                <input type="text" class="form-control" id="invoice_number" name="invoice_number" value="{{ $invoice->invoice_number }}" required>
            </div>
            <div class="form-group">
                <label for="client_name">Client Name:</label>
                <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $invoice->client_name }}" required>
            </div>
            <div class="form-group">
                <label for="client_address">Client Address:</label>
                <input type="text" class="form-control" id="client_address" name="client_address" value="{{ $invoice->client_address }}" required>
            </div>
            <div class="form-group">
                <label for="invoice_date">Invoice Date:</label>
                <input type="date" class="form-control" id="invoice_date" name="invoice_date" value="{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="due_date">Due Date:</label>
                <input type="date" class="form-control" id="due_date" name="due_date" value="{{ \Carbon\Carbon::parse($invoice->due_date)->format('Y-m-d') }}" required>
            </div>
    
            <!-- List of Items -->
            <h4>Items</h4>
            <div id="items-container">
                @foreach($invoice->items as $index => $item)
                    <div class="item-group">
                        <div class="form-group">
                            <label for="description_{{ $index }}">Description:</label>
                            <input type="text" class="form-control" id="description_{{ $index }}" name="items[{{ $index }}][description]" value="{{ $item->description }}" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity_{{ $index }}">Quantity:</label>
                            <input type="number" class="form-control" id="quantity_{{ $index }}" name="items[{{ $index }}][quantity]" value="{{ $item->quantity }}" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="price_per_unit_{{ $index }}">Price per unit:</label>
                            <input type="number" class="form-control" id="price_per_unit_{{ $index }}" name="items[{{ $index }}][price_per_unit]" value="{{ $item->price_per_unit }}" step="0.01" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="total_{{ $index }}">Total:</label>
                            <input type="number" class="form-control" id="total_{{ $index }}" name="items[{{ $index }}][total]" value="{{ $item->total }}" step="0.01" min="0" readonly>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" id="add-item" class="btn btn-secondary">Add Item</button>
            <div class="form-group">
                <label for="total_amount">Total Amount:</label>
                <input type="number" class="form-control" id="total_amount" name="total_amount" value="{{ $invoice->total_amount }}" step="0.01" min="0" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Update Invoice</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            let itemIndex = {{ count($invoice->items) }};
        
            $('#add-item').click(function() {
                let newItemGroup = `
                    <div class="item-group">
                        <div class="form-group">
                            <label for="description_${itemIndex + 1}">Description:</label>
                            <input type="text" class="form-control" id="description_${itemIndex + 1}" name="items[${itemIndex}][description]" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity_${itemIndex + 1}">Quantity:</label>
                            <input type="number" class="form-control" id="quantity_${itemIndex + 1}" name="items[${itemIndex}][quantity]" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="price_per_unit_${itemIndex + 1}">Price per unit:</label>
                            <input type="number" class="form-control" id="price_per_unit_${itemIndex + 1}" name="items[${itemIndex}][price_per_unit]" step="0.01" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="total_${itemIndex + 1}">Total:</label>
                            <input type="number" class="form-control" id="total_${itemIndex + 1}" name="items[${itemIndex}][total]" step="0.01" min="0" readonly>
                        </div>
                    </div>
                `;
                $('#items-container').append(newItemGroup);
                itemIndex++;
            });
        
            $('#items-container').on('input', 'input[name$="[quantity]"], input[name$="[price_per_unit]"]', function() {
                const itemGroup = $(this).closest('.item-group');
                const quantity = itemGroup.find('input[name$="[quantity]"]').val();
                const pricePerUnit = itemGroup.find('input[name$="[price_per_unit]"]').val();
                const totalInput = itemGroup.find('input[name$="[total]"]');
                totalInput.val((quantity * pricePerUnit).toFixed(2));
        
                // Update total amount
                let totalAmount = 0;
                $('input[name$="[total]"]').each(function() {
                    totalAmount += parseFloat($(this).val()) || 0;
                });
                $('#total_amount').val(totalAmount.toFixed(2));
            });

            // Handle form submission with AJAX
            $('#invoice-form').submit(function(event) {
                event.preventDefault(); // Prevent the default form submission
                
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        toastr.success('Invoice updated successfully');
                        
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    }
                });
            });

            // Display Toastr notifications
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif
            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @endif
        });
    </script>
</body>
</html>
</div>
@endsection
