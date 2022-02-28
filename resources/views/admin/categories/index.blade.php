@extends('admin.admin_master')
@section('admin')
<div class="container-full">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <div style="display: flex;justify-content:space-between">
              <h4 class="box-title align-items-start flex-column">
                {{__('All categories')}}
              </h4>
              <a href="{{route('category.create')}}" class="btn btn-default"><i class="fa fa-plus"></i> Add category</a>
            </div>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <div id="example5_wrapper" class="  container-fluid">
                <div class="row">
                  <div class="col-sm-12">
                    <table  class="table table-bordered table-striped " style="width: 100%;" role="grid">
                      <thead>
                        <tr role="row">
                          <th style="width: 109px;">Category french</th>
                          <th style="width: 116px;">Category english</th>
                          <th style="width: 106px;">Icon</th>
                          <th style="width: 113px;">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($categories as $category )
                        <tr role="row" class="odd">
                          <td class="sorting_1">{{ $category->category_name_fr}}</td>
                          <td>{{ $category->category_name_en}}</td>
                          <td>
                            <i class="{{ $category->category_icon}} fa-2x"></i>
                          <td>
                            <a href="{{ route('category.edit',$category)  }}" class="btn btn-primary"><i class="fa fa-pencil"></i> </a>
                            <a href="{{route('category.destroy',$category)}}" class="btn btn-danger" id='delete-category'><i
                                class="fa fa-trash"></i></a>
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
    </div>
  </section>
</div>
@endsection
@section('footer-script')
<script src="{{asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
<script src="{{asset('backend/js/pages/data-table.js')}}"></script>
<script>
  $(document).on('click','#delete-category',function(e){
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
