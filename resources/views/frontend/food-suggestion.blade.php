@extends('welcome')

@section('content')

<div class="row">
  
  <div class="col-md-12">

    <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel">
    <div>
        <h2 class="headline float-left mt-5">Recommended Food List</h2>
    </div>

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->

    <div class="carousel-item active">
 @foreach ($food->random(10) as $food)
      <div class="col-md-3 mb-3">
       

        <div class="card">
          <img src="{{asset('assets/images/foods/'.$food->image)}}">
            <div class="card-body">
            <h4 class="card-title font-weight-bold">{{ $food->food_name}}</h4>
              <div>
                <table>
                    <tr>
                        <td><p>Carb : {{ $food->carbohydrate}}</p></td>
                        <td style="padding-left: 130px;"><p>Kca : {{ $food->KCal}}</p></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>Price : {{ $food->Price}}</td>
                    </tr>
                </table>
            </div>
            <div class="row">
              <div class="col-md-6">
                <a href="{{url('food-order/'.$food->id)}}" class="btn btn-primary btn-md btn-rounded"><b>Order</b></a>
               
              </div>
              <div class="col-md-6">
                 <form action="/cart" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{ $food->id}}">
        <input type="hidden" name="food_name" value="{{ $food->food_name}}">
        <input type="hidden" name="price" value="{{ $food->Price}}">
        <input type="hidden" name="image" value="{{ $food->image}}">
        <button type="submit" class="btn btn-primary"><b>Add to Cart</b></button>
    </form>
              </div>
            </div>
          </div>
        </div>
        
      </div>

@endforeach
    </div>


    <!--/.Second slide-->

    <!--/.Third slide-->

  </div>
  

  <!--/.Slides-->
  <!--Controls-->
 

  <!--/.Controls-->
</div>


  </div>
</div>





@endsection



@section('script')
@endsection
