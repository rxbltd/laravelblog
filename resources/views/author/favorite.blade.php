@extends('layouts.backend.app')
@section('title','Favorite Post')

@push('css')
 <!-- Data TAble -->
    <link href="{{ asset('/assets/backend/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/lib/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/bracket.css') }}">
@endpush
@section('content')
<div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Post</a>
          <span class="breadcrumb-item active">Favorite Post List</span>
        </nav>
      </div>
      <!-- br-pageheader -->
<div class="br-pagebody">
<div class="br-section-wrapper">
   <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">
   All Favorite Post
   <span class="badge badge-info">{{ $posts->count() }}</span>
   </h6>
<div class="table-wrapper">
<table id="example" class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th><i class="fa fa-thumbs-up fa-2x"></i>Favorite</th>
            <th><i class="fa fa-comments-o fa-2x" aria-hidden="true"></i>Comments</th>
            <th><i class="fa fa-adjust fa-2x" aria-hidden="true"></i></th>
            <th>Action</th>
    </thead>
    <tbody>
           @foreach($posts as $key=>$post)
                  <tr>

                    <td>{{ $key + 1 }}</td>
                    <td>{{ str_limit($post->title,'10') }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->favorite_to_users->count() }}</td>
                    <td>Comments</td>
                    <td>{{ $post->view_count }}</td>

                    <td class="text-center">
                      <a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-info">
                        <i class="ion-ios-eye-outline"></i>
                      </a>

                      <button class="btn btn-danger" type="button"
                        onclick="removeFev({{ $post->id }})" >
                        <i class="ion-android-delete"></i>
                      </button>
                      <form id="remove-form-{{ $post->id }}" action="{{ route('post.favorite',$post->id) }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </td>
                 </tr>
           @endforeach
    </tbody>
</table>
    </div><!-- table-wrapper -->
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->

    <!-- ########## END: MAIN PANEL ########## -->

   @push('js')
   {{-- Data Table --}}
    <script src="{{ asset('/assets/backend/lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/datatables/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('/assets/backend/js/bracket.js') }}"></script>

    {{-- sweetalert2 --}}
    <script src="{{ asset('/assets/backend/js/sweetalert2.all.min.js') }}"></script>
    <script>
      function removeFev(id){
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          event.preventDefault();
          document.getElementById('remove-form-'+id).submit();
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your data is safe :)',
            'error'
          )
        }
      })
      }

    </script>
    
    <script>
     $(document).ready(function() {
     $('#example').DataTable();} );
    </script>
  @endpush
  @endsection
