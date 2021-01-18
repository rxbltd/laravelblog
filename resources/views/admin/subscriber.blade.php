@extends('layouts.backend.app')
@section('title', 'Subscribers')

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
          <a class="breadcrumb-item" href="#">Subscribers</a>
          <span class="breadcrumb-item active">Subscribers List</span>
        </nav>
      </div>
      <!-- br-pageheader -->

<div class="br-pagebody">
<div class="br-section-wrapper">
  <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">
   All Subscriber
   <span class="badge badge-info">{{ $subscribers->count() }}</span>
  </h6>
<div class="table-wrapper">
<table id="example" class="table table-striped table-bordered">
  
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Create_At</th>
            <th>Update_At</th>
            <th>Action</th>
    </thead>
    <tbody>
           @foreach($subscribers as $key=>$subscriber)
                  <tr>

                    <td>{{ $key + 1 }}</td>
                    <td>{{ $subscriber->email }}</td>
                    <td>{{ $subscriber->created_at }}</td>
                    <td>{{ $subscriber->updated_at }}</td>
                    <td class="text-center">

                      <button class="btn btn-danger" type="button"
                      onclick="deleteSubscriber({{ $subscriber->id }})" >
                        <i class="ion-android-delete"></i>
                      </button>
                      <form id="delete-form-{{ $subscriber->id }}" action="{{ route('admin.subscriber.destroy',$subscriber->id) }}" method="POST" style="display: none;">
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
      function deleteSubscriber(id){
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