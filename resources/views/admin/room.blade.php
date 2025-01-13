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
         <h5 class="modal-title">Tambah Ruangan</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <form action="" method="post">
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
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
               Close
            </button>
            <button type="submit" class="btn btn-primary">Save changes</button>
         </div>
       </form>
     </div>
   </div>
 </div>
{{-- end modal add --}}

<div class="container-xxl flex-grow-1 container-p-y">
   <div class="card">
      <div class="card-header">
         <h4 class="card-title">Data Ruangan</h4>
         <a href="{{ route('ruangan.create') }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoom">
            Tambah Ruangan
         </a>
      </div>
      <div class="card-body">
         <div class="table-responsive text-nowrap">
            <table id="rooms-table" class="table table-striped">
               <thead>
                  <tr>
                     <th width="5%">No.</th>
                     <th>Nama</th>
                     <th>Nomor Ruangan</th>
                     <th>Keterangan</th>
                     <th width="10%">Actions</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($rooms as $room)
                     <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->nama_ruangan }}</td>
                        <td>{{ $room->nomor_ruangan }}</td>
                        <td>{{ $room->description }}</td>
                        <td>
                              <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm">Edit</a>
                              <form method="POST" action="{{ route('employees.destroy', $employee->id) }}" style="display:inline;">
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
         $('#rooms-table').DataTable(); // Initialize DataTable without AJAX
      });
   </script>
@endsection