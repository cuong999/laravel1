<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Registration Form</title>
  <link rel="stylesheet" href=" {{ asset('layouts/css/style.css') }}  ">

  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
    <h1 class="register-title">Welcome</h1>
    <form class="register" method="post" action=" /updateus/{{ $getinfo ->id}} ">
        <div class="register-switch">
            <input type="radio" name="sex" value="Nam" id="sex_m" class="register-switch-input"  {{ $getinfo -> gioitinh == 'Nam'? 'checked' : '' }}>
            <label for="sex_m" class="register-switch-label">Nam</label>
            <input type="radio" name="sex" value="Nu" id="sex_f" class="register-switch-input" {{ $getinfo -> gioitinh == 'Nu'? 'checked' : '' }}>
            <label for="sex_f" class="register-switch-label">Nữ</label>
        </div>
        <input type="name" class="register-input" placeholder="Name" name="name" value=" {{$getinfo -> ten}} ">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        <input type="email" class="register-input" placeholder="Email address" name="email" value="{{$getinfo -> email}} ">
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>

        <input type="password" class="register-input" placeholder="Nhập password mới" name="password">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <input type="password" class="register-input" placeholder="Nhập lại password mới" name="password_confirmation">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

        <input type="submit" value="Update Account" class="register-button" >
        {{ csrf_field() }}
     </form>
</body>
</html>
