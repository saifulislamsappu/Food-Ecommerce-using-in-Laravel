@extends('layouts.master')

@section('title')
Register
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Food Categories ADD
                  
                </h4>
                   @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              </div>
              <div class="card-body">
                <form id="my_form" class="form-horizontal" method="POST" action="{{url('category-store')}}">
                  {{csrf_field()}}
               

                <div class="form-group row">
                    <label for="categories_name" class="col-sm-4 col-form-label">Categories Name
                        <span class="asteriskField">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control" id="name" name="categories_name" placeholder="Enter Categories Name" type="text">
                    </div>
            
                </div>
                @error('categories_name')
                   <div class="alert alert-danger" style="margin-left: 197px;">{{ $message}}</div>
                @enderror

                <div class="form-group text-center row">
                    <div class="col-sm-8 ml-auto">
                        <button type="submit" class="btn btn-info" style="background-color: #163356">Save</button>
                    </div>
                </div>
            </form>
              </div>
            </div>
          </div>
          
@endsection
@section('script')
@endsection
