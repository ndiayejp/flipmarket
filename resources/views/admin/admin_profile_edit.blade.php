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
             Editer profil Admin
            </h4>
          </div>
          <div class="box-body">
           <form method="POST" action="{{route('admin.profile.store',$data->id)}}"      enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <div class="row">
                  <div class="col-6">
                    <label class="col-form-label">Email</label>
                    <input class="form-control" type="email" name="email" value="{{$data->email}}">
                  </div>
                  <div class="col-6">
                    <label class="col-form-label ">Nom utilisateur</label>
                    <input class="form-control" type="text" name="name" value="{{$data->name}}">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-6">
                    <label   for="customFile">Image de profil</label>
                    <input type="file" class="form-control"  id="photoProfile" name="profile_photo_path">
                  </div>
                  <div class="col-6">
                    <img src="{{ !empty($data->profile_photo_path) ? url('uploads/admin_images/'.    $data->profile_photo_path) : url('uploads/no_image.jpg')}}" style="width: 100px; height:100px;" id="showImage">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-12">
                    <div class="text-xs-right">
                      <button type="submit" class="btn btn-rounded btn-info">Mettre à jour</button>
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
@section('footer-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#photoProfile').change(function(e){
        var reader = new FileReader()
        reader.onload = function(e){
          $('#showImage').attr('src',e.target.result)
        }
        reader.readAsDataURL(e.target.files['0'])
    })
  })
</script>
@endsection
