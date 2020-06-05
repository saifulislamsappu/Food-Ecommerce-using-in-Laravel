@extends('welcome')

@section('content')

    <div class="col-12">
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header mb-2"><h3>Profile</h3></div>
   
                <div class="card-body">
                    <form method="POST" action="">
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Name</label>
  
                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="current_password" value="{{Auth::user()->name}}" readonly>

                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Email</label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="text" class="form-control" name="new_password" value="{{Auth::user()->email}}" readonly>
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Phone</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="text" class="form-control" name="new_confirm_password" value="{{Auth::user()->phone}}" readonly>
                            </div>
                        </div>

                    </form>
                    <a href="{{url('/change-password')}}" class="align-center" style="text-decoration: none;">Change Password</a>
                </div>
            </div>
        </div>
    </div>
</div>

</div>




@endsection