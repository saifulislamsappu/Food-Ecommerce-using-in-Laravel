@extends('welcome')

@section('content')

<div class="container">
    <br>  
<hr>

    
<div class="card">
    <div class="row">
        <aside class="col-sm-5 border-right">
<article class="gallery-wrap"> 
<div class="img-big-wrap">
  <div style="margin-top: 114px;"><img src="{{asset('assets/images/foods/'.$food->image)}}"></div>
</div> <!-- slider-product.// -->
<!-- <div class="img-small-wrap">
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
</div> --> <!-- slider-nav.// -->
</article> <!-- gallery-wrap .end// -->
        </aside>
        <aside class="col-sm-7">
<article class="card-body p-5">
    <h3 class="title mb-3" style="font-size: 22px;">{{ $food->food_name}}</h3>

<p class="price-detail-wrap"> 
    <span class="price h3 text-warning"> 
        <span class="currency" style="font-size: 18px;">Price: TK </span><span class="num" style="font-size: 18px;">{{ $food->Price}}</span>
    </span> 
    <!-- <span>/per kg</span>  -->
</p> <!-- price-detail-wrap .// -->
<!-- <dl class="item-property">
  <dt style="color: aliceblue;">Details</dt>
  <dd><p style="color: black;">Here goes description consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco </p></dd>
</dl>
 -->
<!-- <dl class="param param-feature">
  <dt>Model#</dt>
  <dd>12345611</dd>
</dl> -->  <!-- item-property-hor .// -->
<!-- <dl class="param param-feature">
  <dt>Color</dt>
  <dd>Black and white</dd>
</dl>  --> <!-- item-property-hor .// -->
<!-- <dl class="param param-feature">
  <dt>Delivery</dt>
  <dd>Russia, USA, and Europe</dd>
</dl> -->  <!-- item-property-hor .// -->
<div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="text-primary">
                      
                      <th style="color: darkslategrey;">Protein</th>
                      <th style="color: darkslategrey;">Fat</th>
                      <th style="color: darkslategrey;">Carbohydrate</th>
                      <th style="color: darkslategrey;">KCal</th>
                      <th style="color: darkslategrey;">category</th>
                      <th style="color: darkslategrey;">Medical Term</th>
                    </thead>
                    <tbody>
                      
                      <tr>
                        <td>{{ $food->protein}}</td>
                        <td>{{ $food->fat}}</td>
                        <td>{{ $food->carbohydrate}}</td>
                        <td>{{ $food->KCal}}</td>
                        <td>{{ $food->categoryname->categories_name}}</</td>
                        <td>{{ $food->termname->term_name}}</td> 
                      </tr>

                    </tbody>
                  </table>

                </div>
              </div>

    <hr>
    <!-- <a href="#" class="btn btn-lg btn-primary text-uppercase"> Buy now </a> -->
    <!-- <a href="{{url('cart/addItem/'.$food->id)}}" class="btn btn-lg btn-outline-primary text-uppercase" style="background: aliceblue;"> <i class="fas fa-shopping-cart"></i> Add to cart </a> -->
    <form action="/cart" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{ $food->id}}">
        <input type="hidden" name="food_name" value="{{ $food->food_name}}">
        <input type="hidden" name="price" value="{{ $food->Price}}">
        <input type="hidden" name="image" value="{{ $food->image}}">
        <button type="submit" class="btn btn-primary">Add to Cart</button>
    </form>
</article> <!-- card-body.// -->
        </aside> <!-- col.// -->
    </div> <!-- row.// -->
</div> <!-- card.// -->


</div>
<!--container.//-->

@endsection