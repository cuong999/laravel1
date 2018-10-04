<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Quản lý User</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href=" {{asset('/Login/css/font-awesome.css')}}  "> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="{{asset('/Login/css/style.css')}}" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<style type="text/css">
	.help-block{
		color: red;
		width: 100%;
	}
	.error {
		margin: 20px 0;
	}
</style>
<!-- //web-fonts -->
</head>
<body>
	<!--header-->
	<div class="header-w3l">
		<h1> Đăng Nhập Hệ Thống</h1>
	</div>
	<!--//header-->
		<!--main-->
	<div class="main-w3layouts-agileinfo">
       <!--form-stars-here-->
			<div class="wthree-form">
				<h2>Fill out the form below to login</h2>
				@if($errors->has('errorlogin'))
					<div class="help-block">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{$errors->first('errorlogin')}}
					</div>
				@endif
				<form action="/addlogin" method="post">
					<div class="form-sub-w3">
						<input type="text" name="name" placeholder="Username " />
						 
						<div class="icon-w3">
							<i class="fa fa-user" aria-hidden="true"></i>
						</div>
					</div>
					<div class="error">
						@if ($errors->has('name'))
				            <span class="help-block">
				                <strong>{{ $errors->first('name') }}</strong>
				            </span>
				        @endif
						</div>
					<div class="form-sub-w3">
						<input type="password" name="password" placeholder="password" />
						
						<div class="icon-w3">
							<i class="fa fa-unlock-alt" aria-hidden="true"></i>
						</div>
					</div>
					<div class="error">
						@if ($errors->has('password'))
				            <span class="help-block">
				                <strong>{{ $errors->first('password') }}</strong>
				            </span>
				        @endif
					</div>
					<label class="anim">
						<input type="checkbox" class="checkbox" name="remember" id="remember">
						<span>Remember Me</span> 
						<!-- <a href="#">Forgot Password</a> -->
					</label> 
					<div class="clear"></div>
					<div class="submit-agileits">
						<input type="submit" value="Login">
					</div>
					{{ csrf_field() }}
				</form>

			</div>
		<!--//form-ends-here-->
	</div>
	<!--//main-->
	<!--footer-->
	<div class="footer">
		<!-- <p>&copy; 2017 Glassy Login Form. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p> -->
	</div>
	<!--//footer-->
</body>
</html>