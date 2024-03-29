@extends('layouts.admin.app', ['title' => 'Add New Blog'])



@section('content')
    <div class="container">
        @if(session('msg'))
        <div class="alert alert-{{session('msg_type')}}">
            {{session('msg')}}                                            
        </div>
        @endif
   
         <h1 class="h3 mb-4 text-gray-800">Add New Blog</h1>

        <form action="{{route('blogs.store')}}" method="POST" autocomplete="off" class="user">
               @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h3 class="h5 my-0">Blog Information</h3>                           
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text"  required="" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Enter Blog Name*" value="{{old('name')}}">        
                                @error('name')
                                    <div class="text-danger">
                                        {{$message}}                                            
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                            <label for="ckeditor1">Description</label>
                            <textarea class=" form-control @error('description') is-invalid @enderror" id="ckeditor1" placeholder="Description"  name="description">{{old('description')}} </textarea>
                            @error('description')
                                <div class="text-danger">
                                    {{$message}}                                            
                                </div>
                            @endif
                            </div>
                            <div class="form-group ">
                            <label for="short_description">Short Description</label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" placeholder="Short Description" name="short_description">{{old('short_description')}}</textarea>
                            @error('short_description')
                                <div class="text-danger">
                                    {{$message}}                                            
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>

                <div class="card shadow mb-4">
                     <div class="card-body">
                           <div class="form-group">
                             <label for="meta_title">Meta Title</label>
                            <input type="text"  id="meta_title" class="form-control  @error('meta_title') is-invalid @enderror" name="meta_title" placeholder="Meta Title" value="{{old('meta_title')}}">        
                                @error('meta_title')
                                    <div class="text-danger">
                                        {{$message}}                                            
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                            <label for="meta_keyword">Meta Keywords</label>
                            <textarea class="form-control @error('meta_keyword') is-invalid @enderror" id="meta_keyword" placeholder="Meta Keywords" name="meta_keyword">{{old('meta_keyword')}}</textarea>
                            @error('meta_keyword')
                                <div class="text-danger">
                                    {{$message}}                                            
                                </div>
                            @endif
                            </div>
                            <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" placeholder="Meta Description" name="meta_description">{{old('meta_description')}}</textarea>
                            @error('meta_description')
                                <div class="text-danger">
                                    {{$message}}                                            
                                </div>
                            @endif
                            </div>
                     </div>
                </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="status">Select Status*</label>
                                <select name="status" id="status" required="" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="published" selected>Published</option>
                                    <option value="draft">Draft</option>
                                </select>
                                
                                @error('status')
                                    <div class="text-danger">
                                        {{$message}}                                            
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="user_id">Select Author*</label>
                                <select name="user_id" id="user_id" required="" class="form-control">
                                    <option value="">Select Author</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" {{(auth()->user()->id == $user->id) ? 'selected="selected"' : ''}}>{{$user->name}}</option>
                                    @endforeach
                                </select>
                                
                                @error('user_id')
                                    <div class="text-danger">
                                        {{$message}}                                            
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>                    

                    @if($categories->count())
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h1 class="h5  text-gray-800 m-0">Categories</h1>
                            </div>
                            <div class="card-body">
                                    @php
                                      $cats = (old('cat')) ? old('cat') : array(); 
                                    @endphp
                                    @foreach($categories as $cat)
                                    <div class="custom-control custom-checkbox small">
                                        <input id="{{ $cat->name }}{{ $cat->id }}" type="checkbox" {{(in_array($cat->id, $cats)) ? 'checked="checked"' : ''}} class=" custom-control-input" name="cat[]" value="{{$cat->id}}">
                                        <label for="{{ $cat->name }}{{ $cat->id }}" class="custom-control-label">{{ $cat->name }}</label>
                                    </div>
                                    <div style="padding-left: 9px;">  
                                        
                                        @foreach($cat->children as $subcat)                                              
                                                <div class="custom-control custom-checkbox small">
                                                    <input id="{{ $subcat->name }}{{ $subcat->id }}" type="checkbox" {{(in_array($subcat->id, $cats)) ? 'checked="checked"' : ''}} class=" custom-control-input" name="cat[]" value="{{$subcat->id}}">
                                                    <label for="{{ $subcat->name }}{{ $subcat->id }}" class="custom-control-label">{{ $subcat->name }}</label>
                                                </div>       
                                                    <div style="padding-left: 9px;">                                 
                                                @foreach($subcat->children as $subcatsub)                                                
                                                        <div class="custom-control custom-checkbox small">
                                                            <input id="{{ $subcatsub->name }}{{ $subcatsub->id }}" type="checkbox" {{(in_array($subcatsub->id, $cats)) ? 'checked="checked"' : ''}} class=" custom-control-input" name="cat[]" value="{{$subcatsub->id}}">
                                                            <label for="{{ $subcatsub->name }}{{ $subcatsub->id }}" class="custom-control-label">{{ $subcatsub->name }}</label>
                                                        </div>
                                                @endforeach
                                                    </div>
                                        @endforeach
                                    </div>
                                    @endforeach
                                    @error("cat.*")
                                        {{$message}}
                                    @enderror
                            </div>
                        </div>
                    @endif
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h1 class="h5  text-gray-800 m-0">Featured Image</h1>
                        </div>
                        <div class="card-body">
                            <input type="hidden" id="featured_image" name="featured_image">
                            <div class="file-upload" id="lfm" data-input="featured_image" data-preview="lfm" >
                                Upload Image
                            </div>
                            @error('featured_image')
                                <div class="text-danger">
                                    {{$message}}                                            
                                </div>
                            @endif
                            <a href="javascript:void(0)" class="text-danger mt-2 d-inline-block" onclick="removeImage()">Remove Image</a>
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

@section('scripts')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>

<script>
    var options = {
        filebrowserImageBrowseUrl: '{{ route("unisharp.lfm.show", ["type" => "Images"])}}',
        filebrowserImageUploadUrl: '{{ route("unisharp.lfm.upload", ["type" => "Images", "_token" => ''])}}',
        filebrowserBrowseUrl: '{{ route("unisharp.lfm.show", ["type" => "Files"])}}',
        filebrowserUploadUrl: '{{ route("unisharp.lfm.upload", ["type" => "Files", "_token" => ''])}}'
    };
    $(document).ready(function(){
        CKEDITOR.replace('ckeditor1',  options)
    })
    var route_prefix = "{{route('unisharp.lfm.show')}}";
    $('#lfm').filemanager('image', {prefix: route_prefix});
    function removeImage() {
        $('#featured_image').val('');
        $('#lfm').html('Upload')
    }
</script>
@endsection



