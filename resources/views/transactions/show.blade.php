@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Transaction Details</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Customer</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->customer ? $transaction->customer->name : 'N/A' }}</td>
                    <td>{{ $transaction->total_amount }}</td>
                    <td>{{ $transaction->date }}</td>
                </tr>
            </tbody>
        </table>

        <h2>Items</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaction->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('transactions.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
