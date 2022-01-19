
@extends('layouts.admin.app', ['title' => 'Edit Blog'])



@section('content')
    <div class="container">
        @if(session('msg'))
        <div class="alert alert-{{session('msg_type')}}">
            {{session('msg')}}                                            
        </div>
        @endif
   
         <h1 class="h3 mb-4 text-gray-800">Edit Blog</h1>

        <form action="{{route('blogs.update', ['blog'=> request('blog') ])}}" method="POST" autocomplete="off" class="user">
            <input type="hidden" name="old_slug" value="{{$blog->slug}}">
               @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <div class="form-group w-100 mb-0">
                            
                            <input type="text"  required="" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Enter Blog Name*" value="{{ (old('name')) ? old('name') : $blog->name }}">        
                                @error('name')
                                    <div class="text-danger">
                                        {{$message}}                                            
                                    </div>
                                @endif
                            </div>
                           
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" required="" class="form-control @error('slug') is-invalid @enderror" id="slug" aria-describedby="slug" placeholder="Enter Blog Slug" name="slug" value="{{ (old('slug')) ? old('slug') : $blog->slug }}">
                            @error('slug')
                                <div class="text-danger">
                                    {{$message}}                                            
                                </div>
                            @endif
                            </div>

                            <div class="form-group">
                            <label for="ckeditor1">Description</label>
                            <textarea class=" form-control @error('description') is-invalid @enderror" id="ckeditor1" placeholder="Description"  name="description">{{ (old('description')) ? old('description') : $blog->description }}</textarea>
                            @error('description')
                                <div class="text-danger">
                                    {{$message}}                                            
                                </div>
                            @endif
                            </div>
                            <div class="form-group">
                            <label for="short_description">Short Description</label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" placeholder="Short Description" name="short_description">{{ (old('short_description')) ? old('short_description') : $blog->short_description }}</textarea>
                            @error('short_description')
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
                                    <option value="published" {{ ($blog->status == 'published') ? 'selected="selected"' : ''}} >Published</option>
                                    <option {{ ($blog->status == 'draft') ? 'selected="selected"' : ''}} value="draft">Draft</option>
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
                                        <option value="{{$user->id}}" {{($blog->user_id == $user->id) ? 'selected="selected"' : ''}}>{{$user->name}}</option>
                                    @endforeach
                                </select>
                                
                                @error('user_id')
                                    <div class="text-danger">
                                        {{$message}}                                            
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block px-5">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    @empty(!$categories)
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h1 class="h5  text-gray-800 m-0">Categories</h1>
                            </div>
                            <div class="card-body">
                                    @php
                                    $cats = (old('cat')) ? old('cat') : array();                                     
                                    foreach($blog->categories as $ccat){
                                        $cats[] = $ccat->id;
                                    }
                                    @endphp
                                    @foreach($categories as $cat)
                                    <div class="custom-control custom-checkbox small">
                                        <input id="cat" type="checkbox" {{(in_array($cat->id, $cats)) ? 'checked="checked"' : ''}} class=" custom-control-input" name="cat[]" value="{{$cat->id}}">
                                        <label for="cat" class="custom-control-label">{{ $cat->name }}</label>
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
                            <input type="hidden" id="featured_image" value="{{$blog->featured_image}}" name="featured_image">
                            <div class="file-upload" id="lfm" data-input="featured_image" data-preview="lfm" >
                                @empty($blog->featured_image)
                                    Upload Image
                                @else
                                     <img src="{{$blog->featured_image}}" style="height: 5rem;">
                                @endif
                               
                            </div>
                            @error('featured_image')
                                <div class="text-danger">
                                    {{$message}}                                            
                                </div>
                            @endif
                            <a href="javascript:void(0)" class="text-danger mt-2 d-inline-block" onclick="removeImage()">Remove Image</a>
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
        $('#lfm').html('Upload Image')
    }
        $('#name').blur(function (e) {
            if ($('#slug').val() == '') {
                $('#slug').val(
                $(this).val().toLowerCase()
                 .replace(/[^\w ]+/g, '')
                 .replace(/ +/g, '-')
                );
            }
        })
</script>
@endsection



