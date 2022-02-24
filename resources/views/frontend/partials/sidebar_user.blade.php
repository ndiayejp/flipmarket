<br>
<div
  style="width:150px; height:150px; margin:0 auto; background:url({{
        !empty(Auth::user()->profile_photo_path) ? asset('uploads/user_images/'.Auth::user()->profile_photo_path): asset('uploads/no-image.jpg') }}); background-repeat:no-repeat;background-position:center; background-size:cover; border-radius:50%">
</div><br>
<ul class="list-group list-group-flush">
  <a href="{{route('dashboard')}}" class="btn btn-block btn-primary"> {{__('Home')}}</a>
  <a href="{{route('user.profile')}}" class="btn btn-block btn-primary"> {{__('Update Profil')}}</a>
  <a href="{{route('user.update.password')}}" class="btn btn-block btn-primary"> {{__('Change password')}}</a>
  <a href="{{route('user.logout')}}" class="btn btn-block btn-danger"> {{__('Logout')}}</a>
</ul>
