@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Transactions</h1>
        <a href="{{ route('transactions.create') }}" class="btn btn-primary">Create Transaction</a>
        <table class="table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Customer</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->user->name }}</td>
                        <td>{{ $transaction->customer ? $transaction->customer->name : 'N/A' }}</td>
                        <td>{{ $transaction->total_amount }}</td>
                        <td>{{ $transaction->date }}</td>
                        <td>
                            <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
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
