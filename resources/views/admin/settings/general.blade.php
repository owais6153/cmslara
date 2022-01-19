
<form class="user" method="POST" action="{{ route('settings.save') }}">
    @csrf
    <input type="hidden" name="name" value="{{$type}}">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">General Settings</h6>
            <button type="submit" class="btn btn-primary btn-md px-5">
                {{ __('Save') }}
            </button>
        </div>
        <div class="card-body">


        <div class="row">
            <div class="col-md-6">                    
                <div class="form-group">
                    <label for="site_name">{{ __('Site Name*') }}</label>
                    <input id="site_name" type="text" class="form-control  @error('value.site_name') is-invalid @enderror" name="value[site_name]" 
                    @if(old('value.site_name')) value="{{old('value.site_name')}}"
                    @else value="{{ (isset($Settings['site_name'])) ? $Settings['site_name'] : '' }}" @endif required="" placeholder="{{ __('Site Name') }}"  autocomplete="site_name" autofocus>
                    @error("value.site_name")
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="col-md-6">                    
                <div class="form-group">
                    <label for="site_title">{{ __('Site Title*') }}</label>
                    <input id="site_title" type="text" class="form-control  @error('value.site_title') is-invalid @enderror" name="value[site_title]" @if(old('value.site_title')) value="{{old('value.site_title')}}"
                    @else value="{{ (isset($Settings['site_title'])) ? $Settings['site_title'] : '' }}"  @endif placeholder="{{ __('Site Title') }}"  autocomplete="site_title"  autofocus>
                    @error("value.site_title")
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="col-md-6">                    
                <div class="form-group">
                    <label for="home_page">{{ __('Home Page*') }}</label>

                    <select class="form-control" id="home_page" name="value[home_page]">
                        <option value="default"  {{ (isset($Settings['home_page']) && $Settings['home_page'] == 'default') ? 'selected="selected"' : '' }}>Default</option>
                        @foreach($pages as $page)
                            <option value="{{$page->slug}}" {{ (isset($Settings['home_page']) && $Settings['home_page'] == $page->slug) ? 'selected="selected"' : '' }}>{{$page->name}}</option>
                        @endforeach
                    </select>
                    @error("value.home_page")
                        {{$message}}
                    @enderror

                </div>
            </div>
        </div>

        </div>
    </div>
</form>