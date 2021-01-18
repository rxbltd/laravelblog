@extends('layouts.backend.app')
@section('title', 'Blank')

@push('css')

@endpush
@section('content')
  <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="index.html">Bracket</a>
          <a class="breadcrumb-item" href="#">Forms</a>
          <span class="breadcrumb-item active">Form Layouts</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Form Layouts</h4>
        <p class="mg-b-0">Forms are used to collect user information with different element types of input, select, checkboxes, radios and more.</p>
      </div>



@push('js')
   
@endpush
@endsection