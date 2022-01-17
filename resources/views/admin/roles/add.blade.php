@extends('layouts.admin.app', ['title' => 'Add New Role'])



@section('content')
    <div class="container">
        @if(session('msg'))
        <div class="alert alert-{{session('msg_type')}}">
            {{session('msg')}}                                            
        </div>
        @endif
   
         <h1 class="h3 mb-4 text-gray-800">Add New Role</h1>

        <form class="user" action="{{route('roles.store')}}" method="POST" autocomplete="off">
               @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <div class="form-group w-100 mb-0">
                            
                            <input type="text"  id="username" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Enter Role Name*" required="" value="{{old('name')}}">        
                                @error('name')
                                    <div class="text-danger">
                                        {{$message}}                                            
                                    </div>
                                @endif
                            </div>
                           
                        </div>
                        <div class="card-body px-5">
                            <h3 class="h3 mb-4">Permisions</h3>
                            <h4 class="h5 mt-4">Dashboard & Settings</h4>
                            <div class="form-group mb-4 d-flex">

                                <div class="custom-control custom-checkbox mr-3 small">
                                    <input id="accessDashboard" type="checkbox" class=" custom-control-input " name="permission[accessDashboard]" value="1" >
                                    <label for="accessDashboard" class="custom-control-label">Access Dashboard</label>
                                </div>

                                <div class="custom-control custom-checkbox mr-3 small">
                                    <input id="accessSettings" type="checkbox" class=" custom-control-input " name="permission[accessSettings]" value="1" >
                                    <label for="accessSettings" class="custom-control-label">Access Settings</label>
                                </div>

                            </div>
                            <hr class="sidebar-divider">
                            <h4 class="h5 mt-4">Pages</h4>
                            <div class="form-group mb-4 d-flex">

                                <div class="custom-control custom-checkbox mr-3 small">
                                    <input id="viewPages" type="checkbox" class=" custom-control-input " name="permission[viewPages]" value="1" >
                                    <label for="viewPages" class="custom-control-label">View Pages</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-3 small">
                                    <input id="addPages" type="checkbox" class=" custom-control-input " name="permission[addPages]" value="1" >
                                    <label for="addPages" class="custom-control-label">Add Pages</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-3 small">
                                    <input id="updatePages" type="checkbox" class=" custom-control-input " name="permission[updatePages]" value="1" >
                                    <label for="updatePages" class="custom-control-label">Update Pages</label>
                                </div>

                                <div class="custom-control custom-checkbox mr-3 small">
                                    <input id="deletePages" type="checkbox" class=" custom-control-input " name="permission[deletePages]" value="1" >
                                    <label for="deletePages" class="custom-control-label">Delete Pages</label>
                                </div>
                            </div>
                            <hr class="sidebar-divider">
                            <h4 class="h5 mt-4">Users</h4>
                            <div class="form-group mb-4 d-flex">

                                <div class="custom-control custom-checkbox mr-3 small">
                                    <input id="viewUsers" type="checkbox" class=" custom-control-input " name="permission[viewUsers]" value="1" >
                                    <label for="viewUsers" class="custom-control-label">View Users</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-3 small">
                                    <input id="addUsers" type="checkbox" class=" custom-control-input " name="permission[addUsers]" value="1" >
                                    <label for="addUsers" class="custom-control-label">Add Users</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-3 small">
                                    <input id="updateUsers" type="checkbox" class=" custom-control-input " name="permission[updateUsers]" value="1" >
                                    <label for="updateUsers" class="custom-control-label">Update Users</label>
                                </div>

                                <div class="custom-control custom-checkbox mr-3 small">
                                    <input id="deleteUsers" type="checkbox" class=" custom-control-input " name="permission[deleteUsers]" value="1" >
                                    <label for="deleteUsers" class="custom-control-label">Delete Users</label>
                                </div>
                            </div>
                            <hr class="sidebar-divider">
                            <h4 class="h5 mt-4">Roles</h4>
                            <div class="form-group mb-4 d-flex">

                                <div class="custom-control custom-checkbox mr-3 small">
                                    <input id="viewRoles" type="checkbox" class=" custom-control-input " name="permission[viewRoles]" value="1" >
                                    <label for="viewRoles" class="custom-control-label">View Roles</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-3 small">
                                    <input id="addRoles" type="checkbox" class=" custom-control-input " name="permission[addRoles]" value="1" >
                                    <label for="addRoles" class="custom-control-label">Add Roles</label>
                                </div>

                                <div class="custom-control custom-checkbox mr-3 small">
                                    <input id="updateRoles" type="checkbox" class=" custom-control-input " name="permission[updateRoles]" value="1" >
                                    <label for="updateRoles" class="custom-control-label">Update Roles</label>
                                </div>

                                <div class="custom-control custom-checkbox mr-3 small">
                                    <input id="deleteRoles" type="checkbox" class=" custom-control-input " name="permission[deleteRoles]" value="1" >
                                    <label for="deleteRoles" class="custom-control-label">Delete Roles</label>
                                </div>
                            </div> 
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary btn-block px-5">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection




