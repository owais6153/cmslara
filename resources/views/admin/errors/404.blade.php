@extends('layouts.admin.app', ['dashboard_nav' => true, 'title' => '404 not found'])

@section('content')
    <div class="container">

        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            
                        <p class="text-gray-500 mb-0">{{ $exception->getMessage() }}</p>
            <a href="{{route('admin')}}">&larr; Back to Dashboard</a>
        </div>
        
    </div>
@endsection