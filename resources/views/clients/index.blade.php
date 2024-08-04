@extends('admin_dashboard')

@section('admin')
<div class="content-wrapper">
    <head>
        <title>Client List</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h4>Client List</h4>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Add New Client</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ $client->address }}</td>
                            <td>
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this client?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No clients found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </body>
</div>
@endsection
