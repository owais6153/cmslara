@extends('layouts.admin.app', ['title' => 'Add New Page'])



@section('content')
    <div class="container">
        @if(session('msg'))
        <div class="alert alert-{{session('msg_type')}}">
            {{session('msg')}}                                            
        </div>
        @endif
   
         <h1 class="h3 mb-4 text-gray-800">Add New Page</h1>

        <form action="{{route('pages.store')}}" method="POST" autocomplete="off">
               @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <div class="form-group w-100 mb-0">
                            
                            <input type="text"  required="" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Enter Page Name*" value="{{old('name')}}">        
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
                            <input type="text" required="" class="form-control @error('slug') is-invalid @enderror" id="slug" aria-describedby="slug" placeholder="Enter Page Slug" name="slug" value="{{old('slug')}}">
                            @error('slug')
                                <div class="text-danger">
                                    {{$message}}                                            
                                </div>
                            @endif
                            </div>

                            <div class="form-group">
                            <label for="ckeditor1">Description</label>
                            <textarea class=" form-control @error('description') is-invalid @enderror" id="ckeditor1" placeholder="Description"  name="description">
                            </textarea>
                            @error('description')
                                <div class="text-danger">
                                    {{$message}}                                            
                                </div>
                            @endif
                            </div>
                            <div class="form-group">
                            <label for="short_description">Short Description</label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" placeholder="Short Description" name="short_description">
                            </textarea>
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
                                <label for="template">Select Template*</label>
                                <select name="template" id="template" required="" class="form-control">
                                    <option value="">Select Template</option>
                                    @if(!empty($files))
                                        @foreach ($files as $file)
                                            <option value="{{$file}}">{{$file}}</option>
                                        @endforeach
                                    @endif
                                </select>

                                @error('template')
                                    <div class="text-danger">
                                        {{$message}}                                            
                                    </div>
                                @endif
                            </div>
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

<script>

</script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '{{env('FILE_MANAGER_URL')}}/filemanager?type=Images',
        filebrowserImageUploadUrl: '{{env('FILE_MANAGER_URL')}}/filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '{{env('FILE_MANAGER_URL')}}/filemanager?type=Files',
        filebrowserUploadUrl: '{{env('FILE_MANAGER_URL')}}/filemanager/upload?type=Files&_token='
    };
    $(document).ready(function(){
        $('#template option:nth-child(2)').attr('selected', 'selected');        
        $('#name').blur(function (e) {
            if ($('#slug').val() == '') {
                $('#slug').val(
                $(this).val().toLowerCase()
                 .replace(/[^\w ]+/g, '')
                 .replace(/ +/g, '-')
                );
            }
        })
        CKEDITOR.replace('ckeditor1',  options)
    })

</script>
@endsection



