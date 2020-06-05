@extends('layouts.master')

@section('title')
Edit-Register
@endsection

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3>
						Edit Role Register
					</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<form action="{{url('/role-Register-update/'.$users->id)}}" method="POST" enctype="multipart/form-data">
								{{csrf_field()}}
								{{method_field('PUT')}}
								<div class="form-group">
								    <label>Name</label>
								    <input type="text" name="name" value="{{$users->name}}" class="form-control">
		 						</div>
	 						  	<div class="form-group">
								    <label>Type of Role</label>
								    <select name="usertype" class="form-control">
								    	<option value="admin">Admin</option>
								    	<option value="user">User</option>
								    </select>
	 						 	</div>
 						 <button type="submit" class="btn btn-success">Update</button>
 						 <a href="/role-Register" class="btn btn-danger">Cancle</a>
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