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
              {{__('Add new subcategory')}}
            </h4>
          </div>
          <div class="box-body">
            <form action="{{ route('subcategory.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="subcategory_name_fr">subcategory name_fr</label>
                <input type="text" name="subcategory_name_fr" id="subcategory_name_fr"
                  class="form-control @error('subcategory_name_fr') is-invalid @enderror">
                @error('subcategory_name_fr')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="subcategory_name_en">subcategory name_en</label>
                <input type="text" name="subcategory_name_en" id="subcategory_name_en"
                  class="form-control @error('subcategory_name_en') is-invalid @enderror">
                @error('subcategory_name_en')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="category">category </label>
                <select name="category_id" id="category_id" class="form-control">
                  <option value="">{{__('Select category')}}</option>
                  @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name_fr}}</option>
                  @endforeach
                </select>
                @error('category_id')
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

