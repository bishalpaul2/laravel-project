@extends('layouts.app')

@section('title', 'User Excel Data')

@section('content')
    <div class="container">

        @if ($data->isEmpty())
            <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
                <div class="text-center">
                    <p class="display-4">No files uploaded.</p>
                    <p class="lead">You have not uploaded any Excel files yet. Please upload a file to view data.</p>
                    <a href="{{ route('upload-excel') }}" class="btn btn-primary">Upload File</a>
                </div>
            </div>
        @else
            <h2 class="my-4">Your Excel Data</h2>
            @foreach ($data as $fileName => $rows)
                @php
                    $fileName = explode('%', $fileName)[0];
                @endphp
                <h3>{{ $fileName }}</h3>
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
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $row->scheme_code }}</td>
                                <td>{{ $row->scheme_name }}</td>
                                <td>{{ $row->central_state_scheme }}</td>
                                <td>{{ $row->fin_year }}</td>
                                <td>{{ $row->state_disbursement }}</td>
                                <td>{{ $row->central_disbursement }}</td>
                                <td>{{ $row->total_disbursement }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        @endif
    </div>
@endsection
