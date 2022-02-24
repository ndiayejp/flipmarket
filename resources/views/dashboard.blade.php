@extends('frontend.main_master')
@section('content')
<div class="body-content">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        @include('frontend.partials.sidebar_user')
      </div>
      <div class="col-md-9">
        <br>

        <div class="detail-block">
          <p> {{__('Hi')}}..... <strong>{{Auth::user()->name}}</strong></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
