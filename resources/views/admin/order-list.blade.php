@extends('layouts.master')

@section('title')
Register
@endsection

@section('content')
<div class="food">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Order List
                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <a href="{{url('/food-create')}}" class="btn btn-primary float-right">ADD</a>
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="dataTable" class="table">
                    <thead class="text-primary">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Adress</th>
                          <th>City</th>
                          <th>State</th>
                          <th>Zip</th>
                          <th>Status</th>
                          <th>Delete</th>
                          <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($orders as $orders)
                        <tr>
                            <td>{{ $loop->index+1}}</td>
                            <td>{{ $orders->name}}</td>
                            <td>{{ $orders->email}}</td>
                            <td>{{ $orders->address}}</td>
                            <td>{{ $orders->city}}</td>
                            <td>{{ $orders->state}}</td>
                            <td>{{ $orders->zip}}</td>
                            <td>
                              <input type="checkbox" class="toggle-class" data-onstyle="success" data-offstyle="danger" name="status" data-id="{{$orders->id}}" data-toggle="toggle" data-on="Confirm" data-off="Pandding" {{$orders->status==true ? 'checked':''}}>
                            </td>
                            <td>
                              <form action="{{url('/order-delete/'.$orders->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                            <td>
                              <a href="{{url('order-view/'.$orders->id)}}" class="btn btn-primary btn-md btn-rounded"><b>view</b>
                              </a>
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
      on: 'Confirm',
      off: 'Pandding'
    });
  })
  $('.toggle-class').on('change',function(){
    var status=$(this).prop('checked')==true ? 1 : 0;
    var id=$(this).data('id');
    console.log(id)
    $.ajax({
      type: 'GET',
      dataType: 'json',
      url:'{{route("order.status")}}',
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
} );
</script>
@endsection
