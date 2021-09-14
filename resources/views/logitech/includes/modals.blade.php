<?php
$privacy1 = '感謝您參與本次活動，您個人的隱私權，主辦單位羅技電子絕對尊重並予以保護。為了幫助您瞭解，本活動如何蒐集、應用及保護您所提供的個人資訊，請您務必詳細閱讀下列資訊：

❖ 	關於政策適用範圍
以下的隱私權政策，適用於您在參加本活動時，所涉及的個人資料蒐集、運用與保護。個人資料將於執行本活動目的範圍內，由主辦單位及/或執行單位予以蒐集、處理、利用及傳遞，依個人資料保護法相關規定辦理。

❖ 	關於個人資料之蒐集 
➢ 	參加本網站活動，需參與人提供個人資料以便抽獎核對身份使用，請您提供姓名、聯絡電話、e-mail、通訊住址等個人真實資料。

❖ 	本活動有義務保護各申請人隱私，非經您本人同意不會自行修改或刪除任何網路民眾個人資料及檔案。除非經過您事先同意或符合以下情況始得為之：
➢ 	經由合法的途徑。
➢ 	為保護本網站各相關單位之權益。
 
❖ 	本活動絕不會任意出售、交換、或出租任何您的個人資料給其他團體、個人或私人企業。但有下列情形者除外：
➢ 	配合司法單位合法的調查。
➢ 	配合相關職權機關依職務需要之調查或使用。
➢ 	基於善意相信揭露為法律需要，或為維護和改進網站服務而用於管理

❖ 	若您提供任何錯誤或不實的資料，本活動各相關經營單位有權拒絕您以該帳號使用網站之全部或部份服務及權益。您得自由選擇是否提供個人資料時，倘若不提供，視為不參加本次抽獎活動。
 
❖ 	您的密碼或帳號遭到盜用或有其他任何安全問題發生時，請您立即以電子郵件通知本活動客服信箱，以便資訊人員協助處理。
➢ 	所有網路民眾行為應遵循國內、外法律規範，並且對於個人所屬帳號、密碼所發生之情事負全部責任。

' ;

