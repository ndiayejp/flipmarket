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
          <form method="POST" action="{{route('user.store.password')}}">
            @csrf
            <div class="form-group">
              <label class="info-title" for="email">{{ __('Current password') }} <span>*</span></label>
              <input class="form-control" type="password" id="current_password" name="oldpassword">
              @error('oldpassword')
              <span class="invalid-feedback">{{ $message}}</span>
              @enderror
            </div>

             <div class="form-group">
              <label class="info-title" for="email">{{ __('New Password') }} <span>*</span></label>
              <input class="form-control" type="password" id="password" name="password">
              @error('password')
              <span class="invalid-feedback">{{ $message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label class="info-title" for="email">{{ __('Confirm password') }} <span>*</span></label>
              <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
              @error('password_confirmation')
              <span class="invalid-feedback">{{ $message}}</span>
              @enderror
            </div>

            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{ __('Update password')
              }}</button>
          </form>

        </div>
      </div>
    </div>
  </div>
  <br><br>
</div>
@endsection
