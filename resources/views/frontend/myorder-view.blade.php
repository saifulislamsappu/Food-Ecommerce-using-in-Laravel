@extends('welcome')

@section('content')

    <div class="col-12">
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


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




@endsection