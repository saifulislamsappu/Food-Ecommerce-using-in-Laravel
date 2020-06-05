@extends('layouts.master')

@section('title')
dashboard
@endsection

@section('content')
<style type="text/css">
  .row {
    margin-right: -15px;
    margin-left: -15px;
}
.lead {
    font-size: 21px;
}
.lead {
    margin-bottom: 20px;
    font-size: 16px;
    font-weight: 300;
    line-height: 1.4;
}
.bg-primary {
    color: #fff;
    background-color: #337ab7 !important;
}
.danger {
  color: #fff;
    background-color: #d9534f;
}
.warning {
  color: #fff;
    background-color: #f0ad4e;
}
.success {
  color: #fff;
    background-color: #5cb85c;
}

</style>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <!-- <h4 class="card-title"> Simple Table</h4> -->
              </div>
              <div class="row">
              <div class="col-md-3">
                <div class="box bg-primary">
                  <i class="fa fa-lemon ml-1"></i>
                  <!-- @foreach($food->take(1) as $food) -->
                  <!-- <i class="now-ui-icons arrows-1_refresh-69"></i>  -->
                  <h3 class="text-center">{{$food->count()}}</h3>
                  <!-- @endforeach -->
                  <p class="lead text-center font-weight-bold">Total Food</p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="box danger">
                  <i class="fa fa-user ml-1"></i>
                 
                  <!-- <i class="now-ui-icons arrows-1_refresh-69"></i>  -->
                  <h3 class="text-center">{{$users->skip(1)->count()}}</h3>
                 
                  <p class="lead text-center font-weight-bold">User registered</p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="box warning">
                  <i class="fa fa-shopping-cart ml-1"></i>
                  
                  <!-- <i class="now-ui-icons arrows-1_refresh-69"></i>  -->
                  <h3 class="text-center">{{ $confirmOrders->count()}}</h3>
                  
                  <p class="lead text-center font-weight-bold">Total Order</p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="box success">
                  <i class="fa fa-handshake ml-1"></i>
                  <h3 class="text-center">{{$costs}}</h3>
                  <p class="lead text-center font-weight-bold">Transactions</p>
                </div>
              </div>
            </div>
          </div>
         
        </div>

@endsection
@section('script')
@endsection
