@php
    $setting__type= 'registration';
    $settings = $globalsettings->get($setting__type);

@endphp

<form class="user" method="POST" action="{{ route('savesettings') }}">
    @csrf
    <input type="hidden" name="name" value="{{$setting__type}}">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Registration Settings</h6>
            <button type="submit" class="btn btn-primary btn-md px-5">
                {{ __('Save') }}
            </button>
        </div>
        <div class="card-body">
            @if(session('msg'))
            <div class="alert alert-{{session('msg_type')}}">
                {{session('msg')}}                                            
            </div>
            @endif
            @error('name')
            <div class="alert alert-danger">
                {{$message}}                                            
            </div>
            @endif

        <div class="row">
            <div class="col-md-6">                    
                <div class="form-group">

                    <div class="custom-control custom-checkbox small">
                        <input id="email_verification_on_reg" type="checkbox" class=" custom-control-input @error('value.email_verification_on_reg') is-invalid @enderror" name="value[email_verification_on_reg]" value="1" @if(old('value.email_verification_on_reg')) checked="checked"  @else {{ (isset($settings['email_verification_on_reg'])) ? 'checked="checked"' : '' }}" @endif >
                        <label for="email_verification_on_reg" class="custom-control-label">{{ __('Allow Email Verification During Registration') }}</label>
                            @error("value.email_verification_on_reg")
                                {{$message}}
                            @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">                    

            </div>
        </div>

        </div>
    </div>
</form>