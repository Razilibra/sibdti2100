@extends('kerangka.master')

@section('title', 'User Details')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>User Details</h4>
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $user->nama }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ $user->role }}</p>
            <p><strong>Created At:</strong> {{ $user->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $user->updated_at }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Back to User List</a>
        </div>
    </div>
@endsection
