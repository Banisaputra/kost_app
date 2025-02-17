@extends('admin.layouts.main');

@section('title')
    <title>Master Data Ruangan - Kost Kita</title>
@endsection
@section('page_link')
    <link rel="stylesheet" href="#">
@endsection
  
@section('content')
{{-- modal add --}}
<div class="modal fade" id="addRoom" tabindex="-1" style="display: none;" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Room</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{ route('rooms.store')}}" method="post" id="modalForm">
            @csrf
            <div class="modal-body">
               <div class="row">
                  <div class="col mb-3">
                     <label for="room_code" class="form-label">Room Code</label>
                     <input type="text" id="room_code" name="code" class="form-control" placeholder="xxxx">
                  </div>
                  <div class="col mb-3">
                     <label for="room_name" class="form-label">Room Name</label>
                     <input type="text" id="room_name" name="name" class="form-control" placeholder="Enter Room Name">
                  </div>
               </div>
               <div class="row g-2">
                  <div class="col mb-3">
                     <label for="room_description" class="form-label">Description</label>
                     <textarea class="form-control" name="description" id="room_description" cols="3"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary btn-submit">Save</button>
            </div>
         </form>
      </div>
   </div>
</div>
{{-- end modal add --}}

{{-- notify --}} 
<div class="container-xxl flex-grow-1 container-p-y">
   @if(session('success'))
      <div class="alert alert-success" role="alert">
         {{ session('success') }}
      </div>
   @elseif(session('error'))
      <div class="alert alert-danger" role="alert">
         {{ session('error') }}
      </div>
   @elseif($errors->any())
   @foreach($errors->all() as $message)
   <div class="alert alert-danger" role="alert">
      {{ $message }}
   </div>
   @endforeach
   @endif
   <div class="card">
      <div class="card-header">
         <h4 class="card-title">Data Ruangan</h4>
         <a href="{{ route('rooms.create') }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoom">
            Add New
         </a>
      </div>
      <div class="card-body">
         <div class="table-responsive text-nowrap">
            <table id="rooms-table" class="table table-striped">
               <thead>
                  <tr>
                     <th width="5%">No.</th>
                     <th width="20%">Code</th>
                     <th>Name</th>
                     <th>Remark</th>
                     <th width="15%">Actions</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($rooms as $room)
                     <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $room->code }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->description }}</td>
                        <td>
                           <button href="#" class="btn btn-primary btn-sm btn-edit" data-id="{{ $room->id }}">Edit</button>
                           <form method="POST" action="{{ route('rooms.destroy', $room->id) }}" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                           </form>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection
  

@section('page_script')
   <script>
      // Your JavaScript code here 
      $(document).ready(function () {
         $('#rooms-table').DataTable();

         // edit the rooms
         $('#rooms-table').on('click', '.btn-edit', function () {
            console.log('edit lee');
            
            // ajax get data
            $.ajax({
               url: "/rooms/" + $(this).data('id') + "/edit",
               method: 'GET',
               success: function (data) {
                  console.log(data);

                  $('#addRoom .modal-title').text('Edit Room');
                  $('#addRoom .btn-submit').text('Update');
                  $('#addRoom #modalForm').prop('action', '{{ route("rooms.update", ":id") }}'.replace(':id', data.id));
                  $('#addRoom #modalForm input[name="room_id"]').remove(); // Remove existing hidden input
                  $('#addRoom #modalForm').append('<input type="hidden" name="room_id" value="'+data.id+'">');
                  $('#addRoom #modalForm input[name="_method"]').remove(); // Remove existing hidden input
                  $('#addRoom #modalForm').append('<input type="hidden" name="_method" value="PUT">');
                  $('#modalForm #room_code').val(data.code);
                  $('#modalForm #room_name').val(data.name);
                  $('#modalForm #room_description').val(data.description);
                  $('#addRoom').modal('show');
               },
               error: function (xhr, status, error) {
                  console.log(xhr.responseText);
                  alert('Error Get Data');
               }
            });
             
         })



      });
   </script>
@endsection