@extends('frontend.main_master')
@section('content')
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="{{route('home')}}">Accueil</a></li>
        <li class="active">Connexion</li>
      </ul>
    </div><!-- /.breadcrumb-inner -->
  </div><!-- /.container -->
</div>
<div class="body-content">
  <div class="container">
    <div class="sign-in-page">
      <div class="row">
        <!-- Sign-in -->
        <div class="col-md-6 col-sm-6 sign-in">
          <h4 class="">Connexion</h4>
          <p class="">Bonjour, Bienvenue sur votre compte.</p>
          <div class="social-sign-in outer-top-xs">
            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i>   Connexion Facebook</a>
            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i>  Connexion Twitter</a>
          </div>
          @if (session('status'))
            <div class="my-4 font-medium text-sm text-success">
              {{ session('status') }}
            </div>
          @endif
          <form method="POST" action="{{ isset($guard) ? url($guard.'/login') :  route('login') }}" class="register-form outer-top-xs" role="form">
            @csrf
            <div class="form-group">
              <label class="info-title" for="email">Email   <span>*</span></label>
              <input type="email" class="form-control @error('email') is-invalid @enderror unicase-form-control text-input" id="exampleInputEmail1" value="{{old('email')}}" name="email" autofocus>
              @error('email')
                <span class="invalid-feedback">{{ $message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label class="info-title" for="password">Mot de passe <span>*</span></label>
              <input type="password" class="form-control @error('password') is-invalid @enderror unicase-form-control text-input" name="password" id="password">
              @error('password')
              <span class="invalid-feedback">{{ $message}}</span>
              @enderror
            </div>
            <div class="checkbox outer-xs">
              <label>
                <input type="checkbox" name="remember" id="remember_me">Se souvenir de moi!
              </label>
              @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="forgot-password pull-right">Mot de passe oublié?</a>
              @endif
            </div>
            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{ __("Login") }}</button>
          </form>
        </div>
        <!-- Sign-in -->

        <!-- create a new account -->
        <div class="col-md-6 col-sm-6 create-new-account">
          <h4 class="checkout-subtitle">Créér un compte</h4>
          <p class="text title-tag-line">Créer un nouveau compte.</p>
          <form method="POST" action="{{ route('register') }}" class="register-form outer-top-xs" role="form">
            @csrf
            <div class="form-group">
              <label class="info-title" for="email">Email   <span>*</span></label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror unicase-form-control text-input" id="email">
              @error('email')
              <span class="invalid-feedback">{{ $message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label class="info-title" for="phone">Téléphone <span>*</span></label>
              <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror unicase-form-control text-input" id="phone">
              @error('phone')
              <span class="invalid-feedback">{{ $message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label class="info-title" for="name">Pseudo <span>*</span></label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror unicase-form-control text-input" id="name">
              @error('name')
              <span class="invalid-feedback">{{ $message}}</span>
              @enderror
            </div>

            <div class="form-group">
              <label class="info-title" for="password">Mot de passe <span>*</span></label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror unicase-form-control text-input" id="password">
              @error('password')
              <span class="invalid-feedback">{{ $message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label class="info-title" for="password_confirmation">Confirmer le mot de passe <span>*</span></label>
              <input type="email" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror unicase-form-control text-input" id="password_confirmation">
              @error('password_confirmation')
              <span class="invalid-feedback">{{ $message}}</span>
              @enderror
            </div>
            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">S'enregistrer</button>
          </form>


        </div>
        <!-- create a new account -->
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
