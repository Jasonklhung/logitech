<nav class="navbar main-bgcolor white-font navbar-fixed-top back-nav">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
				<!-- <span class="icon-bar"></span> -->
				<span class="icon-bar"></span>
				<!-- <span class="icon-bar"></span>   -->                      
			</button>
			<a class="navbar-brand" href="#"><img class="logo" src="{{ asset("back/img/Logitech_logo.png") }}" alt=""></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li class="smshow"><a href=""><span class="lnr lnr-chart-bars"></span> 數據儀表板</a></li>
				<li class="smshow"><a href=""><span class="lnr lnr-magic-wand"></span> 版型設定</a></li>
				<li class="smshow"><a href=""><span class="lnr lnr-user"></span> 帳號資訊</a></li>
				<li class="smshow"><a href=""><span class="lnr lnr-star"></span> 活動管理</a></li>
				<!--<li class="smshow"><a href=""><span class="lnr lnr-bullhorn"></span> 最新消息</a></li>-->
				<li class="smshow"><a href=""><span class="lnr lnr-users"></span> 會員管理</a></li>
				<li><a href="https://www.logitech-event.com.tw/"><span class="lnr lnr-undo"></span> 回前台</a></li>
				<li><a href="{{ url('/back-logout') }}""><span class="lnr lnr-exit"></span> 登出</a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="container-fluid">
	<nav class="navbar navbar-default left-bar">
		<div class="">
			<div class="close-menu"><span class="lnr lnr-cross"></span></div>
			<div class="open-menu"><div><span class="lnr lnr-arrow-right-circle"></span></div><p class="hide-text">展開選單</p></div>
			<ul class="mylnav">
				<a href="{{ url('/backstage/dashboard') }}"><li><span class="lnr lnr-chart-bars"></span> 數據儀表板<div class='nav-triangle'></div></li></a>
				<a href="{{ url('/backstage/type') }}"><li><span class="lnr lnr-magic-wand"></span> 版型設定<div class='nav-triangle'></div></li></a>
				<a  href="{{ url('/backstage/account-info') }}"><li><span class="lnr lnr-user"></span> 帳號資訊<div class='nav-triangle'></div></li></a>
				<a  href="{{ url('/backstage/event') }}"><li><span class="lnr lnr-star"></span> 活動管理<div class='nav-triangle'></div></li></a>
				<!--<a href="{{ url('/backstage/news') }}"><li><span class="lnr lnr-bullhorn"></span> 最新消息<div class='nav-triangle'></div></li></a>-->
				<a  href="{{ url('/backstage/member') }}"><li><span class="lnr lnr-users"></span> 會員管理<div class='nav-triangle'></div></li></a>
			</ul>
		</div>
	</nav>
