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
              {{__('Add new category')}}
            </h4>
          </div>
          <div class="box-body">
            <form action="{{ route('category.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="category_name_fr">category name_fr</label>
                <input type="text" name="category_name_fr" id="category_name_fr"
                  class="form-control @error('category_name_fr') is-invalid @enderror">
                @error('category_name_fr')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="category_name_en">category name_en</label>
                <input type="text" name="category_name_en" id="category_name_en"
                  class="form-control @error('category_name_en') is-invalid @enderror">
                @error('category_name_en')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="category_icon">category icon</label>
                <input type="text" name="category_icon" id="category_icon"
                  class="form-control @error('category_icon') is-invalid @enderror">
                @error('category_icon')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror

              </div>
              <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary">
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
