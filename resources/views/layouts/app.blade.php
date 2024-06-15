<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    @include('layouts.navbar')
    <div class="d-flex">
        <div class="mx-auto p-2 container">
            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Helper function to make authenticated requests
        function fetchWithAuth(url, options = {}) {
            const token = localStorage.getItem('auth_token');
            options.headers = {
                ...options.headers,
                'Authorization': `Bearer ${token}`,
            };

            return fetch(url, options).then(response => {
                if (response.status === 401) {
                    alert('Your session has expired. Please log in again.');
                    window.location.href = '/login';
                    return Promise.reject('Session expired');
                }
                return response;
            });
        }

        // Example of making an authenticated request
        function fetchData() {
            fetchWithAuth('/api/protected-endpoint')
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => console.error('Error:', error));
        }

        // Call the function to fetch data
        fetchData();
    </script>
</body>

</html>
