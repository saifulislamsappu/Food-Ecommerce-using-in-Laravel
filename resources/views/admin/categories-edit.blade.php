@extends('layouts.master')

@section('title')
Edit-Food-Categories
@endsection

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3>
						Edit Food Categories
						@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<form action="{{url('food-categories-update/'.$categories->id)}}" method="POST">
								{{csrf_field()}}
								{{method_field('PUT')}}
								
								<div class="form-group">
								    <label>Name</label>
								    <input type="text" name="categories_name" value="{{$categories->categories_name}}" class="form-control">
		 						</div>
	 						  
 						 <button type="submit" class="btn btn-success">Update</button>
 						 <a href="{{url('food-categories')}}" class="btn btn-danger">Cancle</a>
					</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection



@section('script')
@endsection