

<nav class="navbar main-bgcolor white-font navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="{{ route('index') }}"><img class="logo" src="{{ url("img/Logitech_logo.png") }}" alt=""></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav nav-center">
            <li><a href="{{ url('/') }}">首頁</a></li>
            <li><a href="{{ route('eventA') }}">活動專區</a></li>
            <li><a href="{{ route('awardB') }}">得獎公告</a></li>
            @auth
            <li><a href="{{ url('member') }}">會員專區</a></li>
            @endauth

            @guest
            <li><a href="{{ url('member-login') }}">會員專區</a></li>
            @endguest
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <!-- 下方li除了FBlogo常駐之外需判斷狀況出現(未登入狀態:會員登入;登入狀態:Hi詩婷、會員登出) -->
            <!-- <li><a href="#"> Hi 詩婷</a></li>
            <li><a href="#"><span class="lnr lnr-exit-up"></span> 會員登出</a></li> -->

            <!-- <li><a data-toggle="modal" href="#" onclick="logout()"><span class="lnr lnr-user"></span> 會員登出</a></li> -->
            @auth
            <li><a data-toggle="modal" href="{{ url('/logout') }}"><span class="lnr lnr-user"></span>會員登出({{Auth::guard('web')->user()->cName}})</a></li>
            @endauth

            @guest
             <li><a data-toggle="modal" href="#pleaselogin2"><span class="lnr lnr-user"></span>會員登入</a></li>
            @endguest
           

            <li><a href="https://www.facebook.com/logitech.taiwan/?brand_redir=273503033533" target="_blank"><img class="fblogo" src="{{ url("img/facebook-01.png") }}"></a></li>
        </ul>
    </div>
  </div>
</nav>

