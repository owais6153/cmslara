@extends('layouts.admin.app', ['title' => 'General Settings'])



@section('content')
    <div class="container">
        <div class="row">
            <div class="card shadow mb-4 col-md-3 px-0">
                <div class="card-header py-3 ">
                    <h6 class="m-0 font-weight-bold text-primary">All Settings</h6>
                </div>
                <div class="card-body p-0">
                    <ul class="nav nav-tabs flex-column">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#general">General</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#registration">Registration</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content col-md-9 px-0">
                <div class="tab-pane container active" id="general">
                    @include('admin.settings._general')
                </div>
                <div class="tab-pane container fade" id="registration">
                    @include('admin.settings._registration')
                </div>
                <div class="tab-pane container fade" id="menu2">...</div>
            </div>
        </div>
    </div>
@endsection
