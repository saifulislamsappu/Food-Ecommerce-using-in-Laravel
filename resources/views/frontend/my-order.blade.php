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
                  <table id="dataTable" class="table">
                    <thead class="text-primary">
                        <tr style="border-bottom: 2px solid gray">
                          <th>Order No</th>
                          <!-- <th>Name</th>
                          <th>Email</th>
                          <th>Adress</th>
                          <th>City</th>
                          <th>State</th>
                          <th>Zip</th>-->
                          
                          <th>Details</th>
                          <th>Date And Time</th>
                          <th>Status</th>
                          <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($orders as $orders)
                        <tr style="border-bottom: 2px solid gray">
                            <td>Order {{ $loop->index+1}}</td>
                            <td>
                            Name: {{ $orders->name}}<br>
                            Emali: {{ $orders->email}}<br>
                            Address: {{ $orders->address}},<br>
                            {{ $orders->city}},
                            {{ $orders->state}},<br>
                            {{ $orders->zip}}</td>
                            <td>{{$orders->created_at}}</td>
                           <!--  <td>
                              <input type="checkbox" class="toggle-class" name="status" data-id="{{$orders->id}}" data-toggle="toggle" data-on="Confirm" data-off="Pandding" {{$orders->status==true ? 'checked':''}}>
                            </td> -->
                            <!-- <td>
                              <form action="{{url('/order-delete/'.$orders->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger">Cancel</button>
                              </form>
                            </td> -->
                            <th>
                              @if($orders->status=="1")
                                    <p class="text-success">Confirm</p>

                                @else  

                                  <p class="text-primary">Pandding</p>

                              @endif
                            </th>
                            <td>
                              <a href="{{url('my-order-view/'.$orders->id)}}" class="btn btn-primary btn-md btn-rounded"><b>view</b>
                              </a>
                            </td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
              </div>


    </div>




@endsection