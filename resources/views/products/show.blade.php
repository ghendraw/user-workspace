@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Product Details</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Unit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->unit }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
