@extends('layouts.admin.app', ['dashboard_nav' => true, 'title' => 'Dashboard'])

@section('content')
    <div class="container">

        <div class="jumbotron">
            <h5>Welcome, {{ auth()->user()->email }}</h5>
            <h1 class="display-3">Bootstrap 4 Laravel Fortify Authentication</h1>
            <p class="lead">This is a simple auth starter setup for laravel 8 projects</p>
            <hr class="my-4">
            <h2>Features:</h2>
            <ul>
                <li>User Login</li>
                <li>User Registration</li>
                <li>Email Verification</li>
                <li>Forget Password</li>
                <li>Reset Password</li>
            </ul>
            <p class="lead">
                <a class="btn btn-primary" href="" target="_blank" role="button">Github Source Code</a>
            </p>
        </div>
    </div>
@endsection