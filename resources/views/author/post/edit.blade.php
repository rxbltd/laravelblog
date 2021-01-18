@extends('layouts.backend.app')
@section('title', 'Post')

@push('css')
    <link href="{{ asset('/assets/backend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/lib/medium-editor/medium-editor.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/lib/medium-editor/default.css') }}" rel="stylesheet">
@endpush
@section('content')
     <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Post</a>
          <span class="breadcrumb-item active">Edit Post</span>
        </nav>
      </div><!-- br-pageheader -->

    <div class="br-pagebody">
      <div class="br-section-wrapper">
    <form action="{{ route('author.post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14">Edit This Post</h6>
            <div class="form-layout form-layout-4">
              <div class="row">
                <label class="form-control-label">Post Title: <span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}" placeholder="Enter Post Title">
              </div><!-- row -->
              <div class="row mg-t-20">
                <label class="form-control-label">Featured Image: <span class="tx-danger">*</span></label>
                  <input type="file" class="form-control" name="image" id="image">
              </div>
              <div class="form-layout-footer mg-t-10 mg-l-auto">
                <label class="ckbox ckbox-success">
                  <input type="checkbox" name="status" id="publish" class="filled-in" value="1" {{ $post->status == true ? 'checked' : '' }}><span>Publish</span>
                </label>
              </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
          </div><!-- col-6 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xl-4 mg-t-20 mg-xl-t-0">
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14">Category & Tags</h6>
            <div class="form-layout form-layout-5">

              <div class="row mg-t-20
              {{ $errors->has('categories') ? 'focused error' : '' }}">
                  <select class="form-control select2" name="categories[]" data-placeholder="Select Category" multiple>

                    <option label="Select Category"></option>

                    @foreach ($categories as $category)
                      <option
                        @foreach ($post->categories as $postCategory)
                          {{ $postCategory->id == $category->id ? 'selected' : '' }}
                        @endforeach
                    value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
              </div><!-- row --> 
              <div class="row mg-t-20 
              {{ $errors->has('tags') ? 'focused error' : '' }}">
                  <select class="form-control select2" name="tags[]" data-placeholder="Choose Tag" multiple>
                    <option label="Choose Tag"></option>
                    @foreach ($tags as $tag)
                    <option 
                      @foreach ($post->tags as $postTag)
                          {{ $postTag->id == $tag->id ? 'selected' : '' }}
                      @endforeach
                    value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                  </select>
              </div><!-- row -->

              <div class="row mg-t-15">
                <div class="mg-l-auto">
                  <div class="mg-t-10 form-layout-footer">
                    <a class="btn btn-secondary" href="{{ route('author.post.index') }}">Back</a>
                    <button class="btn btn-info">Update Post</button>
                  </div><!-- form-layout-footer -->
                </div><!-- col-8 -->
              </div>
            </div><!-- form-layout -->
          </div><!-- col-6 -->
        </div><!-- row -->

        <div class="mg-t-20 mg-xl-t-0">
          <div class="form-layout form-layout-6 mt-lg-4">
           
         <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Post Body</h6>

          <div class="body">
            <textarea id="summernote" name="body">
              {{ $post->body }}
            </textarea>
          </div>


          </div><!-- form-layout -->
        </div>
    </form>
      </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->


@push('js')
     <script src="{{ asset('/assets/backend/lib/summernote/summernote-bs4.min.js') }}"></script>
     <script src="{{ asset('/assets/backend/lib/medium-editor/medium-editor.js') }}"></script>
     
     <script>

      $('#summernote').summernote({
        height: 150,
        tooltip :false
      })
    </script>
@endpush
@endsection