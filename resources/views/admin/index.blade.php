@extends('admin_dashboard')

@section('admin')
    @php
        use Carbon\Carbon;
    @endphp

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <div class="content-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Invoices</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                                        <li class="breadcrumb-item active">List</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End page title -->

                    <!-- Search box -->
                    <div class="row pb-4 gy-3">
                        <div class="col-sm-auto ms-auto">
                            <div class="d-flex gap-3">
                                <div class="search-box">
                                    <input type="text" class="form-control" placeholder="Search for name or designation...">
                                    <i class="las la-search search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End search box -->

                    <!-- Table start -->
                    <div class="row gutters">
                        <div class="col-12">
                            <div class="table-container">
                                <div class="table-responsive">
                                    <table class="table custom-table m-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Invoice Number</th>
                                                <th scope="col">Client Name</th>
                                                <th scope="col">Client Address</th>
                                                <th scope="col">Invoice Date</th>
                                                <th scope="col">Due Date</th>
                                                <th scope="col">Total Amount</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoices as $invoice)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $invoice->invoice_number }}</td>
                                                    <td>{{ $invoice->client_name }}</td>
                                                    <td>{{ $invoice->client_address }}</td>
                                                    <td>{{ Carbon::parse($invoice->invoice_date)->format('Y-m-d') }}</td>
                                                    <td>{{ Carbon::parse($invoice->due_date)->format('Y-m-d') }}</td>
                                                    <td>LE{{ number_format($invoice->total_amount, 2) }}</td>
                                                    <td>
                                                        <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-primary">View Invoice</a>
                                                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning">Edit Invoice</a>

                                                        @if(auth()->user()->role == 'admin')
                                                        <form id="delete-form-{{ $invoice->id }}" action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger" onclick="deleteInvoice({{ $invoice->id }})">Delete</button>
                                                        </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table end -->

                </div>
                <!-- Container-fluid end -->
            </div>
            <!-- End Page-content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function deleteInvoice(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
