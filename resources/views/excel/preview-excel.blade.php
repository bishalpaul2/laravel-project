@extends('layouts.app')

@section('title', 'Preview Excel')

@section('content')
    <div class="container">
        <h2>Preview Excel File</h2>

        <form action="{{ route('store-excel') }}" method="POST">
            @csrf
            <input type="hidden" name="file" value="{{ $file }}">
            <input type="hidden" name="file_name" value="{{ $uniqueFileName }}">
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Scheme Code</th>
                        <th>Scheme Name</th>
                        <th>Central/State Scheme</th>
                        <th>Financial Year</th>
                        <th>State Disbursement</th>
                        <th>Central Disbursement</th>
                        <th>Total Disbursement</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data[0] as $row)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $row['scheme_code'] ?? 'N/A' }}</td>
                            <td>{{ $row['scheme_name'] ?? 'N/A' }}</td>
                            <td>{{ $row['central_state_scheme'] ?? 'N/A' }}</td>
                            <td>{{ $row['fin_year'] ?? 'N/A' }}</td>
                            <td>{{ $row['state_disbursement'] ?? 'N/A' }}</td>
                            <td>{{ $row['central_disbursement'] ?? 'N/A' }}</td>
                            <td>{{ $row['total_disbursement'] ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-success">Confirm and Upload</button>
        </form>
    </div>
@endsection
