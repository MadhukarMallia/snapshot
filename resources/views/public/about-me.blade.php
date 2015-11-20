@extends('master')

@section('content')
<div class="jumbotron col-sm-6 col-sm-push-3" style="margin-top: 2em;">
	<h1>About Me</h1>

	<div class="list-group">
	    <div class="list-group-item">
	        <div class="row-picture">
	            <img class="circle" src="https://media.licdn.com/mpr/mpr/shrinknp_200_200/p/5/005/078/17a/2e002d4.jpg" alt="icon">
	        </div>
	        <div class="row-content">
	            <p class="list-group-item-text">Madhukar M Mallia</p>
	            <div class="icon-preview">
	            	<i class="mdi-action-work list-group-item-heading"> Full Stack Developer</i>
	            </div>
	            <div class="icon-preview">
	            	<i class="mdi-communication-call list-group-item-heading"> +91-8547175215</i>
	            </div>
	            <div class="icon-preview">
	            	<i class="mdi-communication-email list-group-item-heading"> madhukar.mec@gmail.com</i>
	            </div>
	        </div>
	    </div>
	    <div class="list-group-separator"></div>
	    <div class="row">
	    	<div class="col-md-4 col-md-offset-2">
	    	  <!-- <input /> -->
	    	  <img style="width: 20%;" src="{{ asset('images/linkedin.svg') }}">
	    	  <img style="width: 20%;" src="{{ asset('images/Github.svg') }}">
	    	</div>
	    </div>
	</div>
</div>
@endsection