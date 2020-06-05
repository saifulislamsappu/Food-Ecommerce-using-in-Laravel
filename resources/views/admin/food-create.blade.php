@extends('layouts.master')

@section('title')
Register
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Customer Table</h4>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              </div>
        <div>
            
        </div>
              <div class="card-body">
                <div class="table-responsive">
                  <form id="my_form" class="form-horizontal" method="POST" action="{{url('food-store')}}" enctype="multipart/form-data">
                    @csrf
                <p id="msg" style="text-align: center;color: #dc3545;display:none"></p>
               

                <div class="form-group row">
                    <label for="food_name" class="col-sm-4 col-form-label">Food Name
                        <span class="asteriskField">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control" id="name" name="food_name" placeholder="Enter Ad Name" type="text"  />
                        @error('food_name')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                    </div>
                </div>

                <!-- <div class="col-sm-10 ml-auto" style="border-top: 1px solid #b8b8b8"></div>
                <div class="col-sm-10 ml-auto" style="border-top: 1px solid #b8b8b8;margin-bottom: 1rem"></div> -->
                
                <div class="form-group row">
                    <label for="Ad_name" class="col-sm-4 col-form-label">Protein
                        <span class="asteriskField">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control" id="protein" name="protein" placeholder="Enter total Protein" type="text" step=0.001 >
                        @error('protein')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="Ad_name" class="col-sm-4 col-form-label">Fat
                        <span class="asteriskField">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control" id="fat" name="fat" placeholder="Enter total Fat" type="text">
                        @error('fat')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Ad_name" class="col-sm-4 col-form-label">Carbohydrate
                        <span class="asteriskField">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control" id="carb" name="carbohydrate" placeholder="Enter  total Carbohydrate" type="text">
                        @error('carbohydrate')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Ad_name" class="col-sm-4 col-form-label">KCal
                        <span class="asteriskField">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control" id="kcal" name="KCal" placeholder="Enter total KCal" type="text">
                        @error('KCal')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Ad_name" class="col-sm-4 col-form-label">Price
                        <span class="asteriskField">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control" id="price" name="Price" placeholder="Enter Ad Cost Limit" type="text" >
                        @error('Price')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Add File
                        <span class="asteriskField">*</span></label>

                    <div class="col-sm-3">
                        <input class="form-try" id="add_file" name="image" type="file"  >
                    </div>
                    @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>    
                        @enderror
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-4 col-form-label">Food Category<span class="asteriskField">*
                  </span></label>
                    <div class="col-sm-8">
                        <select class="custom-select" id="inputGroupSelect01" name="category_id"  style="margin-top: 8px;" >
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

                <div class="form-group text-center row">
                    <div class="col-sm-12">
                        <input type="submit" name="Submit" value="Submit" class="btn btn-success" id="submit-id-signup" onkeypress="" height="100" width="100">
                    </div>
                </div>
                
            </form>
                </div>
              </div>
            </div>
          </div>
          
@endsection
@section('script')

@endsection
