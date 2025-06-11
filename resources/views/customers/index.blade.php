@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Customers</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Create Customer</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
