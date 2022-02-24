@extends('frontend.main_master')
@section('content')
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="{{route('home')}}">{{__('Home')}}</a></li>
        <li class="active">{{__('Reset password')}}</li>
      </ul>
    </div><!-- /.breadcrumb-inner -->
  </div><!-- /.container -->
</div>
<div class="body-content">
  <div class="container">
    <div class="sign-in-page">
      <div class="row">
        <!-- Sign-in -->
        <div class="col-md-12 col-sm-12 sign-in">
          <h4 class="">{{ __('Reset password')}}</h4>

          @if (session('status'))
          <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
          </div>
          @endif
          <form method="POST" action="{{ route('password.update') }}"
            class="register-form outer-top-xs" role="form">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="form-group">
              <label class="info-title" for="email">{{ __('Email') }} <span>*</span></label>
              <input type="email"
                class="form-control @error('email') is-invalid @enderror unicase-form-control text-input"
                id="exampleInputEmail1" value="{{isset($request->email) ? $request->email : old('email')}}" name="email" autofocus>
              @error('email')
              <span class="invalid-feedback">{{ $message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label class="info-title" for="password">Mot de passe <span>*</span></label>
              <input type="password"
                class="form-control @error('password') is-invalid @enderror unicase-form-control text-input"
                name="password" id="password">
              @error('password')
              <span class="invalid-feedback">{{ $message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label class="info-title" for="password">Mot de passe <span>*</span></label>
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror unicase-form-control text-input"
                name="password_confirmation" id="password_confirmation">
              @error('password_confirmation')
              <span class="invalid-feedback">{{ $message}}</span>
              @enderror
            </div>

            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{ __('Reset Password') }}</button>
          </form>
        </div>
        <!-- Sign-in -->
      </div><!-- /.row -->
    </div><!-- /.sigin-in-->
    <br>
  </div><!-- /.container -->
</div>
@endsection
