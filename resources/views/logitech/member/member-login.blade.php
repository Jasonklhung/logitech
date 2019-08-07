@extends('logitech.includes.header')

@section('index')
	<!-- 主要內容 -->
	<div class="member-login">
		<div class="container-fluid">
			<div class="content">
        		<h2>註冊</h2>
        		<p class="mg-bt-20">立即加入，參與更多羅技官方活動！</p>
        		@if(session()->has('error2'))
                <span style="color:red"><p>帳號密碼錯誤</p></span>
                @endif
        		<form method="post" action="{{ route('memberlogin') }}">
                    @csrf
                    <input type="text" class="form-control modal-input" style="margin-bottom: 5px;" name="cMobile" placeholder="請輸入手機號碼" required="">
                    <input type="password" class="form-control modal-input mg-bt-20" name="password" placeholder="請輸入密碼" required="">
                    <div class="button-group mg-bt-20">
                     <!-- <button type="submit" class="btn btn-default login-success main-button-sm" data-toggle="modal" data-target="#login-success" data-dismiss="modal">登入</button> -->
                     <button type="submit" class="btn btn-default login-success main-button-sm" data-toggle="modal">登入</button>
                     <!-- <button type="button" class="btn btn-default register main-button-sm" data-toggle="modal" data-target="#register" data-dismiss="modal">註冊</button> -->
                     <button type="button" class="btn btn-default register main-button-sm" data-toggle="modal" data-target="#register" data-dismiss="modal">註冊</button>
                 </div>
             </form>
        	</div>
            <!-- 公告 -->
            <div class="content announcement">
                <h2>會員公告</h2>
                    <p class="mg-bt-20">親愛的羅技粉絲您好！<br>凡於5/13前，於羅技活動網站<br>(<a href="https://www.logitech-event.com.tw/" target="_blank">https://www.logitech-event.com.tw/</a>)<br>以facebook快速登入者，<br>請重新點選註冊會員，以維護您參加活動的權益，造成您的不便，敬請見諒。
                    </p>    
            </div>
	  	</div>
	</div>
@endsection