<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
    
    <title>Logitech</title>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">

    @include('logitech.includes.activityMeta')

    <meta name="apple-touch-fullscreen" content="YES" />
    <link rel="shortcut icon" href="https://www.logitech-event.com.tw/img/touch-icon.ico"/>
    <link rel="apple-touch-icon-precomposed" href="https://www.logitech-event.com.tw/img/touch-icon.png"/>

    <link rel="stylesheet" href="{{ asset("logitech/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("logitech/css/responsive.bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("logitech/css/animate.min.css") }}">
    
    <link rel="stylesheet" href="{{ asset("logitech/".substr($css['sCSS'],1)." ") }}">
    
    <link rel="stylesheet" href="{{ asset("logitech/css/responsive.css") }}">
    <link rel="stylesheet" href="{{ asset("logitech/css/bootstrap-datepicker.min.css") }}">
    <link rel="stylesheet" href="{{ asset("logitech/css/fileinput.min.css") }}">
    <link rel="stylesheet" href="{{ asset("logitech/css/linearicons/linearicons.css") }}">

    <script src="{{ asset("logitech/js/jquery.min.js") }}"></script>
    <script src="{{ asset("logitech/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("logitech/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("logitech/js/dataTables.responsive.min.js") }}"></script>
    <script src="{{ asset("logitech/js/datepicker/bootstrap-datepicker.min.js") }}"></script>
    <script src="{{ asset("logitech/js/datepicker/bootstrap-datepicker.zh-TW.min.js") }}"></script>
    <script src="{{ asset("logitech/js/fileinput/fileinput.min.js") }}"></script>
    <script src="{{ asset("logitech/js/fileinput/locales/zh-TW.js") }}"></script>
    <script src="{{ asset("logitech/js/responsive.bootstrap.min.js") }}"></script>
	<script type="text/javascript" charset="utf8" src="https://accutrackjs-test.azurewebsites.net/track.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116683249-8"></script>
    <script>
    	window.dataLayer = window.dataLayer || [];
    	function gtag(){dataLayer.push(arguments);}
    	gtag('js', new Date());

    	gtag('config', 'UA-116683249-8');
    </script>
	 <!-- Google Tag Manager -->
	 <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	 	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	 j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WQFQSNC');</script>
	<!-- End Google Tag Manager -->
	<script>
		function heateorSssPopup(e,activity) {
            @if(Auth::check())
                var consumerId = "{{ Auth::user()->id }}";
                $.ajax({
                    method:'post',
                    url:"{{route('ShareClick')}}",
                    dataType:'json',
                    data:{
                        'activity':activity,
                        'type':'FB',
                        'consumerId':consumerId
                    },
                    success:function(res){

                    }
                })
            @else
                $.ajax({
                    method:'post',
                    url:"{{route('ShareClick')}}",
                    dataType:'json',
                    data:{
                        'activity':activity,
                        'type':'FB',
                        'consumerId':'null'
                    },
                    success:function(res){
                        
                    }
                })
            @endif
            ;window.open(e,"popUpWindow","height=400,width=600,left=400,top=100,resizable,scrollbars,toolbar=0,personalbar=0,menubar=no,location=no,directories=no,status")}
	</script>
</head>
<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQFQSNC"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	@include('logitech.includes.navbar')

	@yield('index')

	@include('logitech.includes.modals')
    
    <script src="{{ asset("logitech/js/logitech-events.js") }}"></script>
	<script type="text/javascript">
        // input 選取日期
        $('.choose-date').datepicker({
            format: "yyyy-mm-dd",
            language: "zh-TW",
            autoclose: true
        });
        
        // 活動hover特效
        // $(".frame").mouseover(function(){
        //  $(this).addClass("frame-hover");
        // });
        // $(".frame").mouseout(function(){
        //  $(this).removeClass("frame-hover");
        // });

        
        // 控制當標題小於60個字元 螢幕小於1024時50字元
        $(document).ready(function(){
            redressTitle() ;
            
        });
        $(window).resize(function(){
            redressTitle() ;
        });
        

        function redressTitle() {
            if($(window).width()<1024){
                $(".frame-info h4").each(function(){
                    var oritext=$(this).text();
                    $(this).attr("title",oritext);
                    var text=$(this).text();
                    var show=0
                    var j=0
                    for(i=0;i<text.length;i++){
                        if(text.charCodeAt(i)>256){
                            j+=2;
                            if(j>50){
                                $(this).text(text.substring(0,i)+"...");
                                i=text.length
                            }
                        }else{
                            j++;
                            if(j>50){
                                $(this).text(text.substring(0,i)+"...");
                                i=text.length
                            }
                        }
                    }

                });
            }else{
                $(".frame-info h4").each(function(){
                    var text=$(this).text();
                    var show=0
                    var j=0
                    for(i=0;i<text.length;i++){
                        if(text.charCodeAt(i)>256){
                            j+=2;
                            if(j>60){
                                $(this).text(text.substring(0,i)+"...");
                                i=text.length
                            }
                        }else{
                            j++;
                            if(j>60){
                                $(this).text(text.substring(0,i)+"...");
                                i=text.length
                            }
                        }
                    }
                    
                });
            }
        }
        
        
    </script>

    @if(session()->has('error'))
    <script>
        $('#pleaselogin2').modal('show');
    </script>
    @endif

    @if (session()->has('error_event'))
    <script>
        $('#pleaselogin').modal('show');
    </script>
    @endif

    @if (session()->has('success-eventinfo'))
    <script>
        $('#agree').modal('show');
    </script>
    @endif


    @if(session()->has('register'))
    <script>
        $('#phone-verify2').modal('show');
        var cTel = "{{ Session::get('register') }}";
        var id = "{{ Session::get('id') }}";
        $.ajax({
            url:"{{route('Authcode')}}",
            method:"POST",
            dataType: "text",
            data:{
                'cTel':cTel,
                'id':id,
            },
            success:function(txt){
                if (txt == 'OK') {
                    alert('驗證碼已送出、請確認！') ;
                }
                else console.log(txt) ;
            }
        });
    </script>
    @endif

    @if(session()->has('id'))
    <script>
        //重新產出驗證碼
        function regenerateSMSauthCode() {
            var cTel = "{{ Session::get('register') }}";
            var id = "{{ Session::get('id') }}";
            $.ajax({
                url:"{{route('ResendAuthcode')}}",
                method:"POST",
                dataType: "text",
                data:{
                    'id':id,
                    'cTel':cTel,
                },
                success:function(txt){
                    if (txt == 'OK') {
                        alert('驗證碼已送出、請確認！') ;
                    }
                    else console.log(txt) ;
                }
            });
        }

        //驗證碼確認
        function authCheck() {
            var id = "{{ Session::get('id') }}";
            var code = $('#smsAuthCode').val() ;
            $.ajax({
                url:"{{route('authCheck')}}",
                method:"POST",
                dataType: "text",
                data:{
                    'id':id,
                    'code':code,
                },
                success:function(txt){
                    if (txt == 'OK') {
                        $('#phone-verify2').modal('hide') ;
                        $('#success2').modal('show') ;
                    }
                    else {
                        alert("驗證碼錯誤!!請重新輸入") ;
                    }
                }
            });
        }
    </script>
    @endif
    <script type="text/javascript">
        function recordStoreClick(id)
        {
            @if(Auth::check())
                var consumerId = "{{ Auth::user()->id }}";
                $.ajax({
                    method:'post',
                    url:'../../api/StoreClick',
                    dataType:'json',
                    data:{
                        'StoreId':id,
                        'consumerId':consumerId
                    },
                    success:function(res){

                    }
                })
            @else
                $.ajax({
                    method:'post',
                    url:'../../api/StoreClick',
                    dataType:'json',
                    data:{
                        'StoreId':id,
                        'consumerId':'null'
                    },
                    success:function(res){
                        
                    }
                })
            @endif
        }

        function ShareClick(activity,type)
        {
            @if(Auth::check())
                var consumerId = "{{ Auth::user()->id }}";
                $.ajax({
                    method:'post',
                    url:"{{route('ShareClick')}}",
                    dataType:'json',
                    data:{
                        'activity':activity,
                        'type':type,
                        'consumerId':consumerId
                    },
                    success:function(res){

                    }
                })
            @else
                $.ajax({
                    method:'post',
                    url:"{{route('ShareClick')}}",
                    dataType:'json',
                    data:{
                        'activity':activity,
                        'type':type,
                        'consumerId':'null'
                    },
                    success:function(res){
                        
                    }
                })
            @endif
        }
    </script>
    <script type="text/javascript">
        //註冊選擇區域
        $(document).on('change', '#regCity', function(){
            var regCity = $('#regCity').val();
            $.ajax({
                url:"{{route('selArea')}}",  
                method:"POST",
                data:{
                    'regCity':regCity,
                },                  
                success:function(res){
                    var selOpts = "";
                    $.each(res, function (i, item) {
                        selOpts += "<option value='"+item.zZip+"'>"+item.zArea+"</option>";
                    })
                    $("#regDistinct").empty();
                    $('#regDistinct').append(selOpts);
                }
            })
        });
    </script>
</body>
</html>
