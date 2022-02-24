@extends('admin.admin_master')
@section('admin')
<div class="container-full">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="box">
          <div class="box-header">
            <h4 class="box-title align-items-start flex-column">
              {{ __('Update password')}}
            </h4>
          </div>
          <div class="box-body">
            <form method="POST" action="{{route('admin.updatePassword')}}">
              @csrf
              <div class="form-group">
                <div class="row">
                  <div class="col-6">
                    <label class="col-form-label">{{__('Current password')}}</label>
                    <input class="form-control" type="password" id="current_password" name="oldpassword">
                  </div>
                  <div class="col-6">
                    <label class="col-form-label ">{{__('New password')}}</label>
                    <input class="form-control" type="password" name="password" id="password">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-12">
                    <label class="col-form-label">{{__('Confirm new password')}}</label>
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="row">
                  <div class="col-12">
                    <div class="text-xs-right">
                      <button type="submit" class="btn btn-rounded btn-info">{{__('Update password')}}</button>
                    </div>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection
