@extends('layouts.backend.app')
@section('title', 'Catagory')

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
          <a class="breadcrumb-item" href="#">Category</a>
          <span class="breadcrumb-item active">Category List</span>
        </nav>
      </div>
      <!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20">
        <a class="btn btn-info waves-effect" href="{{ route('admin.category.create') }}">
          <i class="icon ion-plus-circled"></i>
          <span>Add New Category</span>
        </a>
      </div>

<div class="br-pagebody">
<div class="br-section-wrapper">
  <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">
   All Category
   <span class="badge badge-info">{{ $categories->count() }}</span>
  </h6>
<div class="table-wrapper">
<table id="example" class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Post Count</th>
            <th>Create_At</th>
            <th>Update_At</th>
            <th>Action</th>
    </thead>
    <tbody>
           @foreach($categories as $key=>$category)
                  <tr>

                    <td>{{ $key + 1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->posts->count() }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td class="text-center">
                      <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-info">
                        <i class="ion-android-create"></i></a>
                      <button class="btn btn-danger" type="button"
                      onclick="deleteCatagory({{ $category->id }})" >
                        <i class="ion-android-delete"></i>
                      </button>
                      <form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.destroy',$category->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')

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
      function deleteCatagory(id){
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
          document.getElementById('delete-form-'+id).submit();
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
    $('#example').DataTable();
} );
    </script>
  @endpush
  @endsection
