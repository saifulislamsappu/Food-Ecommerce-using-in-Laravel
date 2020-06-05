@extends('welcome')

@section('content')


<style>


.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<div class="col-md-12">
  <h2 style="margin-top: 30px;">Checkout Form</h2>
</div>
<!-- <p>Resize the browser window to see the effect. When the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other.</p> -->
<div class="col-md-12">  
<div class="row">
  <div class="col-md-8">
    <div class="container">
      <form id="contact" action="{{url('order-store')}}" method="POST">
    {{csrf_field()}}
      
        <div class="row">
          <div class="col-75">
            <h3>Billing Address</h3>
            <div class="row">
                <label for="fname" class="col-sm-4 mt-3"><i class="fa fa-user"></i> Full Name</label>
                <div class="col-sm-6">
                    <input type="text" id="fname" name="name" placeholder="Name" value="">
                    @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                </div>
            </div>

            <div class="row">
                <label for="email" class="col-sm-4 mt-3"><i class="fa fa-envelope"></i> Email</label>
                <div class="col-sm-6">
                    <input type="text" id="email" name="email" placeholder="Enter the mail">
                    @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                </div>
            </div>

            <div class="row">

                <label for="adr" class="col-sm-4 mt-3"><i class="fa fa-address-card"></i> Address</label>

                <div class="col-sm-6">
                  <input type="text" id="adr" name="address" placeholder="Your Address">
                  @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                </div>
            </div>

            <div class="row">

                <label for="city" class="col-sm-4 mt-3"><i class="fa fa-location-arrow"></i> City</label>
                <div class="col-sm-6">
                  <input type="text" id="city" name="city" placeholder="Enter the City">
                  @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                </div>
            </div>
            <div class="row">

                <label for="city" class="col-sm-4 mt-3"><i class="fa fa-location-arrow"></i> State</label>
                <div class="col-sm-6">
                  <input type="text" id="state" name="state" placeholder="Enter the NY">
                  @error('state')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                </div>
            </div> 
            <div class="row">

                <label for="city" class="col-sm-4 mt-3"><i class="fa fa-location-arrow"></i> Zip</label>
                <div class="col-sm-6">
                  <input type="text" id="zip" name="zip" placeholder="Enter the Zip">
                  @error('zip')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                </div>
            </div>

          
          </div>

        </div>
        <label>
          <!-- <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing -->
        <!-- </label> -->
        <input type="submit" value="Continue to checkout" class="btn" style="width: 263px;">
      </form>
    </div>
  </div>
  <div class="col-md-4">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
      @foreach (Cart::content() as $food)
      <p><a href="#">{{$food->name}}</a> <span class="price">{{$food->price}}</span></p>
      @endforeach
      <hr>
      <p>Total <span class="price" style="color:black"><b>{{Cart::subtotal()}}</b></span></p>
     
    </div>
  </div>
</div>
</div>

</body>

@endsection
@section('script')

@endsection