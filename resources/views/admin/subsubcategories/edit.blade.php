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
              {{__('Edit subsubcategory')}}
            </h4>
          </div>
          <div class="box-body">
            <form action="{{ route('subsubcategory.update',$subsubcategory) }}" method="post">
              @csrf
              <div class="form-group">
                <label for="subsubcategory_name_fr">Subsubcategory name_fr</label>
                <input type="text" name="subsubcategory_name_fr" id="subsubcategory_name_fr" value="{{$subsubcategory->subsubcategory_name_fr}}"
                  class="form-control @error('subsubcategory_name_fr') is-invalid @enderror">
                @error('subsubcategory_name_fr')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="subsubcategory_name_en">Subsubcategory name_en</label>
                <input type="text" name="subsubcategory_name_en" id="subsubcategory_name_en" value="{{$subsubcategory->subsubcategory_name_en}}"
                  class="form-control @error('subsubcategory_name_en') is-invalid @enderror">
                @error('subsubcategory_name_en')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="category">Category </label>
                <select name="category_id" id="category_id" class="form-control">
                  <option value="">{{__('Select category')}}</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}" @if($category->id === $subsubcategory->category_id) selected @endif>{{$category->category_name_fr}}</option>
                  @endforeach
                </select>
                @error('category_id')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="category">SubCategory </label>
                <select name="subcategory_id" id="subcategory_id" class="form-control">
                  <option value="">{{__('Select Subcategory')}}</option>
                  @foreach($subcategories as $subcategory)
                  <option value="{{$subcategory->id}}" @if($subcategory->id === $subsubcategory->sub_category_id) selected @endif>{{$subcategory->subcategory_name_fr}}</option>
                  @endforeach
                </select>
                @error('subcategory_id')
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('select[name="category_id"]').on('change',function(e){
        const category_id = $(this).val()
        if(category_id){
          $.ajax({
            url:"{{ url('/admin/subcategory/ajax') }}/"+category_id,
            type:'GET',
            dateType:'json',
            success:function(data){
              var d = $('select[name="subcategory_id"]').empty();
              $.each(JSON.parse(data),function(key,value){
                $('select[name="subcategory_id"]').append(
                  '<option value="'+value.id+'">'+value.subcategory_name_fr+'</option>'
                );
              })
            }
          })
        }else{
          alert('danger')
        }
    })
  })
</script>
@endsection
