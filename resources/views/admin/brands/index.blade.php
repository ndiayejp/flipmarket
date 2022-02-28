@extends('admin.admin_master')
@section('admin')
<div class="container-full">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="box">
          <div class="box-header">
            <h4 class="box-title align-items-start flex-column">
              {{__('All brands')}}
            </h4>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-12">
                    <table class="table table-bordered table-striped " style="width: 100%;" role="grid">
                      <thead>
                        <tr role="row">
                          <th style="width: 109px;">Brand french</th>
                          <th style="width: 116px;">Brand english</th>
                          <th style="width: 106px;">Image</th>
                          <th style="width: 113px;">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($brands as $brand )
                        <tr role="row" class="odd">
                          <td class="sorting_1">{{ $brand->brand_name_fr}}</td>
                          <td>{{ $brand->brand_name_en}}</td>
                          <td><div style="width:100px; height:100px; margin:0 auto;background:url({{asset('uploads/brands_images/'.$brand->brand_image)}});background-repeat:no-repeat;background-position:center; background-size:cover;">

                          </div>
                          <td>
                            <a href="{{route('brand.edit',$brand)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> </a>
                            <a href="{{route('brand.destroy',$brand)}}" class="btn btn-danger" id='delete-brand'><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
          <div class="box">
            <div class="box-header">
              <h4 class="box-title align-items-start flex-column">
                {{__('Add new brand')}}
              </h4>
            </div>
            <div class="box-body">
              <form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="brand_name_fr">Brand name_fr</label>
                  <input type="text" name="brand_name_fr" id="brand_name_fr" class="form-control @error('brand_name_fr') is-invalid @enderror">
                  @error('brand_name_fr')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="brand_name_en">Brand name_en</label>
                  <input type="text" name="brand_name_en" id="brand_name_en" class="form-control @error('brand_name_en') is-invalid @enderror">
                  @error('brand_name_en')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="brand_image">Brand image</label>
                  <input type="file" name="brand_image" id="brand_image" class="form-control @error('brand_image') is-invalid @enderror">
                  @error('brand_image')
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
<script>
  $(document).on('click','#delete-brand',function(e){
  e.preventDefault();
  link = $(this).attr('href');
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
  if (result.isConfirmed) {
  window.location.href=link
  Swal.fire( 'Deleted!', 'Your file has been deleted.', 'success')
  }
  })
  })
</script>
@endsection
