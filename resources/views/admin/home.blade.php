@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron text-center">
                <h1 class="display-4">Welcome, {{  $authUser->name }}!</h1>
                <p class="lead">This is your profile where you can manage Users and upload Excel files.</p>
                <hr class="my-4">
                <p>Explore the various features and tools available to you.</p>
            </div>
        </div>
    </div>
</div>
@endsection