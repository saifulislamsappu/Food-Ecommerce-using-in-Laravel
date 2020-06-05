@extends('layouts.master')

@section('title')
Register
@endsection

@section('content')
<div class="food">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Order
                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <!-- <a href="{{url('/food-create')}}" class="btn btn-primary float-right">ADD</a> -->
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="text-primary">
                      <th>#</th>
                      <th>Item</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Total</th>
                      <!-- <th>Status</th> -->
                    </thead>
                    <tbody>
                      @php
                        $totalPrice = 0;
                      @endphp
                      @foreach ($order->order_details as $key => $order)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{$order->product->food_name}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->quantity * $order->price}}</td> 

  					</tr>
  					                      
                        @php
                          $totalPrice += $order->quantity * $order->price;
                        @endphp
                  
                       @endforeach
                       <tr>

                        <td colspan="4" align="right"><b>Total</b></td>
                       
                        <td>{{ $totalPrice }}</td> 

  					</tr>
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
</script>
@endsection
