@extends('master')

@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
	  	@foreach ($errors->all() as $error)
	    <li>{{ $error }}</li>
	    @endforeach
	</ul>
</div>
@endif
<div class="jumbotron col-sm-6 col-sm-push-3" style="margin-top: 5em;">
	<h1>Sign Up</h1>

	<form action="{{ url('user/do-signup') }}"
	  method="POST">
	    <div class="form-group">
	  	  <input type="text"
	  	  id="name"
	  	  name="name"
	  	  placeholder="Enter your name"
	  	  class="form-control"
	  	  value="{{ old('name')}}"/>
	  </div>

	  <div class="form-group">
	  	<input type="text"
	  	  id="email"
	  	  name="email"
	  	  placeholder="Enter your email address"
	  	  class="form-control"
	  	  value="{{ old('email')}}"/>
	  </div>

	  <div class="form-group">
	  	<input type="password"
	  	  id="password"
	  	  name="password"
	  	  placeholder="Enter your password"
	  	  class="form-control"
	  	  value="{{ old('password')}}"/>
	  </div>

	  <div class="form-group row">
	    <div class="col-md-4">
	      <input type="submit"
		  	  value="Sign Up"
		  	  name="signUp"
		  	  id="sign-up-btn"
		  	  class="btn btn-primary"/>
		  </div>
	  	<div class="col-md-8" style="padding: 10px;">
		  	<img style="width: 10%;" src="{{ asset('images/facebook-small.svg') }}">
		  	<img style="width: 10%;" src="{{ asset('images/instagram-small.svg') }}">
		  	<img style="width: 10%;" src="{{ asset('images/google-g-plus-small.svg') }}">
		  </div>
	  </div>

	  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
	</form>
</div>
@endsection