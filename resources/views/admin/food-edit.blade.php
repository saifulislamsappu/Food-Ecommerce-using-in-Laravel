@extends('layouts.master')

@section('title')
Register
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Food Item</h4>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <form id="my_form" class="form-horizontal" method="POST" action="{{url('food-update/'.$food->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                <p id="msg" style="text-align: center;color: #dc3545;display:none"></p>
                <div class="form-group row">
                    <label for="Ad_name" class="col-sm-4 col-form-label">Food Name
                        <span class="asteriskField">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control" id="name" name="food_name" value="{{ $food->food_name}}" type="text" required >
                    </div>
                </div>

                <!-- <div class="col-sm-10 ml-auto" style="border-top: 1px solid #b8b8b8"></div>
                <div class="col-sm-10 ml-auto" style="border-top: 1px solid #b8b8b8;margin-bottom: 1rem"></div> -->
                
                <div class="form-group row">
                    <label for="Ad_name" class="col-sm-4 col-form-label">Protein
                        <span class="asteriskField">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control" id="protein" name="protein" value="{{ $food->protein}}" type="text"required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="Ad_name" class="col-sm-4 col-form-label">Fat
                        <span class="asteriskField">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control" id="fat" name="fat" value="{{ $food->fat}}" type="text" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Ad_name" class="col-sm-4 col-form-label">Carbohydrate
                        <span class="asteriskField">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control" id="carb" name="carbohydrate" value="{{ $food->carbohydrate}}" type="text" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Ad_name" class="col-sm-4 col-form-label">KCal
                        <span class="asteriskField">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control" id="kcal" name="KCal" value="{{$food->KCal}}" type="text" step=0.001 required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Ad_name" class="col-sm-4 col-form-label">Price
                        <span class="asteriskField">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control" id="price" name="Price" value="{{$food->Price}}" type="text" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Add File
                        <span class="asteriskField">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-try" id="add_file" name="image" value="{{$food->image}}" type="file">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Food Category<span class="asteriskField">*
                    </span></label>
                    <div class="col-sm-8">
                       <select class="custom-select" id="inputGroupSelect01" name="category_id"  style="margin-top: 8px;">
                            <option value="">select Category</option>
                              @foreach ($categories as $row)
                              <option value="{{$row->id}}">{{$row->categories_name}}</option>

                               @endforeach
                        </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                  <label for="" class="col-sm-4 col-form-label">Medical Term<span class="asteriskField">*
                  </span></label>
                    <div class="col-sm-8">
                        <select class="custom-select" id="role" name="medical_id"  style="margin-top: 8px;">
                            <option value="">select medical term</option>
                              @foreach ($medical as $row)
                              
                              <option value="{{$row->id}}">{{$row->term_name}}</option>

                               @endforeach
                            </select>
                            @error('medical_id')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                    </div>
                </div>

                </div>

                <div class="form-group text-center row ml-5">
                    <button type="submit" class="btn btn-success">Update</button>
                         <a href="{{url('food')}}" class="btn btn-danger">Cancle</a>
                </div>
            </form>
                </div>
              </div>
            </div>
          </div>
          
@endsection
@section('script')
@endsection
