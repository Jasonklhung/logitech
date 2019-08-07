@extends('back.includes.header-login')

@section('index')

<div class="bg1"></div>
	<img src="/back/img/bgdec-1.png" class="bgdec1">
	<img src="/back/img/bgdec-1.png" class="bgdec2">
	<div class="bg2">
		<img src="/back/img/Logitech_logo.png" alt="" class="loginlogo">

		<!-- Logitech<br> -->Event
			<div class="login-frame">
				<form style="width: 100%;" method="POST" action="{{ route('testlogin') }}">
					@csrf
					<input type="text" class="form-control" placeholder="請輸入您的Email" name="account">
					<input type="password" class="form-control" placeholder="請輸入您的密碼" name="password">
					@auth
					123456789
					@endauth
					@if(session()->has('error'))
					<span class="help-block" style="font-size:15px; color:red" >
						<strong >帳號密碼錯誤</strong>
					</span>
					@endif
					<button type="submit" class="btn enter-btn login-btn">Log in</button>
				</form>
			</div>
	</div>

@endsection