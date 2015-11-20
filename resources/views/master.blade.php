<!DOCTYPE html>

<html>
<head>
	<title>SnapShot</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.css">
	<link rel="stylesheet" type="text/css" href="{{ url(elixir('css/vendor.css')) }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/lightbox.css') }}">
	<script type="text/javascript">
	var baseUrl = "{{ url('/')}}";
	</script>
</head>
<body>

  <div class="navbar navbar-default">
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    @if(!Auth::user())
	    <a class="navbar-brand" href="/">SnapShot</a>
	    @else
	    <a class="navbar-brand" href="/gallery/list">SnapShot</a>
	    @endif
	  </div>
	  <div class="navbar-collapse collapse navbar-responsive-collapse">
	    <ul class="nav navbar-nav">
	      @if(!Auth::user())
	      <li><a href="/user/login">Login</a></li>
	      <li><a href="/user/sign-up">Sign Up</a></li>
	      @else
	      <li><a href="/gallery/list">Some Button</a></li>
	      @endif
	    </ul>
	    @if(Auth::user())
	    <ul class="nav navbar-nav navbar-right">
	      <li class="dropdown">
	        <a href="/user/logout" data-target="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li><a href="javascript:void(0)">Action</a></li>
	          <li><a href="javascript:void(0)">Another action</a></li>
	          <li><a href="javascript:void(0)">Something else here</a></li>
	          <li class="divider"></li>
	          <li><a href="javascript:void(0)">Separated link</a></li>
	        </ul>
	      </li>
	    </ul>
	    @elseif(!Auth::user())
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="/about-me">About Me</a></li>
	    </ul>
	    @endif
	  </div>
	</div>

  <div class="container">
  	@if(Session::has('flash_message'))
		<div class="alert alert-success">
			{{Session::get('flash_message')}}
		</div>
		@endif
		@if(Session::has('flash_error'))
		<div class="alert alert-danger">
			{{Session::get('flash_error')}}
		</div>
		@endif
  </div>
		
  <div class="container">
  	@yield('content')
  </div>

  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
  <script type="text/javascript" src="{{ url(elixir('js/vendor/vendor.js')) }}"></script>
  <script type="text/javascript" src="{{ asset('js/vendor/lightbox.min.js') }}"></script>
  <script type="text/javascript" src="{{ url(elixir('js/custom.js')) }}"></script>
</body>
</html>