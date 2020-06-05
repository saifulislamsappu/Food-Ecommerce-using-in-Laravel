@extends('welcome')

@section('content')

<style type="text/css">
    
</style>
    <div class="col-12">
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<h2 style="margin-top: 40px;">Cart</h2>
@if(Cart::count()>0)

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <!-- <th scope="col">Description</th> -->
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $food)
                        <tr>
                            <td><img width="30" src="{{asset('assets/images/foods/'.$food->options['img'])}}" /> </td>
                            <td>{{$food->name}}</td>
                            <!-- <td>In stock</td> -->
                            <td>
                                <!-- {{$food->qty}} -->
                                <div>
                                    <form action="{{('/cart-update')}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="number" name="qty" value="{{$food->qty}}" min="1">
                                        <input type="hidden" name="rowId" value="{{$food->rowId}}">
                                        <input type="submit" name="submit" value="update" class="btn btn-sm btn-default" style="background: green;">
                                    </form>
                                </div>
                                
                        <!-- <input name="qty" type="text" value=""> -->

                            </td>
                            <td class="text-right">{{$food->price}}*{{$food->qty}}={{$food->subtotal}}</td>
                            <td class="text-right">
                                <form action="{{url('/cart-delete/'.$food->rowId)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <!-- <td></td> -->
                            <td></td>
                            <td></td>
                            <td>Total Item</td>
                            <td></td>
                            <td class="text-right"></td>
                        </tr>
                        <tr>
                            <!-- <td></td> -->
                            <td></td>
                            <td></td>
                            <td>{{Cart::count()}}</td>

                            <!-- <td></td> -->
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>Tk {{Cart::subtotal()}}</strong></td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>

            <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="/"><button class="btn btn-block btn-info text-uppercase float-right" style="height: 49px;width: 226px;">Continue Shopping</button></a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="/check-out"  style="text-decoration: none;"><button class="btn btn-lg btn-block btn-success text-uppercase" style="height: 49px;width: 226px;">Checkout</button></a>
                </div>
            </div>
            
        </div>

@else
<h2>no item</h2>
@endif
        </div>




@endsection