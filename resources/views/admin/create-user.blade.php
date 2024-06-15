@extends('layouts.app')

@section('title', 'Add New User')

@section('content')
<div class="card">
    <div class="card-header">
        Add New Staff
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('create-user') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        Created Users
    </div>
    <div class="card-body">
        @if ($createdUsers->isEmpty())
            <p>No users created yet.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($createdUsers as $createdUser)
                        <tr>
                            <td>{{ $createdUser->name }}</td>
                            <td>{{ $createdUser->email }}</td>
                            <td>{{ $createdUser->role }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
