@extends('admin_dashboard')

@section('admin')
<div class="content-wrapper">
    <head>
        <title>Add Client</title>
        <!-- Include Toastr CSS for notifications -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <!-- Include jQuery (required for Toastr) -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- Include Toastr JS for notifications -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h4>Add Client</h4>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="client-form" action="{{ route('clients.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>

                <button type="submit" class="btn btn-primary">Add Client</button>
                <a href="{{ route('invoices.create') }}" class="btn btn-warning ">Create Invoices</a>

            </form>
        </div>

        <script>
            $(document).ready(function() {
                $('#client-form').on('submit', function(e) {
                    e.preventDefault(); 

                    var formData = $(this).serialize(); 

                    $.ajax({
                        url: $(this).attr('action'), 
                        method: 'POST',
                        data: formData,
                        success: function(response) {
                            toastr.success('Client added successfully');
                            $('#client-form')[0].reset(); 
                        },
                        error: function(xhr) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                toastr.error(value[0]);
                            });
                        }
                    });
                });
            });
        </script>
    </body>
</div>
@endsection