?>
    <!-- 登入或註冊modal -->
	<div class="modal fade" id="pleaselogin" role="dialog">
	    <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		        <div class="modal-header modal-noborder">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        <div class="modal-body">

                    <!-- <div class="content">
                        <h4>您已登入</h4>
                    </div>
		        	<div class="button-group mg-bt-20">
		        		<button type="submit" class="btn btn-default login-success main-button-sm" data-toggle="modal" data-dismiss="modal">關閉</button>
		        	</div> -->
		        	<form method="POST" action="{{ route('eventlogin') }}">
		        		@csrf
		        		<div class="content">
		        			<h4>註冊</h4>
		        			<p class="mg-bt-20">立即加入，參與更多羅技官方活動！</p>
		        			@if(session()->has('error_event'))
		        			<span style="color:red"><p>帳號密碼錯誤</p></span>
		        			@endif
		        			<input type="text" class="form-control modal-input" style="margin-bottom: 5px;" name="cMobile" placeholder="請輸入手機號碼" required="">
		        			<input type="password" class="form-control modal-input mg-bt-20" name="password" placeholder="請輸入密碼" required="">

		        		</div>
		        		<div class="button-group mg-bt-20">
		        			<!-- <button type="submit" class="btn btn-default login-success main-button-sm" data-toggle="modal" data-target="#login-success" data-dismiss="modal">登入</button> -->
		        			<button type="submit" class="btn btn-default login-success main-button-sm" data-toggle="modal">登入</button>
		        			<button type="button" class="btn btn-default register main-button-sm" data-toggle="modal" data-target="#register" data-dismiss="modal">註冊</button>
		        		</div>
		        	</form>

		        </div>
		    </div>
	    </div>
	</div>
    
	<!-- 登入或註冊modal -->
	<div class="modal fade" id="pleaselogin2" role="dialog">
	    <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		        <div class="modal-header modal-noborder">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        <div class="modal-body">

                    <!-- <div class="content">
                        <h4>您已登入</h4>
                    </div>
		        	<div class="button-group mg-bt-20">
		        		<button type="submit" class="btn btn-default login-success main-button-sm" data-toggle="modal" data-dismiss="modal">關閉</button>
		        	</div> -->
		        	<form method="POST" action="{{ route('login') }}">
		        		@csrf
		        		<div class="content">
		        			<h4>註冊</h4>
		        			<p class="mg-bt-20">立即加入，參與更多羅技官方活動！</p>
		        			@if(session()->has('error'))
		        			<span style="color:red"><p>帳號密碼錯誤</p></span>
		        			@endif
		        			<input type="text" class="form-control modal-input" style="margin-bottom: 5px;" id="mobile" name="cMobile" placeholder="請輸入手機號碼" required="">
		        			<input type="password" class="form-control modal-input mg-bt-20" id="password" name="password" placeholder="請輸入密碼" required="">

		        		</div>
		        		<div class="nofill-button text-right">
		        			<button type="button" class="btn btn-default register" data-toggle="modal" data-target="#send-pass" data-dismiss="modal">忘記密碼</button>
		        		</div>
		        		<div class="button-group mg-bt-20">
		        			<!-- <button type="submit" class="btn btn-default login-success main-button-sm" data-toggle="modal" data-target="#login-success" data-dismiss="modal">登入</button> -->
		        			<button type="submit" class="btn btn-default login-success main-button-sm" data-toggle="modal">登入</button>
		        			<button type="button" class="btn btn-default register main-button-sm" data-toggle="modal" data-target="#register" data-dismiss="modal">註冊</button>
		        		</div>
		        		
		        	</form>

		        </div>
		    </div>
	    </div>
	</div>


	<!--忘記密碼Modal-->
	<div class="modal fade modal-style1" id="send-pass" role="dialog">
	    <div class="modal-dialog modal-sm">
		    <div class="modal-content overflow-hid">
		        <div class="modal-header modal-noborder modal-header-color">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-h4"><span class="lnr lnr-smartphone" style="font-size: 16px"></span> 忘記密碼</h4>
		        </div>
		        <div class="modal-body pd-top-30">
		        	<div class="x-center">
		        		<p>請輸入註冊時使用的手機號碼<span></span></p>
		        		<form>
		        			<p class="inline-group"><input type="text" id="passphone" class="form-control"></p>
		        		</form>
		        	</div>
		        </div>
		        <div class="modal-footer modal-noborder x-center">
		          	<!-- <button type="submit" class="btn btn-default main-button-sm phone-verify2" data-toggle="modal" data-target="#success2" data-dismiss="modal">確定</button> -->
		          	<button type="button" class="btn btn-default main-button-sm phone-verify2" data-toggle="modal" onclick="sendPass()">確定</button>
		        </div>
		    </div>
	    </div>
	</div>
	<script type="text/javascript">
		function sendPass() {
			var phone = $('#passphone').val();
			$.ajax({
				url:"{{route('sendPass')}}",
				method:"POST",
				dataType: "text",
				data:{
					'phone':phone,
				},
				success:function(txt){
					if (txt == 'OK') {
						alert('新密碼已經發送至手機,請確認') ;
						location.reload();
					}
					else{
						alert(txt) ;
					}
				}
			});
		}
	</script>
    
	<!--登入成功Modal-->
	<div class="modal fade" id="login-success" role="dialog">
	    <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		        <div class="modal-header modal-noborder">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        <div class="modal-body x-center">
		        	<p>登入成功，歡迎回來！</p>
		        </div>
		        <div class="modal-footer modal-noborder x-center">
		          	<button type="button" class="btn btn-default main-button" data-dismiss="modal">關閉</button>
		        </div>
		    </div>
	    </div>
	</div>
    
	<!--註冊Modal-->
	<div class="modal fade modal-style1" id="register" role="dialog">
	    <div class="modal-dialog">
		    <div class="modal-content overflow-hid">
		        <div class="modal-header modal-noborder modal-header-color">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-h4"><span class="lnr lnr-user" style="font-size: 16px"></span> 會員註冊</h4>
		        </div>
		        <div class="modal-body pd-top-30">
		        	<form action="{{ route('register' )}}" method="POST" id="registerForm">
		        		@csrf

		        		@if(session()->has('cName'))
		        		<table class="apply-form">
		        			<tr>
		        				<td><span>* </span>姓名</td>
		        				<td><input type="text" name="regName" class="form-control" required="" value="{{ Session::get('cName') }}"></td>
		        			</tr>
		        			<tr>
		        				<td><span>* </span>性別</td>
		        				@if(Session::get('cGender') == 'M')
		        				<td><div class="inline-group"><div><input type="radio" name="regGender" value="M" required="" checked="">男</div><div><input type="radio" name="regGender" value="F" required="">女</div></div></td>
		        				@else
		        				<td><div class="inline-group"><div><input type="radio" name="regGender" value="M" required="">男</div><div><input type="radio" name="regGender" value="F" required="" checked="">女</div></div></td>
		        				@endif
		        			</tr>
		        			<tr>
		        				<td><span>* </span>出生年月日</td>
		        				<td><input type="text" name="regBirthday" class="form-control choose-date" required="" value="{{ Session::get('cBirthday') }}"></td>
		        			</tr>
		        			<tr class="alert-warning">
		        				<td><span>* </span></td>
		        				<td>手機號碼已被註冊,請重新填寫</td>	
		        			</tr>
		        			<tr>
		        				<td><span>* </span>手機</td>
		        				<td><input type="text" name="regMobile" class="form-control" required=""></td>
		        			</tr>
		        			<tr>
		        				<td><span>* </span>Email</td>
		        				<td><input type="email" name="regEmail" class="form-control" required="" value="{{ Session::get('cEmail') }}"></td>
		        			</tr>
		        			<tr>
		        				<td><span>* </span>地址</td>
		        				<td>
		        					<div class="input_group">
		        						<select class="form-control" name="regCity" id="regCity" required="">
		        							<option selected disabled value="">縣市</option>
		        							@foreach($city as $data)
		        							<option value="{{$data->zCity}}">{{$data->zCity}}</option>
		        							@endforeach
		        						</select>
		        						<select class="form-control" name="regDistinct" id="regDistinct" required="">
		        							<option selected disabled value="">地區</option>	
		        						</select>
		        					</div>
		        					<div class="input_group">
		        						<input type="hidden" id="regCity_tmp" value="">
		        						<input type="hidden" id="regZip" name="regZip" value="">
		        						<input type="text" name="regAddress" class="form-control" required="">
		        					</div>
		        				</td>
		        			</tr>
		        			<tr>
		        				<td><span>* </span>密碼</td>
		        				<td><input type="password" name="regPassword" class="form-control"></td>
		        			</tr>
		        			<tr>
		        				<td><span>* </span>再次輸入密碼</td>
		        				<td><input type="password" name="regPassword2" class="form-control"></td>
		        			</tr>
		        		</table>
		        		@else
		        		<table class="apply-form">
		        			<tr>
		        				<td><span>* </span>姓名</td>
		        				<td><input type="text" name="regName" class="form-control" required=""></td>
		        			</tr>
		        			<tr>
		        				<td><span>* </span>性別</td>
		        				<td><div class="inline-group"><div><input type="radio" name="regGender" value="M" required="">男</div><div><input type="radio" name="regGender" value="F" required="">女</div></div></td>
		        			</tr>
		        			<tr>
		        				<td><span>* </span>出生年月日</td>
		        				<td><input type="text" name="regBirthday" class="form-control choose-date" required=""></td>
		        			</tr>
		        			<tr>
		        				<td><span>* </span>手機</td>
		        				<td><input type="text" name="regMobile" class="form-control" required=""></td>
		        			</tr>
		        			<tr>
		        				<td><span>* </span>Email</td>
		        				<td><input type="email" name="regEmail" class="form-control" required=""></td>
		        			</tr>
		        			<tr>
		        				<td><span>* </span>地址</td>
		        				<td>
		        					<div class="input_group">
		        						<select class="form-control" name="regCity" id="regCity" required="">
		        							<option selected disabled value="">縣市</option>
		        							@foreach($city as $data)
		        							<option value="{{$data->zCity}}">{{$data->zCity}}</option>
		        							@endforeach
		        						</select>
		        						<select class="form-control" name="regDistinct" id="regDistinct" required="">
		        							<option selected disabled value="">地區</option>	
		        						</select>
		        					</div>
		        					<div class="input_group">
		        						<input type="hidden" id="regCity_tmp" value="">
		        						<input type="hidden" id="regZip" name="regZip" value="">
		        						<input type="text" name="regAddress" class="form-control" required="">
		        					</div>
		        				</td>
		        			</tr>
		        			<tr>
		        				<td><span>* </span>密碼</td>
		        				<td><input type="password" name="regPassword" class="form-control"></td>
		        			</tr>
		        			<tr>
		        				<td><span>* </span>再次輸入密碼</td>
		        				<td><input type="password" name="regPassword2" class="form-control"></td>
		        			</tr>
		        		</table>
		        		@endif
		        		<p class="regis-terms"><?=nl2br($privacy1)?></p>
		        		<h5><input type="checkbox" name="regAgree" value="Y" required="">本人已詳閱<span >個人隱私權條款</span>，並同意授權個資使用</h5>

		        	</div>
		        	<div class="modal-footer modal-noborder x-center">
		        		<!-- <button type="button" class="btn btn-default main-button registers" data-toggle="modal" data-target="#phone-verify2" data-dismiss="modal" onclick="checkValidation()">送出</button> -->
		        		<button type="button" class="btn btn-default main-button registers" onclick="checkValidation()" data-toggle="modal">送出</button>
		        	</div>
		        </form>
		    </div>
	    </div>
	</div>

	@if(session()->has('cName'))
		<script type="text/javascript">
			$('#register').modal('show');
		</script>
    @endif
    
	<!--手機註冊驗證Modal-->
	<div class="modal fade modal-style1" id="phone-verify2" role="dialog">
	    <div class="modal-dialog modal-sm">
		    <div class="modal-content overflow-hid">
		        <div class="modal-header modal-noborder modal-header-color">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-h4"><span class="lnr lnr-smartphone" style="font-size: 16px"></span> 手機號碼驗證</h4>
		        </div>
		        <div class="modal-body pd-top-30">
		        	<div class="x-center">
		        		<p>請輸入手機收到的驗證碼<span> (四位數字)</span></p>
		        		<form>
		        			<p class="inline-group">驗證碼 <input type="text" id="smsAuthCode" class="form-control"></p>
		        		</form>
		        	</div>
		         	<h5 class="get-code" onclick="regenerateSMSauthCode()"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> 重新取得驗證碼</h5>
		        </div>
		        <div class="modal-footer modal-noborder x-center">
		          	<!-- <button type="submit" class="btn btn-default main-button-sm phone-verify2" data-toggle="modal" data-target="#success2" data-dismiss="modal">確定</button> -->
		          	<button type="button" class="btn btn-default main-button-sm phone-verify2" data-toggle="modal" onclick="authCheck()">確定</button>
		        </div>
		    </div>
	    </div>
	</div>


	<!--手機註冊驗證Modal2-->
	<div class="modal fade modal-style1" id="phone-verify" role="dialog">
	    <div class="modal-dialog modal-sm">
		    <div class="modal-content overflow-hid">
		        <div class="modal-header modal-noborder modal-header-color">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-h4"><span class="lnr lnr-smartphone" style="font-size: 16px"></span> 您的帳號尚未驗證<br>請先驗證後在進行登錄</h4>
		        </div>
		        <div class="modal-body pd-top-30">
		        	<div class="x-center">
		        		<p>請輸入手機收到的驗證碼<span> (四位數字)</span></p>
		        		<form>
		        			<p class="inline-group">驗證碼<input type="text" id="smsAuthCode2" class="form-control"></p>
		        		</form>
		        	</div>
		         	<h5 class="get-code" onclick="regenerateSMSauthCode()"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> 重新取得驗證碼</h5>
		        </div>
		        <div class="modal-footer modal-noborder x-center">
		          	<!-- <button type="submit" class="btn btn-default main-button-sm phone-verify2" data-toggle="modal" data-target="#success2" data-dismiss="modal">確定</button> -->
		          	<button type="button" class="btn btn-default main-button-sm phone-verify2" data-toggle="modal" onclick="authCheck()">確定</button>
		        </div>
		    </div>
	    </div>
	</div>
    
	<!--註冊驗證通過Modal-->
	<div class="modal fade modal-style1" id="success2" role="dialog">
	    <div class="modal-dialog modal-sm">
		    <div class="modal-content overflow-hid">
		        <div class="modal-header modal-noborder modal-header-color">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-h4"><span class="lnr lnr-thumbs-up" style="font-size: 16px"></span> 加入成功</h4>
		        </div>
		        <div class="modal-body pd-top-30">
		        	<div class="x-center">
		        		<p>恭喜您，已成為會員！</p>
		        		<p>歡迎隨時回來～參與抽獎活動喔！</p>
		        	</div>
		        </div>
		        <div class="modal-footer modal-noborder x-center">
		          	<!-- <button type="button" class="btn btn-default main-button" data-dismiss="modal">關閉</button> -->
		          	<button type="button" class="btn btn-default main-button-regOk" onclick="reload()">關閉</button>
		        </div>
		    </div>
	    </div>
	</div>
    
    <!--活動條款Modal-->
    <div class="modal fade agree" id="agree" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-noborder">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- <h4 class="modal-title">Modal Header</h4> -->
                </div>
                <div class="modal-body">
                    <h4 class="mg-bt-20">活動辦法及條款</h4>
                    <p><?=nl2br($privacy1)?></p>
                    <form>
                        <h5><input type="checkbox" id="event_agree">本人已詳閱<span >活動辦法及條款</span>，並同意授權個資使用以及接收羅技優惠訊息</h5>
                    </form>
                </div>
                <div class="modal-footer modal-noborder x-center">
                    <button type="button" class="btn btn-default main-button terms" data-toggle="modal" onclick="eventAgree()">確定</button>
                </div>
            </div>
        </div>
    </div>
    
	<!--驗證通過Modal-->
	<div class="modal fade modal-style1" id="success" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header modal-noborder modal-header-color">
					<button type="button" class="close" data-dismiss="modal" onclick="reload()">&times;</button>
					<h4 class="modal-title modal-h4"><span class="lnr lnr-thumbs-up" style="font-size: 16px"></span> 登錄成功</h4>
				</div>
				<div class="modal-body pd-top-30">
					<div class="x-center">
						<p>恭喜您,資料已成功送出!</p>
						<!-- 原本部分(註解開始) -->
						<!-- <p>您可以至 "會員專區>登錄查詢" 查看所有登錄活動。</p> -->
						<!-- 原本部分(註解結束) -->
						
						<!-- 舊換新部分開始 -->
						
						<!-- <p>請點擊「發送活動簡訊」且確認您的手機及Email信箱，是否收到優惠簡訊內容，並依指示完成兌換動作。</p> -->

						<!-- 舊換新部分結束 -->  		
					</div>
				</div>
				<div class="modal-footer modal-noborder x-center">
					<!-- <button type="submit" class="btn btn-default main-button" data-dismiss="modal">回到活動頁</button> -->
					
						<button type="submit" class="btn btn-default main-button" onclick="reload()">回到活動頁</button>
					
						<!-- button type="submit" class="btn btn-default main-button" onclick="goExchange('')">發送活動簡訊</button> -->

				</div>
			</div>
		</div>
	</div>

	<!--前30 -->
	<div class="modal fade modal-style1" id="success13" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header modal-noborder modal-header-color">
					<button type="button" class="close" data-dismiss="modal" onclick="reload()">&times;</button>
					<h4 class="modal-title modal-h4"><span class="lnr lnr-thumbs-up" style="font-size: 16px"></span> 登錄成功</h4>
				</div>
				<div class="modal-body pd-top-30">
					<div class="x-center">
						<p>恭喜您,資料已成功送出!</p>
						<p>恭喜您已完成『4/19羅技Ｘ門前隱味專屬用餐日』與萬元好禮抽獎活動登錄。
