@extends('layouts.backend.app')
@section('title', 'Post')

@push('css')
@endpush
@section('content')
     <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Post</a>
          <span class="breadcrumb-item active">View Post</span>
        </nav>
      </div><!-- br-pageheader -->

    <div class="br-pagebody">
      <div class="br-section-wrapper">
        <a href="{{ route('author.post.index') }}" class="btn btn-danger waves-effects">Back</a>
          @if($post->is_approved == false)
            <button type="button" class="btn btn-success pull-right">
              <i class="ion-android-refresh"></i>
              <span>Pending</span>
            </button>
          @else
             <button type="button" class="btn btn-success pull-right" disabled>
              <i class="ion-android-done-all"></i>
              <span>Approved</span>
             </button>
          @endif
          <br>
          <br>
        <div class="row">
          <div class="col-lg-8">
            <div class="widget-2">
              <div class="card shadow-base overflow-hidden">
                <div class="card-header">
                  <h6 class="card-title">{{ $post->title }}</h6>
                  <div class="btn-group" role="group" aria-label="Basic example">
                       <small>Post By 
                        <strong>
                        <a href="">{{ $post->user->name }}</a>
                       </strong> on 
                        @if(!empty($post->created_at))
                        {{ $post->created_at->toFormattedDateString()}}
                        @else
                        Publish At
                        @endif
                      </small>
                   </div>
                 </div><!-- card-header -->
                <div class="card-body">
                  <div class="wd-100p rounded-bottom">
                    <p class="pd-l-20 tx-12 lh-8 mg-b-0">{!! $post->body !!}</p>
                  </div>
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- widget-2 -->
          </div><!-- col-6 -->


          <div class="col-lg-4">

            <div class="card shadow-base bd-0">
              <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">CATEGORIES</h6>
              </div><!-- card-header -->
              <div class="card-body d-xs-flex justify-content-between align-items-center">
                <h4 class="mg-b-0 tx-inverse tx-lato tx-bold">
                  @foreach ($post->categories as $category)
                  <span class="label btn btn btn-primary">{{ $category->name }}</span>
                  @endforeach
                </h4>
              </div><!-- card-body -->
            </div><!-- card -->

            <div class="card shadow-base bd-0 mt-3">
              <div class="card-header bg-teal d-flex justify-content-between align-items-center">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">TAGS</h6>
              </div><!-- card-header -->
              <div class="card-body d-xs-flex justify-content-between align-items-center">
                <h4 class="mg-b-0 tx-inverse tx-lato tx-bold">
                  @foreach ($post->tags as $tag)
                  <span class="label btn btn btn-teal">{{ $tag->name }}</span>
                  @endforeach
                </h4>
              </div><!-- card-body -->
            </div><!-- card -->

            <div class="card shadow-base bd-0 mt-3">
              <div class="card-header bg-warning d-flex justify-content-between align-items-center">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">FEATURED IMAGE</h6>
              </div><!-- card-header -->
              <div class="card-body d-xs-flex justify-content-between align-items-center">
                <h4 class="mg-b-0 tx-inverse tx-lato tx-bold">
                  <img class="img-thumbnail" src="{{ asset('storage/post/'.$post->image) }}" alt="Post Image">

                </h4>
              </div><!-- card-body -->
            </div><!-- card -->

          </div><!-- col-4 -->
        </div><!-- row -->

      </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->


@push('js')
@endpush
@endsection