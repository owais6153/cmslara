@extends('layouts.admin.app', ['title' => 'Edit Category'])



@section('content')
    <div class="container">
        @if(session('msg'))
        <div class="alert alert-{{session('msg_type')}}">
            {{session('msg')}}                                            
        </div>
        @endif

         <h1 class="h3 mb-4 text-gray-800">Edit Category</h1>
         <div class="row">
         	@can('updateCategories')
		    	<div class="col-md-4">
		    		<form class="user" action="{{route('categories.update', ['category' => request('category')])}}" method="POST">
		    			@csrf
		    			<input type="hidden" name="old_slug" value="{{$category->slug}}">
		    		<div class="card shadow">
		    			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		                	<h6 class="m-0 font-weight-bold text-primary">Add Category</h6>		              
			            </div>
			            <div class="card-body">
			            	<div class="form-group">
			            		<label for="name">Name*</label>
			            		<input type="text" name="name" id="name" value="{{ (old('name')) ? old('name') : $category->name }}" placeholder="Name" class="form-control @error('name') is-invalid @enderror">
			            		@error('name')
			            			{{$message}}
			            		@enderror
			            	</div>
			            	<div class="form-group">
			            		<label for="slug">Slug*</label>
			            		<input type="text" name="slug" value="{{ (old('slug')) ? old('slug') : $category->slug }}" id="slug" placeholder="Slug" class="form-control @error('slug') is-invalid @enderror">
			            		@error('slug')
			            			{{$message}}
			            		@enderror
			            	</div>
			            	<div class="form-group">
			            		<label for="description">Description</label>
			            		<textarea style="height: 100px;" type="text" name="description" id="description" placeholder="Description" class="form-control @error('description') is-invalid @enderror">{{ (old('description')) ? old('description') : $category->description }}</textarea>
			            		@error('description')
			            			{{$message}}
			            		@enderror
			            	</div>
			            	 <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block px-5">
                                    {{ __('Update') }}
                                </button>
                            </div>
			            </div>
		    		</div>
			    	</form>
		    	</div>
         	@endcan
         	<div class="col-md-8">
         		<div class="card shadow mb-4">
		            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		                <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
		              
		            </div>
		            <div class="card-body">
		                <div class="table-responsive">
		                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		                        <thead class="bg-primary text-light">
			                        <tr>
		                            <th scope="col">ID</th>
							      <th scope="col">Category Name</th>
							      <th scope="col">Action</th>
								    </tr>
		                        </thead>
		                        <tfoot class="bg-primary text-light">
			                        <tr>
		                            <th scope="col">ID</th>
							      <th scope="col">Category Name</th>
							      <th scope="col">Action</th>
								    </tr>
		                        </tfoot>
		                        <tbody>
		                        </tbody>
		                    </table>
		                </div>
		            </div>
		        </div>
         	</div>
         </div>

    </div>
@endsection
@section('scripts')
	<script type="text/javascript">
		$(document).ready( function () {
		   $.ajaxSetup({
		      headers: {
		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      }
		  });
		 
		  $('#dataTable').DataTable({
		         processing: true,
		         serverSide: true,
		         ajax: {
		          url: "{{ route('categories.get') }}",
		          type: 'GET',
		         },
		         columns: [
		                  { data: 'id', name: 'id', 'visible': false},
		                  { data: 'name', name: 'name' },
		                  { data: 'action', name: 'action', orderable: true,searchable: true}
		               ],
		        order: [[0, 'desc']]
		  });
		$('#name').blur(function (e) {
            if ($('#slug').val() == '') {
                $('#slug').val(
                $(this).val().toLowerCase()
                 .replace(/[^\w ]+/g, '')
                 .replace(/ +/g, '-')
                );
            }
        })
		});
	</script>
@endsection