您的用餐資格為正取,我們會再核對您的資料,確認無誤後將於3/31前通知您用餐時段,麻煩您於4/6前確認是否參加,謝謝。</p>
						<!-- 原本部分(註解開始) -->
						<!-- <p>您可以至 "會員專區>登錄查詢" 查看所有登錄活動。</p> -->
						<!-- 原本部分(註解結束) -->
						
						<!-- 舊換新部分開始 -->
						
						<!-- <p>請點擊「發送活動簡訊」且確認您的手機及Email信箱，是否收到優惠簡訊內容，並依指示完成兌換動作。</p> -->

						<!-- 舊換新部分結束 -->  		
					</div>
				</div>
				<div class="modal-footer modal-noborder x-center">
					<!-- <button type="submit" class="btn btn-default main-button" data-dismiss="modal">回到活動頁</button> -->
					
						<button type="submit" class="btn btn-default main-button" onclick="reload()">回到活動頁</button>
					
						<!-- button type="submit" class="btn btn-default main-button" onclick="goExchange('')">發送活動簡訊</button> -->

				</div>
			</div>
		</div>
	</div>

	<!-- 後30 -->
	<div class="modal fade modal-style1" id="success133" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header modal-noborder modal-header-color">
					<button type="button" class="close" data-dismiss="modal" onclick="reload()">&times;</button>
					<h4 class="modal-title modal-h4"><span class="lnr lnr-thumbs-up" style="font-size: 16px"></span> 登錄成功</h4>
				</div>
				<div class="modal-body pd-top-30">
					<div class="x-center">
						<p>恭喜您,資料已成功送出!</p>
						<p>恭喜您已完成『4/19羅技Ｘ門前隱味專屬用餐日』與萬元好禮抽獎活動登錄。
