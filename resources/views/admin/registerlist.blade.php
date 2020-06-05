@extends('layouts.master')

@section('title')
Register
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">User Table</h4>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="dataTable" class="table">
                    <thead class=" text-primary">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <!-- <th>User type</th> -->
                      <!-- <th>Edit</th> -->
                      <th>Delete</th>
                      <th>Status</th>
                    </thead>
                    <tbody>
                  		@foreach ($users->skip(1) as $row)

                      <tr>
                        <td>{{ $loop->index+1}}</td>
                        <td>{{ $row->name}}</td>
                        <td>{{ $row->phone}}</td>
                        <td>{{ $row->email}}</td>
                         <!-- <td>-{{ $row->usertype}}</td> -->

                        <!-- <td>
                          <a href="/role-edit/{{ $row->id}}" class="btn btn-success">Edit</a>
                        </td> -->
                        <td>
                          <form action="{{url('/role-Register-delete/'.$row->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                        <td>
                          
                          <input data-id="{{$row->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $row->status ? 'checked' : '' }}>
                        
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
@section('script')
<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
  $('.toggle-class').on('change',function(){
    var status=$(this).prop('checked')==true ? 1 : 0;
    var id=$(this).data('id');
    console.log(id)
    $.ajax({
      type: 'GET',
      dataType: 'json',
      url:'{{route("user.status")}}',
      data:{'status':status,'id':id},
      success:function(data){
        console.log(data);
      },
      error: function(jqXhr, textStatus, errorThrown) {

          console.log(errorThrown);

      }
    });
  });
  $(document).ready( function () {
    $('#dataTable').DataTable();
});
</script>
@endsection
