@extends('admin.admin_master')
@section('admin')
<div class="container-full">
  <div class="content-header">
    <div class="d-flex align-items-center">
      <div class="mr-auto">
        <h3 class="page-title">Profile</h3>
        <div class="d-inline-block align-items-center">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="mdi mdi-home-outline"></i></a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-12 col-lg-12 col-xl-12">
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="display: flex; align-items:center;justify-content:space-between;">
              <div>
                <h3 class="widget-user-username">{{$adminData->name}}</h3>
                <h6 class="widget-user-desc">{{$adminData->email}}</h6>
              </div>
              <div><a href="{{route('admin.profile.edit',$adminData->id)}}" class="btn btn-light btn-rounded" ><i class="fa fa-pencil"></i> Edit profile</a></div>
            </div>
            <div class="widget-user-image" style="background: url('{{ !empty($adminData->profile_photo_path) ? url('uploads/admin_images/'.    $adminData->profile_photo_path) : url('uploads/no_image.jpg')}}') no-repeat center center;background-size:cover;display:inline-block;width:80px;height:80px;">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">12K</h5>
                    <span class="description-text">FOLLOWERS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 br-1 bl-1">
                  <div class="description-block">
                    <h5 class="description-header">550</h5>
                    <span class="description-text">FOLLOWERS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">158</h5>
                    <span class="description-text">TWEETS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
      </div>
    </div>
    <!-- /.row -->
   </section>
</div>
@endsection
