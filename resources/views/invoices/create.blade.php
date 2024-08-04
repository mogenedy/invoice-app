@extends('admin_dashboard')

@section('admin')
    <div class="content-wrapper">

        <div class="container">
            <a href="{{ route('clients.create') }}" class="btn btn-warning mb-3">Add New Client</a>

            <h4>Create Invoice</h4>
            <form id="invoice-form" method="POST">
                @csrf
                <div class="form-group">
                    <label for="invoice_number">Invoice Number:</label>
                    <input type="text" class="form-control" id="invoice_number" name="invoice_number" required>
                </div>
                {{-- clients list --}}
                <div class="form-group">
                    <label for="client_id">Client:</label>
                    <select class="form-control" id="client_id" name="client_id" required>
                        <option value="">Select Client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="invoice_date">Invoice Date:</label>
                    <input type="date" class="form-control" id="invoice_date" name="invoice_date" required>
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date:</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" required>
                </div>

                <h4>Items</h4>
                <div id="items-container">
                    <div class="item-group">
                        <div class="form-group">
                            <label for="description_1">Description:</label>
                            <input type="text" class="form-control" id="description_1" name="items[0][description]"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="quantity_1">Quantity:</label>
                            <input type="number" class="form-control" id="quantity_1" name="items[0][quantity]"
                                min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="price_per_unit_1">Price per unit:</label>
                            <input type="number" class="form-control" id="price_per_unit_1" name="items[0][price_per_unit]"
                                step="0.01" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="total_1">Total:</label>
                            <input type="number" class="form-control" id="total_1" name="items[0][total]" step="0.01"
                                min="0" readonly>
                        </div>
                    </div>
                </div>
                <button type="button" id="add-item" class="btn btn-info">Add Item</button>
                <div class="form-group">
                    <label for="total_amount">Total Amount:</label>
                    <input type="number" class="form-control" id="total_amount" name="total_amount" step="0.01"
                        min="0" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Create Invoice</button>
                <a href="{{ route('invoices.index') }}" class="btn btn-info ">Show All Invoices</a>

            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            $(document).ready(function() {
                let itemIndex = 1;

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

                $('#items-container').on('input', 'input[name$="[quantity]"], input[name$="[price_per_unit]"]',
                    function() {
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

                $('#invoice-form').submit(function(event) {
                    event.preventDefault();
                    $.ajax({
                        url: '{{ route('invoices.store') }}',
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            toastr.success('Invoice created successfully!');
                        },
                        error: function(xhr) {
                            toastr.error('An error occurred: ' + xhr.responseText);
                        }
                    });
                });

                @if (session('success'))
                    toastr.success("{{ session('success') }}");
                @endif
            });
        </script>
        

    </div>
@endsection
