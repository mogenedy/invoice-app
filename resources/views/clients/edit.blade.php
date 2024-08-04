@extends('admin_dashboard')

@section('admin')
<div class="content-wrapper">
    <head>
        <title>Edit Client</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>
    <body>
        <div class="container">
            <h4>Edit Client</h4>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="client-form" action="{{ route('clients.update', $client->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $client->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $client->email) }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $client->phone) }}">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $client->address) }}">
                </div>
                <button type="submit" class="btn btn-primary">Update Client</button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
                            toastr.success('Client updated successfully');
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
