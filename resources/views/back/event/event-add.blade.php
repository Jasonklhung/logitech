@extends('back.includes.header')

@section('index')

<div class="container section tab-content">
			<!-- 活動編輯 -->
			<div id="eventinfo" class="tab-pane fade in active">
				<div class="title-group">
					<h2 class="bigest-title"><span class="lnr lnr-arrow-left-circle pre-page" onclick="history.back()"></span> 新增活動</h2>
				</div>

				<form id="addEvent">
					@csrf
					<div class="rows">
						<div class="input-rows">
							<p class="input-title">活動名稱</p><input type="text" name="aTitle" class="form-control input-val">
						</div>
						<div class="input-rows">
							<p class="input-title">活動別稱</p><input type="text" name="aType" class="form-control input-val">
						</div>
						<div class="input-rows" style="display: flex;align-items: center;flex-wrap: wrap;">
							<p class="input-title">活動期間</p>
							<div class="toleft3">
				                <div class='input-group date choose-time mgbt-25'>
				                    <input type='text' class="form-control" name="aStartDate" />
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>
				            ~
				            <div class="toleft3">
				                <div class='input-group date choose-time mgbt-25'>
				                    <input type='text' class="form-control" name="aEndDate" />
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>
						</div>
						<div class="input-rows" style="display: flex;align-items: center;flex-wrap: wrap;">
							<p class="input-title">登錄截止日</p>
							<div class="toleft3">
				                <div class='input-group date choose-time mgbt-25'>
				                    <input type='text' class="form-control" name="aStartRegister"  />
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>
				            ~
				            <div class="toleft3">
				                <div class='input-group date choose-time mgbt-25'>
				                    <input type='text' class="form-control" name="aEndRegister"  />
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>
						</div>
						<div class="input-rows">
							<p class="input-title">上傳活動圖片</p><input type="file" name="image" class="input-val" id="upload-eventpic">
							<!-- <div class="tableimg-frame"> -->
							<img class="uploadpic" id="preview_img7" src="" ></img>
							<!-- </div>	 -->
						</div>

						<div class="input-rows">
							<p class="input-title-2">選擇活動模式</p>
							<div class="inline-this">
								<p class="radioop"><input type="radio" name="aMode" value="F">Facebook連結</p> 
								<p class="radioop"><input type="radio" name="aMode" value="S">舊換新模式</p>
								<p class="radioop"><input type="radio" name="aMode" value="P">登錄產品模式</p>
							</div>
						</div>

						<div class="input-rows" id="aa">					
							<p class="input-title">外連Facebook</p><input type="text" class="form-control input-val" id="FBUrl" name="FBUrl" value="" placeholder="請輸入facebook連結網址">
						</div>

						<div class="input-rows" id="bb">
							<div class="square-area">
								<p class="input-title square-title">登錄表單格式</p>
								<table class="applyform">
									<tr>
										<td>
											<p class="input-title-2">發票登錄機制</p>
										</td>
										<td>
											<div class="inline-this">
												<p class="radioop"><input type="radio" name="receipt" value="00">不需要</p> <p class="radioop"><input type="radio" name="receipt" value="10">上傳發票</p>
												<p class="radioop"><input type="radio" name="receipt" value="01">填寫發票</p><p class="radioop"><input type="radio" name="receipt" value="11">兩者皆有</p>
											</div>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="input-rows" id="cc">
							<div class="square-area">
								<p class="input-title square-title">產品型號選單</p>
								<table class="applyform" id="tableProduct">
									<tr>
										<td>
											<p class="input-title-2">建立產品型號</p>
											<div class="inline-this">
												<input type="text" class="form-control" id="newProductCategoryAdd" style="width:150px" placeholder="請輸入產品">
												&nbsp;
												<input type="text" class="form-control" id="newProductNameAdd" style="width:150px" placeholder="請輸入型號">
												<button type="button" class="btn enter-btn addinput-btn1" id="createProductAdd" style="margin: 0px;margin-top: 5px">建立</button>
											</div>
										</td>
										<td style='border-right:3px solid white;'></td>
										<td>
											<p class="input-title-2">新增產品型號</p>
											<div class="add-input-group-2">
												<select class="form-control"  id="ProductCategoryAdd">
													<option value="" disabled="disabled" selected>選擇產品</option>
													@foreach($pro as $pro)
														<option value="{{$pro->pCategory}}">{{$pro->pCategory}}</option>
													@endforeach
												</select>
												<select class="form-control" name="ProductName" id="ProductNameAdd">
													<option value="" selected>選擇型號</option>
												</select>
											</div>
											<center>
											<button type="button" class="btn enter-btn addinput-btn1" id="addProduct" style="margin: 0px;margin-top: 5px">新增</button>
											</center>
										</td>
										<td style='border-right:3px solid white;'></td>
										<td>
											<div id="InputsWrapper">

											</div>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="input-rows" id="dd">
							<div class="square-area">
								<p class="input-title square-title">建立通路選單</p>
								<table class="applyform" id="tableStore">
									<tr>
										<td>
											<p class="input-title-2">建立通路選單</p>
											<div class="inline-this">
												<input type="text" class="form-control" id="newcityAdd" style="width:150px" placeholder="請輸入縣市">
												&nbsp;
												<input type="text" class="form-control" id="newStoreAdd" style="width:150px" placeholder="請輸入通路">
												<button type="button" class="btn enter-btn addinput-btn1" id="createStoreAdd" style="margin: 0px;margin-top: 5px">建立</button>
											</div>
										</td>
										<td style='border-right:3px solid white;'></td>
										<td>
											<p class="input-title-2">新增通路選單</p>
											<div class="add-input-group-2">
												<select class="form-control"  id="cityNameAdd">
													<option value="" disabled="disabled" selected>選擇縣市</option>
													@foreach($city as $city)
														<option value="{{$city->sCity}}">{{$city->sCity}}</option>
													@endforeach
												</select>
												<select class="form-control" name="storeName" id="storeNameAdd">
													<option value="" selected>選擇通路</option>
												</select>
											</div>
											<center>
											<button type="button" class="btn enter-btn addinput-btn1" id="addStore" style="margin: 0px;margin-top: 5px">新增</button>
											</center>
										</td>
										<td style='border-right:3px solid white;'></td>
										<td>
											<div id="InputsWrapper2">
												
											</div>
										</td>
									</tr>
								</table>
							</div>
						</div>

						<div class="input-rows add-mgbt40" id="ee">
							<p class="input-title">備註說明</p><textarea class="form-control input-val" id="textarea1" name="textarea1"></textarea>
							
						</div>
						<div class="input-rows add-mgbt40" id="ff">
							<p class="input-title">活動說明及辦法</p><textarea class="form-control input-val" id="textarea2" name="textarea2"></textarea>
						</div>
						<div class="input-rows add-mgbt40" id="gg">
							<p class="input-title">注意事項</p><textarea class="form-control input-val" id="textarea3" name="textarea3"></textarea>
						</div>
						<div class="input-rows add-mgbt40" id="hh">
							<p class="input-title">得獎公告</p><textarea class="form-control input-val" id="textarea4" name="textarea4"></textarea>
						</div>
						<div class="input-rows add-mgbt40" id="ii">
							<p class="input-title">活動分享主旨</p><textarea class="form-control input-val" id="textarea5" name="textarea5" rows="3" cols="155"></textarea>
						</div>
						<div class="input-rows add-mgbt40" id="jj">
							<p class="input-title">活動分享描述</p><textarea class="form-control input-val" id="textarea6" name="textarea6" rows="3" cols="155"></textarea>
						</div>
					</div>

					<div class="alert alert-danger">
						<ul>
							@foreach($errors as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>

					<div class="rows" style="text-align: center;">
						<button type="reset" class="btn reset-btn" onclick="location.href='{{url("/backstage/event")}}'">捨棄編輯 :(</button>
						<button type="submit" class="btn enter-btn" value="">儲存編輯 :)</button>
					</div>
				</form>
		    </div>
		</div>
	</div>

	<script>
		CKFinder.setupCKEditor();
		CKEDITOR.replace('textarea1');
		CKEDITOR.replace('textarea2');
		CKEDITOR.replace('textarea3');
		CKEDITOR.replace('textarea4');

	</script>
	<script type="text/javascript">
		$(document).ready(function() {  

			var InputsWrapper   = $("#InputsWrapper"); 
			var AddButton       = $("#addProduct"); 

			var x = InputsWrapper.length;

			$(AddButton).click(function (e) 
			{  

				var product = $("#ProductCategoryAdd").val();
				var nameval = $("#ProductNameAdd").val();
				var name=$('#ProductNameAdd option:selected');
				var name = (name.text());

				$(InputsWrapper).append('<div><input type="text" class="form-control" style="width:180px" value=" '+ product +':'+name+'"><input type="hidden" class="form-control" name="aProduct[]" style="width:180px" value=" '+ nameval +'"><a href="#" class="removeclass">X</a></div>');
				x++

				return false;  
			});  

			$("#tableProduct").on("click",".removeclass", function(e){		
					$(this).parent('div').remove(); 
					x--; 			 
				return false;  
			})   

		});  
	</script> 

	<script type="text/javascript">
		$(document).ready(function() {  

			var InputsWrapper2   = $("#InputsWrapper2"); 
			var AddButton       = $("#addStore"); 

			var x = InputsWrapper2.length;

			$(AddButton).click(function (e) 
			{  
				var city = $("#cityNameAdd").val();
				var storeval = $("#storeNameAdd").val();
				var store=$('#storeNameAdd option:selected');
				var store = (store.text());

				$(InputsWrapper2).append('<div><input type="text" class="form-control" style="width:180px" value=" '+ city +''+store+'"><input type="hidden" class="form-control" name="aStore[]" style="width:180px" value=" '+ storeval +'"><a href="#" class="removeclass">X</a></div>');
				x++

				return false;  
			});  

			$("#tableStore").on("click",".removeclass", function(e){		
					$(this).parent('div').remove(); 
					x--; 			 
				return false;  
			})   

		});  
	</script> 

@endsection