您的用餐資格為候補,如有候補成功,我們將在4/10前與您聯繫，謝謝。</p>
						<!-- 原本部分(註解開始) -->
						<!-- <p>您可以至 "會員專區>登錄查詢" 查看所有登錄活動。</p> -->
						<!-- 原本部分(註解結束) -->
						
						<!-- 舊換新部分開始 -->
						
						<!-- <p>請點擊「發送活動簡訊」且確認您的手機及Email信箱，是否收到優惠簡訊內容，並依指示完成兌換動作。</p> -->

						<!-- 舊換新部分結束 -->  		
					</div>
				</div>
				<div class="modal-footer modal-noborder x-center">
					<!-- <button type="submit" class="btn btn-default main-button" data-dismiss="modal">回到活動頁</button> -->
					
						<button type="submit" class="btn btn-default main-button" onclick="reload()">回到活動頁</button>
					
						<!-- button type="submit" class="btn btn-default main-button" onclick="goExchange('')">發送活動簡訊</button> -->

				</div>
			</div>
		</div>
	</div>

    <!--得獎公告Modal-->
    <div class="modal fade modal-style1" id="award-modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content overflow-hid">
                <div class="modal-header modal-noborder modal-header-color">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-h4"><span class="lnr lnr-bullhorn" style="font-size: 16px"></span> 得獎公告</h4>
                </div>
                <div class="modal-body pd-top-30">
                    <div class="x-center" id="award-show">
                        <p>
                            我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告我是公告
                        </p>
                    </div>
                </div>
                <div class="modal-footer modal-noborder x-center">
                    <button type="submit" class="btn btn-default main-button" data-dismiss="modal">關閉</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--對話回覆Modal按鈕-->
	<div class="modal fade" id="replyMsg" role="dialog">
	    <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		        <div class="modal-header modal-noborder">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        <div class="modal-body x-center">
		        	<p id="replyMsgText"></p>
		        </div>
		        <div class="modal-footer modal-noborder x-center">
		          	<button type="button" class="btn btn-default main-button" data-dismiss="modal">關閉</button>
		        </div>
		    </div>
	    </div>
	</div>

	<!-- 活動內容model -->
