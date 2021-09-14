@extends('logitech.includes.header-event-info')

@section('index')
	<!-- 主要區域 -->
	@foreach($event as $data)
	<div class="section event-info">
		<div class="container">
			<!-- 第一線以上 -->
			<div class="row flex-stretch">
				<div class="col-md-6 col-xs-12">
					@if($data->aEndRegister < $today)
						@php
							$blacktop = ' black-top';
							$status_div = ' status-end';
							$status = '已結束';
						@endphp
					@else
						@php
							$blacktop = '';
							$status_div = '';
							$status = '活動進行中';
						@endphp
					@endif
					<div class="info square status{{$status_div}}">
						{{$status}}
					</div>
					<h3 class="info event-title">
						{{ $data->aTitle }}
					</h3>
					<div class="info inline-group">
						<div class="square">
							活動日期
						</div>
						<p>{{explode(' ',$data->aStartDate)[0]}} 至 {{explode(' ',$data->aEndDate)[0]}}</p>
					</div>
					<div class="info inline-group">
						<div class="square">
							活動日期登錄截止日期
						</div>
						<p>{{explode(' ',$data->aEndRegister)[0]}}止</p>
						<p><h5 class="shares">
							<a href="Javascript:void(0);" onclick="heateorSssPopup('https://www.facebook.com/dialog/share?app_id=210518683208429&display=page&href=https://www.logitech-event.com.tw/event/event-info/{{$data->id}}','{{$data->id}}')">
								<div class="icon-frame">
									<img src="{{ url("img/fb_share2.jpg") }}">
								</div>
							</a>
							<a href="https://timeline.line.me/social-plugin/share?url=https://www.logitech-event.com.tw/event/event-info/{{$data->id}} {{$data->aDescription}}" onclick="ShareClick('{{$data->id}}','Line')" target="_blank">
								<div class="icon-frame">
									<img src="{{ url("img/line_share.jpg") }}">
								</div>
							</a>
							<a href="mailto:?subject={{$data->aSubject}}&body={{$data->aDescription}} https://www.logitech-event.com.tw/event/event-info/{{$data->id}}" onclick="ShareClick('{{$data->id}}','Email')" target="_blank">
								<div class="icon-frame">
									<img src="{{ url("img/mail.jpg") }}">
								</div>
							</a>
						</h5></p>
					</div>
					<div class="info">
				      @if($data->aEndRegister < $today)
				      @php
				       date_default_timezone_set("Asia/Taipei");

				       if(date('Y-m-d H:i:s', strtotime('2019-09-15 19:00:00')) < date('Y-m-d H:i:s', strtotime('now')) & $data->id == 10){
				      @endphp
				        <a class="btn btn-default award-button" type="button" data-toggle="modal" href="#award-modal">得獎名單</a>
				      @php
				       }
				       else{
				      @endphp
				        <a class="btn btn-default award-button" type="button" data-toggle="modal" onclick="showAward('{{ $data->id }}');">得獎名單</a>
				      @php
				        
				       }
				      @endphp
				      @else
				       @auth
				        @if(Auth::guard('web')->user()->cAuthOK == 'Y')
				        <a class="btn btn-default main-button" type="button" data-toggle="modal" href="#agree">我要登錄</a>
				        @else
				        <a class="btn btn-default main-button" type="button" id="AuthFalied">我要登錄</a>
				        <input hidden="" id="Authcel" value="{{Auth::guard('web')->user()->cMobile}}">
				        <input hidden="" id="Authid" value="{{Auth::guard('web')->user()->id}}">
				        @endif
				       @endauth
				       
				       @guest
				       <a class="btn btn-default main-button" type="button" data-toggle="modal" href="#pleaselogin">我要登錄</a>
				       @endguest
				      <a class="btn btn-default award-button" type="button" data-toggle="modal" onclick="showAward('{{ $data->id }}');">得獎名單</a>
				      @endif
				     </div>
					<!-- <div class="info block" style="display: none;"> -->
					<div class="info block">
						<p class="gray-font">備註說明</p>
						<h5 class="gray-font">{!! $data->aMemo !!}</h5>
					</div>
				</div>
				<div class="col-md-6 col-xs-12 order">
					<div class="info-frame {{$blacktop}}">
						<img src="../../{{ substr($data->aImage,1) }}" alt="">
					</div>
				</div>
				<!-- 20200214 通路切版(曾) -->
				@if( $data->id == '13')
				<div class="col-md-12 col-xs-12 logo-group">
					<div class="logo-r">
						<a href="https://store.logitech.tw/" onclick="recordStoreClick('25')" class="shop" target="_blank">
							<img src="/img/logo-0.png" alt="羅技官方旗艦店">
						</a>
						<a href="https://lihi1.cc/2CwA6" onclick="recordStoreClick('28')" class="shop" target="_blank">
							<img src="/img/logo-1.png" alt="PChome">
						</a>
						<a href="https://lihi1.cc/UOJH9" onclick="recordStoreClick('29')" class="shop" target="_blank">
							<img src="/img/logo-3.png" alt="Yahoo">
						</a>
						<a href="https://lihi1.cc/08tf8" onclick="recordStoreClick('30')" class="shop" target="_blank">
							<img src="/img/logo-5.png" alt="MOMO">
						</a>
						<a href="https://lihi1.cc/IJKQS" onclick="recordStoreClick('31')" class="shop" target="_blank">
							<img src="/img/logo-7.png" alt="蝦皮">
						</a>
						<a href="https://lihi1.cc/nsXQZ" onclick="recordStoreClick('34')" class="shop" target="_blank">
							<img src="/img/logo-2.png" alt="燦坤">
						</a>
						<a href="https://lihi1.com/CyZvC" onclick="recordStoreClick('37')" class="shop" target="_blank">
							<img src="/img/logo-4.png" alt="三井3C">
						</a>
						<a href="https://lihi1.cc/ioq2u" onclick="recordStoreClick('36')" class="shop" target="_blank">
							<img src="/img/logo-6.png" alt="良興購物網">
						</a>
						<a href="https://lihi1.cc/nfOrB" onclick="recordStoreClick('35')" class="shop" target="_blank">
							<img src="/img/logo-8.png" alt="順發3C">
						</a>
						<a href="https://lihi1.com/2x3pb" onclick="recordStoreClick('32')" class="shop" target="_blank">
							<img src="/img/logo-9.png" alt="UDN">
						</a>
					</div>
				</div>
				@endif
				<!-- 20200214 通路切版(曾) -->
				@if( $data->id == '11')
				<ul class="ss-store">
					<li><a href="https://24h.pchome.com.tw/store/DSAR4Z" onclick="recordStoreClick('28')" target="_blank"><img src="../../img/pchome.png" height="40"></a></li>
					<li><a href="https://www.momoshop.com.tw/category/DgrpCategory.jsp?d_code=1904500496" onclick="recordStoreClick('30')" target="_blank"><img src="../../img/momo.png"></a></li>
					<li><a href="https://shopee.tw/logitech_official_shop?page=0&shopCollection=17382536" onclick="recordStoreClick('31')" target="_blank"><img src="../../img/shoope.png"></a></li>
					<!--<li><a href="https://tw.buy.yahoo.com/act/activity/logitech01.html#ff" onclick="recordStoreClick('29')" target="_blank"><img src="../../img/yahoo.png"></a></li>-->
					<li><a href="http://www.tkec.com.tw/dic2.aspx?cid=14719&aid=5959&hid=112061" onclick="recordStoreClick('34')" target="_blank"><img src="../../img/燦坤.png"></a></li>
					<!--<li><a href="https://www.isunfar.com.tw/events/AD06122992#/bcNo=0&ept=0" onclick="recordStoreClick('8')" target="_blank"><img src="../../img/sunfar.png"></a></li>-->
					<li><a href="https://www.eclife.com.tw/EDM/Cont5056.htm" onclick="recordStoreClick('36')" target="_blank"><img src="../../img/EClife.png"></a></li>
					<li><a href="https://www.sanjing3c.com.tw/ecm.php?id=240#func_2352" onclick="recordStoreClick('37')" target="_blank"><img src="../../img/sunfar.png"></a></li>
					<!--<li><a href="https://www.sanjing3c.com.tw/ecm.php?id=240#func_2352" onclick="recordStoreClick('9')" target="_blank"><img src="../../img/sanjing.png"></a></li>-->
				</ul>
				@endif
			</div>
			<!-- 第一線到第二線 -->
			<div class="row">
				<div class="triangle2">	
				</div>
				<div class="mg-bt-60 square info-title">
					活動說明及辦法
				</div>
				<div class="mg-bt-60 text-area">
					<p>{!! $data->aRules !!}</p>
				</div>
			</div>
			<!-- 第二線到回上一頁以上 -->
			<div class="row">
				<div class="triangle2">	
				</div>
				<div class="mg-bt-60 square info-title">
					注意事項
				</div>
				<div class="mg-bt-60 text-area">
					<p>{!! $data->aCautions  !!}</p>
				</div>
			</div>
			<!-- 回上一頁按鈕-->
			<div class="x-center">
				
					<a href="{{route('index')}}" class="btn btn-default main-button">回首頁</a>
				
			</div>
		</div>
	</div>
	<footer class="black-back white-font">
		<p>Copyright © 2019 Logitech. 保留所有權利</p>
	</footer>
	@endforeach

	<!--報名Modal-->
	@auth
    <div class="modal fade modal-style1" id="apply" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-noborder modal-header-color">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-h4"><span class="lnr lnr-select" style="font-size: 16px"></span> 登錄活動</h4>
                </div>
                <div class="modal-body pd-top-30">
                	@if ($event[0]['id'] == '13')
                	<form id="applyForm13">
                	@else
                    <form id="applyForm">
                    @endif
                    	@csrf

                    	<div class="alert alert-danger">
                    		<ul>
                    			@foreach($errors as $error)
                    			<li>{{ $error }}</li>
                    			@endforeach
                    		</ul>
                    	</div>

                        <table class="apply-form">
                        	@foreach($event as $data)
                        		<input type="hidden" name="aId" id="aId" class="form-control" value="{{$data->id}}" readonly="">
                        	@endforeach
                        		<input type="hidden" name="aInvoice"  class="form-control" value="{{$event[0]['aInvoice']}}" readonly="">
                        		<input type="hidden" name="aMode"  class="form-control" value="{{$event[0]['aMode']}}" readonly="">
                        		<input type="hidden" name="aQRmode"  class="form-control" value="{{$event[0]['aQRmode']}}" readonly="">
                        		<input type="hidden" name="consumerid"  class="form-control" value="{{Auth::guard('web')->user()->id}}" readonly="">
                        	<tr>
                        		<td><span>* </span>姓名</td>
                        		<td>							
                        			<input type="text" name="applyName" class="form-control" value="{{Auth::guard('web')->user()->cName}}" placeholder="請填入真實姓名" readonly="">
                        		</td>
                        	</tr>
                        	<tr>
                        		<td><span>* </span>性別</td>
                        		@if(Auth::guard('web')->user()->cGender == 'M')
                        		<td><div class="inline-group"><div><input type="radio" name="applyGender" value="M" checked="checked" readonly="">男</div><div><input type="radio" name="applyGender" value="F" readonly="">女</div></div>
                        		</td>
                        		@else
                        		<td><div class="inline-group"><div><input type="radio" name="applyGender" value="M" readonly="">男</div><div><input type="radio" name="applyGender" value="F" checked="checked" readonly="">女</div></div>
                        		</td>
                        		@endif
                        	</tr>
                        	<tr>
                        		<td><span>* </span>出生年月日</td>
                        		<td><input type="text" name="applyBirthday" class="form-control choose-date" value="{{Auth::guard('web')->user()->cBirthday}}" readonly="">
                        		</td>
                        	</tr>
                        	<tr>
                        		<td><span>* </span>手機</td>
                        		<td><input type="text" name="applyMobile" class="form-control" value="{{Auth::guard('web')->user()->cMobile}}" readonly="">
                        		</td>
                        	</tr>
                        	<tr>
                        		<td><span>* </span>Email</td>
                        		<td><input type="email" name="applyEmail" class="form-control" value="{{Auth::guard('web')->user()->cEmail}}" readonly="">
                        		</td>
                        	</tr>
                        	<tr>
                        		<td><span>* </span>地址</td>
                        		<td>
                        			<div class="input_group">
                        				<select class="form-control" id="applyCity" disabled="">
                        					@if($zip == '')
                        					<option selected value=""></option>
                        					@else
                        					<option selected value="">{{$zip->zCity}}</option>
                        					@endif
                        				</select>
                        				<select class="form-control" id="applyDistinct" disabled="">
                        					@if($zip == '')
                        					<option selected value=""></option>
                        					@else
                        					<option selected value="">{{$zip->zArea}}</option>
                        					@endif
                        				</select>
                        			</div>
                        			<div class="input_group">
                                        <input type="text" name="applyAddress" class="form-control" value="{{Auth::guard('web')->user()->cAddress}}" readonly="">
                                    </div>
                        		</td>
                        	</tr>
                        	<!-- <tr>
                        		<td><span>* </span>購買方式</td>
                                <td><input type="radio" class="realstore" id="realstore" name="buyway" value="實體店面" checked="">實體店面 <input type="radio" class="netstore" id="netstore" name="buyway" value="網路電商">網路電商</td>
                            </tr> -->
                        @if($event[0]['aInvoice'] == 11 || $event[0]['aInvoice'] == 01)
                        	<tr>
                        		<td><span>* </span>發票號碼</td>
                                <td><input type="text" name="applyInvoice" class="form-control" value=""></td>
                            </tr>
                        @else

                        @endif

                        @if($event[0]['aInvoice'] == 11 || $event[0]['aInvoice'] == 10)
                        	<tr>
                                <td><span>* </span>發票圖檔</td>
                                <td>
                                    <div  id="invoiceImg" style="display:none;"></div>
                                    
                                    <label type="button" class="btn btn-default" for="upload-file">上傳發票</label>
                                    <input type="file" id="upload-file" class="hidden" name="upload">
                                    <div id="image-preview"></div>
                                </td>
                            </tr>
                        @else

                        @endif
                        @if($event[0]['aMode'] == 'S')
                        	<tr>
								<td><span>* </span>欲購新機產品</td>
                                <td>
                                    <div class="input_group product-info">
                                    	
										<select class="form-control" id="productCategory" name="productCategory">
											<option value="" selected="selected" disabled="true">產品</option>
											@foreach($product as $data)
                                            <option value="{{$data->pCategory}}">{{$data->pCategory}}</option>
                                            @endforeach
                                        </select>
                                        <select class="form-control" name="productName" id="productName">
											<option value="" selected="selected" disabled="true">型號</option>
										</select>

                                    </div>
                                </td>
                            </tr>
                            <tr>
								<td><span>* </span>舊品品牌</td>
								<td>							
									<input type="text" class="form-control" name="ownBrand">
								</td>
							</tr>
							<tr>
								<td><span>* </span>欲前往經銷商</td>
								<td>
									<div class="input_group">
										<select class="form-control" id="storePurchase" name="storePurchase">
											<option value="" selected="true" disabled="true">選擇經銷商</option>
											@foreach($store as $data)
											<option value="{{$data->sId}}">{{$data->sName}}</option>
											@endforeach
										</select>
									</div>
								</td>
							</tr>
						@else($event[0]['aMode'] == 'P')
							@if($event[0]['id'] == '13' || $event[0]['id'] == '14')
							<tr>
								<td><span></span>是否使用網購</td>
								<td><input type="checkbox" name="netbuy" id="netbuy"></td>
							</tr>
							<tr>
								@if($event[0]['id'] == '14')
								<td id="numberTR5"><span> </span>選擇實體購買通路</td>
								@else
								<td id="numberTR5"><span>* </span>選擇實體購買通路</td>
								@endif
								<td id="numberTR6">
									<div class="input_group">
										<select class="form-control" id="storePurchase2" name="storePurchase2">
											<option value="" selected="true">選擇經銷商</option>
											@foreach($realstore as $data)
											<option value="{{$data->sId}}">{{$data->sName}}</option>
											@endforeach
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td style="display: none" id="numberTR3"><span>* </span>選擇電商購買通路</td>
								<td style="display: none" id="numberTR4">
									<div class="input_group">
										<select class="form-control" id="storePurchase" name="storePurchase">
											<option value="" selected="true">選擇經銷商</option>
											@foreach($store as $data)
											<option value="{{$data->sId}}">{{$data->sName}}</option>
											@endforeach
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td style="display: none" id="numberTR1"><span>* </span>訂單編號</td>
								<td style="display: none" id="numberTR2"><input type="text" name="applyNumber" id="applyNumber" class="form-control" value=""></td>
							</tr>
							<tr>
								<td><span>*</span>選擇登錄產品</td>
                                <td>
                                    <div class="input_group product-info">

										<select class="form-control" id="productCategory" name="productCategory">
											<option value="" selected="true" disabled="true">產品</option>
											@foreach($product as $data)
                                            <option value="{{$data->pCategory}}">{{$data->pCategory}}</option>
                                            @endforeach
                                        </select>
                                        <select class="form-control" name="productName" id="productName" onchange="pProductImage()">
											<option value="" selected="true" disabled="true">型號</option>
										</select>

                                    </div>
                                </td>
                            </tr>
                            <!-- <tr>
                            	<td>贈品圖</td>
                            	<td><img id="productImage"></td>
                            </tr> -->
                            <tr>
                        		<td><span>* </span>數量</td>
                                <td><input type="text" name="rQuantity" class="form-control" value=""></td>
                            </tr>
                            @endif
                            @if($event[0]['id'] == '12')
                            <tr>
                        		<td><span>* </span>數量</td>
                                <td><input type="text" name="rQuantity" class="form-control" value=""></td>
                            </tr>
                            @endif
                        @endif
						</table>
                </div>
                <div class="modal-footer modal-noborder x-center">
				@if($event[0]['aMode'] == 'S' && $register[0]['rUsed'] == 'Y')
					<button type="submit" class="btn btn-default main-button apply" data-toggle="modal" onclick="alreadUsed('Y')">確定</button>
				@elseif ($event[0]['aMode'] == 'S' && $register[0]['rUsed'] == 'N')
					<button type="submit" id="btnConfirm" class="btn btn-default main-button apply" data-toggle="modal" id="registerSubmit">確定</button>
				@elseif ($event[0]['aMode'] == 'P')
					<button type="submit" id="btnConfirm" class="btn btn-default main-button apply" data-toggle="modal" id="registerSubmit">確定</button>
				@endif
				</div>
				</form>	
            </div>
        </div>
    </div>
    @endauth

    <script type="text/javascript">
    	var prtCount = 1 ;
        var imgCount = 1 ;

    	// 上傳發票預覽
		$("#upload-file").change(function(){
		  // $("#image-preview").html(""); // 清除預覽
		  readURL(this);
		});

		function readURL(input){
		  if (input.files && input.files.length >= 0) {
		    for(var i = 0; i < input.files.length; i ++){
		      var reader = new FileReader();
		      reader.onload = function (e) {
		        // var img = $("<img style='width: 100%; margin-top: 3px;'>").attr('src', e.target.result);
		        var img = $("<img style='width: 50%; margin-top: 3px;' id='imgShw"+imgCount+"' onclick='removeImg("+imgCount+")' title='點我刪除'>").attr('src', e.target.result);
		        $("#image-preview").append(img);
		      }
		      reader.readAsDataURL(input.files[i]);
		    }
		  }else{
		     var noPictures = $("<p>目前沒有圖片</p>");
		     $("#image-preview").append(noPictures);
		  }
		}
		
		function removeImg(no) {
            $('#imgShw' + no).remove() ;
            $('#imgIdx' + no).remove() ;
        }
    </script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		var id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);

    		@if(Auth::check())
                var consumerId = "{{ Auth::user()->id }}";
                $.ajax({
                    method:'post',
                    url:'../../api/ActivityClick',
                    dataType:'json',
                    data:{
                        'ActivityId':id,
                        'consumerId':consumerId
                    },
                    success:function(res){

                    }
                })
            @else
                $.ajax({
                    method:'post',
                    url:'../../api/ActivityClick',
                    dataType:'json',
                    data:{
                        'ActivityId':id,
                        'consumerId':'null'
                    },
                    success:function(res){
                        
                    }
                })
            @endif

    	})
    </script>

@endsection