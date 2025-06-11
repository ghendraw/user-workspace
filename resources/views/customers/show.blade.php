@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Customer Details</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->email }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('customers.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
