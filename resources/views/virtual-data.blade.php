@extends('layouts.master')

@section('content')

<section class="content mt-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header bg-info">
              <h3 class="card-title">Webinar/ Meeting Request List</h3>
            </div>
            <!-- /.card-header -->
    <div class="card-body">
    <div class="d-flex justify-content-end">
        <a href="{{route('add-event')}}" class="btn btn-primary " id="addUserBtn">Add</a>
        <style>
            .center-text {
                text-align: left;
            }
        </style>
    </div>

<table id="DataTable" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>Title of the Virtual Event</th>
            <th>Start of the Event</th>
            <th>Start Time</th>
            <th>End of the Event</th>
            <th>End Time</th>
            <th>Expected No. of Participants</th>
            <th>Name of Focal Person</th>
            <th>Center</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        @foreach($registeredUsers as $user)
            <tr>
                <td class="center-text">{{ $user->v_event }}</td>
                <td class="center-text">{{ $user->e_start }}</td>
                <td class="center-text">{{ $user->t_start }}</td>
                <td class="center-text">{{ $user->e_end }}</td>
                <td class="center-text">{{ $user->t_end }}</td>
                <td class="center-text">{{ $user->p_num }}</td>
                <td class="center-text">{{ $user->focal_p }}</td>
                <td class="center-text">{{ $user->center }}</td>

                
                <td>
                <div class="row">
                    <a href="{{ route('edit-user', $user->id) }}" class="btn btn-primary ">
                    <i class="nav-icon fas fa-edit">
                    </i>
                    </a>
                    <a href="#" class="btn btn-danger"
                        data-toggle="modal" data-target="#deleteModal{{$user->id}}">
                        <i class="nav-icon fas fa-trash">
                        </i>
                    </a>
                </div>  
                <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this item?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <form action="{{ route('delete-user', $user->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                                        
                    </td>
            </tr>
        @endforeach
    </tbody>
</table> 




<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.content -->
<!-- /.container-fluid -->
</div>
</section>

@stop
@section('additionalJS')
        <script>
            $(document).ready(function() {
                // Destroy existing DataTable instance, if it exists
                if ($.fn.DataTable.isDataTable('#DataTable')) {
                    $('#DataTable').DataTable().destroy();
                }

                // Reinitialize DataTable
                $('#DataTable').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "responsive": true
                });
            });
        </script>
    @endsection