<div class="modal fade agree" id="detail1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-noborder">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- <h4 class="modal-title">Modal Header</h4> -->
                </div>
                <div class="modal-body">
                    <h4 class="mg-bt-20">【東南旅行社之沖繩雙人來回機票兌換券】</h4>
                    <p>兌換說明<br>
一、免費提供：
東南旅行社沖繩雙人來回機票之兌換，價值NTD17,000。<br>
二、使用期限:中獎人須於109 年09 月30 日(含)以前將此兌換劵使用完畢
(訂位時.需依當時航空公司實際票價或以當時實際旅遊費用為主,如兌換時,有高於NTD17,000
之差價需補足其價差，如低於NTD17,000 無法退還其價差)<br>
三、兌換注意事項：
(1) 本券價值以NT$17,000 計，行程內容為沖繩來回機票兩張(包含機票稅金、機場安
檢稅及兵險費用)，如兌換劵不使用沖繩來回機票，可換東南旅行社全產品(不包含
廉價航空與各國簽證)，如兌換時,有高於NTD17,000 之差價需補足其價差，如低
於NTD17,000 無法退還其價差。<br>
(2) 旅遊劵恕不與其他優惠並行使用，持劵人報名時請先告知並使用本專案劵結帳。<br>
(3) 本券視同現金但不得兌換現金，多出之部分則視同放棄，不得退還現金。<br>
(4) 限一次兌換並使用完畢。<br>
(5) 本券使用期限(旅遊出發日期)：自民國108 年10 月01 日起至民國109 年9 月30
日止；請於使用期限內抵用，逾期視同自動放棄。<br>
(6) 本券不得影印使用，並需經東南旅行社股份有限公司蓋章後始生效力。<br>
(7) 本券於購買時已開立旅行社專用收據【代收轉付】，兌換時不再另開立收據；惟
補差額部份仍將開立【代收轉付】予中獎人。<br>
(8) 本券為有價證券，請妥善保管，若遺失視同自動放棄，恕不另行補發。<br>
(9) 持券者需於預定出發日期，至少14 個工作日，完成訂位手續。<br>
(10) 義務扣繳人為: 中獎人<br>
五、兌換方式：憑本券正本向東南旅行社【海外旅遊部-田逸婕】兌換。<br>
六、若需查詢，請洽東南旅行社•海外旅遊部。<br>
<br>
聯絡人：田逸婕Momo<br>
公司電話：(02)2567-8111 分機1279<br>
公司傳真：(02)2542-3865<br>
E-mail：momo@settour.com.tw<br>
東南旅行社•海外旅遊部<br>
2019 年7 月31 日</p>
                </div>
                <div class="modal-footer modal-noborder x-center">
                    <button type="button" class="btn btn-default main-button terms" data-dismiss="modal">確定</button>
                </div>
            </div>
        </div>
    </div>
