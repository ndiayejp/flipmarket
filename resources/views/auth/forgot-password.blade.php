@extends('frontend.main_master')
@section('content')
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="{{route('home')}}">Accueil</a></li>
        <li class="active">Mot de passe oublié</li>
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
          <h4 class="">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link
          that will allow you to choose a new one.') }}</h4>
          @if (session('status'))
          <div class="mb-4 font-medium text-sm text-success">
            {{ session('status') }}
          </div>
          @endif
          <form method="POST" action="{{ route('password.email') }}" class="register-form outer-top-xs" role="form">
            @csrf
            <div class="form-group">
              <label class="info-title" for="email">{{ __('Email') }} <span>*</span></label>
              <input type="email"
                class="form-control @error('email') is-invalid @enderror unicase-form-control text-input"
                id="exampleInputEmail1" value="{{old('email')}}" name="email" autofocus>
              @error('email')
              <span class="invalid-feedback">{{ $message}}</span>
              @enderror
            </div>


            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{ __('Email Password Reset Link') }}</button>
          </form>
        </div>
        <!-- Sign-in -->


      </div><!-- /.row -->
    </div><!-- /.sigin-in-->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">

      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          <div class="item m-t-15">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
            </a>
          </div>
          <!--/.item-->

          <div class="item m-t-10">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
            </a>
          </div>
          <!--/.item-->
        </div><!-- /.owl-carousel #logo-slider -->
      </div><!-- /.logo-slider-inner -->

    </div><!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
  </div><!-- /.container -->
</div>
@endsection
