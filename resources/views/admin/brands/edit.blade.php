@extends('admin.admin_master')
@section('admin')
<div class="container-full">
  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h4 class="box-title align-items-start flex-column">
              {{__('Edit brand')}}
            </h4>
          </div>
          <div class="box-body">
            <form action="{{route('brand.update',$brand)}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="brand_name_fr">Brand name_fr</label>
                <input type="text" name="brand_name_fr" id="brand_name_fr" value="{{$brand->brand_name_fr}}"
                  class="form-control @error('brand_name_fr') is-invalid @enderror">
                @error('brand_name_fr')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="brand_name_en">Brand name_en</label>
                <input type="text" name="brand_name_en" id="brand_name_en" value="{{$brand->brand_name_en}}"
                  class="form-control @error('brand_name_en') is-invalid @enderror">
                @error('brand_name_en')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="brand_image">Brand image</label>
                <input type="file" name="brand_image" id="brand_image"
                  class="form-control @error('brand_image') is-invalid @enderror">
                @error('brand_image')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>
@endsection
@section('footer-script')
<script src="{{asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
<script src="{{asset('backend/js/pages/data-table.js')}}"></script>
@endsection
