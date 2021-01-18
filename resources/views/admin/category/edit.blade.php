@extends('layouts.backend.app')
@section('title', 'Category')

@push('css')

@endpush
@section('content')
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Category</a>
          <span class="breadcrumb-item active">Add Category</span>
        </nav>
      </div><!-- br-pageheader -->


    <div class="br-pagebody">
      <div class="br-section-wrapper">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Edit Category</h6>
        
        <form action="{{ route('admin.category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
         <div class="form-layout form-layout-1">
          <div class="row mg-b-25">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name" value="{{ $category->name }}" >
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-6">
              <div class="form-group">
               <label class="form-control-label">Category Images: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image" value="McDoe">
              </div>
            </div><!-- col-4 -->
          </div><!-- row -->
         <div class="row mg-t-30">
          <div class="mg-l-auto">
            <div class="form-layout-footer">
              <button class="btn btn-secondary" href="{{ route('admin.category.index') }}">Cancel</button>
              <button class="btn btn-info">Submit</button>
            </div><!-- form-layout-footer -->
           </div><!-- col-8 -->
          </div>
         </div><!-- form-layout -->
         </form>
        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->

@push('js')
   
@endpush
@endsection