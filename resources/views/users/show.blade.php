@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Details</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
