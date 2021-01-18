@extends('layouts.backend.app')
@section('title','Settings')

@push('css')
@endpush
@section('content')
  <div class="br-pageheader pd-y-15 pd-l-20">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="#">Settings</a>
            <span class="breadcrumb-item active">Profile Settings</span>
          </nav>
  </div>
      <!-- br-pageheader -->
<section class="br-profile-page">
        <div class="card shadow-base bd-0 rounded-0 widget-4">
          <div class="card-header ht-75">
            <div class="hidden-xs-down">
              <a href="" class="mg-r-10"><span class="tx-medium">498</span> Followers</a>
              <a href=""><span class="tx-medium">498</span> Following</a>
            </div>
            <div class="tx-24 hidden-xs-down">
              <a href="" class="mg-r-10"><i class="icon ion-ios-email-outline"></i></a>
              <a href=""><i class="icon ion-more"></i></a>
            </div>
          </div><!-- card-header -->
          <div class="card-body">
            <div class="card-profile-img">
              <img src="{{ Storage::disk('public')->url('profile/').Auth::user()->image }}" alt="">
            </div><!-- card-profile-img -->
            <h4 class="tx-normal tx-roboto tx-white">{{ Auth::user()->name }}</h4>
            <p class="mg-b-25">Wine Connoisseur</p>

            <p class="wd-md-500 mg-md-l-auto mg-md-r-auto mg-b-25">{{ Auth::user()->about }}</p>

            <p class="mg-b-0 tx-24">
              <a href="" class="tx-white-8 mg-r-5"><i class="fa fa-facebook-official"></i></a>
              <a href="" class="tx-white-8 mg-r-5"><i class="fa fa-twitter"></i></a>
              <a href="" class="tx-white-8 mg-r-5"><i class="fa fa-pinterest"></i></a>
              <a href="" class="tx-white-8"><i class="fa fa-instagram"></i></a>
            </p>
          </div><!-- card-body -->
        </div><!-- card -->

        <div class="ht-70 bg-gray-100 pd-x-20 d-flex align-items-center justify-content-center shadow-base">
          <ul class="nav nav-outline active-info align-items-center flex-row" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile Settings</a></li>
          </ul>
        </div>
 <div class="tab-content br-profile-body">
      <form method="POST" action="{{ route('author.profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
          <div class="tab-pane fade active show" id="profile">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card pd-20 pd-xs-30 shadow-base bd-0">
                 <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14">Change Profile Information </h6>
                  <div class="form-layout form-layout-4">
                    <div class="row">
                      <label class="form-control-label">Enter Name: <span class="tx-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}" placeholder="Enter Name">
                    </div><!-- row -->

                    <div class="row">
                      <label class="form-control-label">Enter Email: <span class="tx-danger">*</span></label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}" placeholder="Enter Email">
                    </div><!-- row -->

                    <div class="row">
                      <label class="form-control-label">About: <span class="tx-danger">*</span></label>
                        <textarea rows="5" name="about" class="form-control">{{ Auth::user()->about }}</textarea>
                    </div><!-- row -->

                    <div class="row mg-t-20">
                      <label class="form-control-label">Profile Image: <span class="tx-danger">*</span></label>
                      <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <div class="row mg-t-15">
                      <div class="mg-l-auto">
                        <div class="mg-t-10 form-layout-footer">
                          <button class="btn btn-secondary">Cancel</button>
                          <button class="btn btn-info">Update Save</button>
                        </div><!-- form-layout-footer -->
                      </div><!-- col-8 -->
                    </div>
                  </div><!-- form-layout -->
                </div><!-- col-6 -->
            </div><!-- row -->
          </div><!-- tab-pane -->
      </form>

      <form method="POST" action="{{ route('author.password.update') }}">
                @csrf
                @method('PUT')
          <div class="tab-pane fade active show mt-3" id="profile">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card pd-20 pd-xs-30 shadow-base bd-0">
                 <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14">Change Profile Information </h6>
                  <div class="form-layout form-layout-4">

                    <div class="row">
                      <label class="form-control-label">Enter Old Password: <span class="tx-danger">*</span></label>
                        <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter Old Password">
                    </div><!-- row -->

                    <div class="row mg-t-10">
                      <label class="form-control-label">Enter New Password: <span class="tx-danger">*</span></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter New Password">
                    </div><!-- row -->

                    <div class="row mg-t-10">
                      <label class="form-control-label">Confirm New Password: <span class="tx-danger">*</span></label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm New Password">
                    </div><!-- row -->

                    <div class="row mg-t-15">
                      <div class="mg-l-auto">
                        <div class="mg-t-10 form-layout-footer">
                          <button class="btn btn-secondary">Cancel</button>
                          <button class="btn btn-info">Change Password</button>
                        </div><!-- form-layout-footer -->
                      </div><!-- col-8 -->
                    </div>
                  </div><!-- form-layout -->
                </div><!-- col-6 -->
            </div><!-- row -->
          </div><!-- tab-pane -->
      </form>

 </div><!-- br-pagebody -->
</section>


  @push('js')
  @endpush
  @endsection