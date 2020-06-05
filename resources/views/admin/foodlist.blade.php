@extends('layouts.master')

@section('title')
Register
@endsection

@section('content')
<div class="food">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Food List
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
                      <th>#</th>
                      <!-- <th>Id</th> -->
                      <th>Name</th>
                      <th>Image</th>
                      <th>Protein</th>
                      <th>Fat</th>
                      <th>Carb</th>
                      <th>KCal</th>
                      <th>category</th>
                      <th>Medical Term</th>
                      <th>Price</th>
                      <th>Order qty</th>
                      <th>Amount</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      <th>Status</th>
                    </thead>
                    <tbody>
                      @foreach ($foods as $food)
                      <tr>
                        <td>{{ $loop->index+1}}</td>
                        <td>{{ $food->food_name}}</td>
                        <td>
                          <img src="{{asset('assets/images/foods/'.$food->image)}}">
                        </td>
                        <td>{{ $food->protein}}</td>
                        <td>{{ $food->fat}}</td>
                        <td>{{ $food->carbohydrate}}</td>
                        <td>{{ $food->KCal}}</td>
                        <td>{{ $food->categoryname->categories_name}}</</td>
                        <td>{{ $food->termname->term_name}}</td>
                        <td>{{ $food->Price}}</td>
                        <td>{{ $food->total_order}}</td>
                        <td>{{ $food->total_income}}</</td>
                        <td><a href="{{url('/food/'.$food->id)}}" class="btn btn-info">Edit</a></td> 
                        <td>
                          <form action="{{url('/food-delete/'.$food->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                        <td>
                          <input type="checkbox" class="toggle-class" data-onstyle="success" data-offstyle="danger" name="status" data-id="{{$food->id}}" data-toggle="toggle" data-on="Enabled" data-off="Disabled" 
                          {{$food->status==true ? 'checked':''}}>

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
      url:'{{route("food.status")}}',
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
