@extends('frontend.main_master')
@section('content')
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        @include('frontend.partials.sidebar_user')
      </div>
      <div class="col-md-9">
        <div class="detail-block">
          <form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="info-title" for="email">{{ __('Email') }} <span>*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror unicase-form-control text-input"
              id="email" value="{{isset(Auth::user()->email) ? Auth::user()->email : old('email')}}" name="email" autofocus>
            @error('email')
            <span class="invalid-feedback">{{ $message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label class="info-title" for="email">{{ __('Phone') }} <span>*</span></label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror unicase-form-control text-input"
              id="phone" value="{{isset(Auth::user()->phone) ? Auth::user()->phone : old('phone')}}" name="phone" autofocus>
            @error('phone')
            <span class="invalid-feedback">{{ $message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label class="info-title" for="name">{{ __('Name') }} <span>*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror unicase-form-control text-input"
              id="name" value="{{isset(Auth::user()->name) ? Auth::user()->name : old('name')}}" name="name" autofocus>
            @error('name')
            <span class="invalid-feedback">{{ $message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label class="info-title" for="profile_photo_path">{{ __('Avatar') }}  </label>
            <input type="file" class="form-control @error('profile_photo_path') is-invalid @enderror unicase-form-control text-input" id="profile_photo_path"
                name="profile_photo_path" autofocus>
            @error('profile_photo_path')
            <span class="invalid-feedback">{{ $message}}</span>
            @enderror
          </div>
          <button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{ __('Update profile') }}</button>
          </form>

        </div>
      </div>
    </div>
  </div>
  <br><br>
</div>
@endsection
