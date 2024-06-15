@extends('layouts.app')

@section('content')
    <!-- Success Alert -->
    <div class="container mt-3" id="successAlert" style="display: none;">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Profile updated successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="container d-flex justify-content-center mt-5">
        <div class="card" style="width: 50%;">
            <div class="card-body">
                <h5 class="card-title text-center">User Profile</h5>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                </div>

                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" class="form-control" id="new-password" placeholder="Enter new password" readonly>
                </div>

                <div class="d-flex justify-content-end">
                    <button id="editButton" class="btn btn-primary" onclick="enableEditing()">Edit</button>
                    <button id="saveButton" class="btn btn-success ml-2 d-none" onclick="saveChanges()">Save</button>
                </div>
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

        function saveChanges() {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const newPassword = document.getElementById('new-password').value;

            const csrfToken = '{{ csrf_token() }}';

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/update-profile';

            const tokenInput = document.createElement('input');
            tokenInput.type = 'hidden';
            tokenInput.name = '_token';
            tokenInput.value = csrfToken;
            form.appendChild(tokenInput);

            const nameInput = document.createElement('input');
            nameInput.type = 'hidden';
            nameInput.name = 'name';
            nameInput.value = name;
            form.appendChild(nameInput);

            const emailInput = document.createElement('input');
            emailInput.type = 'hidden';
            emailInput.name = 'email';
            emailInput.value = email;
            form.appendChild(emailInput);

            if (newPassword !== '') {
                const newPasswordInput = document.createElement('input');
                newPasswordInput.type = 'hidden';
                newPasswordInput.name = 'new_password';
                newPasswordInput.value = newPassword;
                form.appendChild(newPasswordInput);
            }

            document.body.appendChild(form);
            form.submit();

            document.getElementById('successAlert').style.display = 'block';
        }
    </script>
@endsection