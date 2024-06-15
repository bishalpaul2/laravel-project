@extends('layouts.app')

@section('content')
<!-- Success Alert -->
<div class="container mt-3">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>

<div class="container d-flex justify-content-center mt-5">
    <div class="card" style="width: 50%;">
        <div class="card-body">
            <h5 class="card-title text-center">User Profile</h5>

            <form id="profileForm" method="POST" action="{{ route('profile-update') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                </div>

                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" class="form-control" id="new-password" name="new_password" placeholder="Enter new password" readonly>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" id="editButton" class="btn btn-primary" onclick="enableEditing()">Edit</button>
                    <button type="submit" id="saveButton" class="btn btn-success ml-2 d-none">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function enableEditing() {
        document.getElementById('name').removeAttribute('readonly');
        document.getElementById('email').removeAttribute('readonly');
        document.getElementById('new-password').removeAttribute('readonly');

        document.getElementById('editButton').classList.add('d-none');
        document.getElementById('saveButton').classList.remove('d-none');
    }

    document.addEventListener('DOMContentLoaded', function () {
        if (document.getElementById('successAlert')) {
            setTimeout(function () {
                $('#successAlert').alert('close');
            }, 2000);
        }
    });
</script>
@endsection
