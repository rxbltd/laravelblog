@extends('layouts.backend.app')
@section('title', 'Tag')

@push('css')

@endpush
@section('content')
     <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Tag</a>
          <span class="breadcrumb-item active">Add Tag</span>
        </nav>
      </div><!-- br-pageheader -->

    <div class="br-pagebody">
      <div class="br-section-wrapper">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Edit Tag</h6>
      <form action="{{ route('admin.tag.update',$tag->id) }}" method="POST">
              @csrf
              @method('PUT')
         <div class="form-layout form-layout-1">
          <div class="row mg-b-25">
            <div class="col-lg-8">
              <div class="form-group">
                <label class="form-control-label">Enter Tag Name: <span class="tx-danger">*</span></label>
                <input type="text" class="form-control" name="name" value="{{ $tag->name }}">
              </div>
            </div><!-- col-4 -->
          </div><!-- row -->
          <div class="row mg-t-30">
            <div class="col-sm-8 mg-l-auto">
              <div class="form-layout-footer">
                  <button class="btn btn-secondary" href="{{ route('admin.tag.index') }}">Cancel</button>
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