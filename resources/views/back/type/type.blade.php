@extends('back.includes.header')

@section('index')

<div class="container section tab-content">
		<!-- 版型設定 -->
		<div id="type" class="tab-pane fade in active">
			<h2 class="bigest-title"><span class="lnr lnr-magic-wand"></span> 版型設定</h2>
				<div class="rows">
					<h4>首頁Banner</h4>
					<div align="right">
						<button type="button" class="btn enter-btn btn-center" data-toggle="modal" data-target="#banner-modal"><span class="lnr lnr-plus-circle" style="margin-right: 1px"></span> 新增Banner</button>	
					</div>
					<br>
					<div class="pic-frame-group">
						@foreach($siders as $data)
							<div class="uploadpic-group">
								<label class="index-pic-frame">
									<img src="{{url("/")}}{{ $data->sImage }}" alt="">
									<input name="aId" type="hidden" value="{{ $data->aId }}">
									<input name="sTitle" type="hidden" value="{{ $data->sTitle }}">
									<input name="sStartDate" type="hidden" value="{{ $data->sStartDate }}">
									<input name="sEndDate" type="hidden" value="{{ $data->sEndDate }}">
									<input name="sActivity" type="hidden" value="{{ $data->sActivity }}">
									<input name="sType" type="hidden" value="{{ $data->sType }}">
									<button type="button" class="btn enter-btn btn-center hidden editBanner" data-toggle="modal" data-target="#edit-modal"></button>
								</label>
						@if($data->sType == 'INNER')
								<input type="text" class="form-control enter-url" name="sUrl" style="background: black" readonly="true" value="連結活動"  insertto="#url1">
						@else
								<input type="text" class="form-control enter-url" name="sUrl" style="background: black" readonly="true" value="{{ $data->sUrl }}"  insertto="#url1">
						@endif
								<input type="text" class="form-control enter-url" name="sTitle" style="background: black" readonly="true" value="{{ $data->sTitle }}">

							</div>
						@endforeach
					</div>
					<!-- 預覽用輪播 -->
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
							<ol class="carousel-indicators">
							@php
								$res = count($siders)
							@endphp
								@for ($i = 0; $i < $res; $i++)
									@if($i == 0)
										@php
											$_active = 'active';
										@endphp
									@else
		  								@php
		  									$_active = '';
		  								@endphp
		  							@endif
								<li data-target="#myCarousel" data-slide-to={{$i}} class={{$_active}}></li>
								@endfor
							</ol>
						  <!-- Wrapper for slides -->
						  	<div class="carousel-inner">
						  	@foreach($siders as $k => $v)
						  		@if($k == 0)
						  			@php
						  				$_active = ' active';
						  			@endphp
						  		@else
						  			@php
						  				$_active = '';
						  			@endphp
						  		@endif
					            <div class="item{{$_active}}">
					        	@if($v->sType == 'INNER')
							      	<a href=""><img src="{{url("/")}}{{ $v->sImage }}" alt=""></a>
							    @else
							    	<a href=""><img src="{{url("/")}}{{ $v->sImage }}" alt=""></a>
							    @endif
							      <div class="carousel-caption">
							      </div>
							    </div>
							@endforeach
						  	</div>

						  <!-- Left and right controls -->
						  	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						    	<span class="lnr lnr-chevron-left"></span>
						    	<span class="sr-only">Previous</span>
						  	</a>
						  	<a class="right carousel-control" href="#myCarousel" data-slide="next">
						    	<span class="lnr lnr-chevron-right"></span>
						    	<span class="sr-only">Next</span>
						  	</a>
					</div>
				</div>
			<form id="editCSS">
				<div class="rows">
					<h4>套用網頁樣式</h4>
					<div class="color-squares">
						<input id="color1" class="radios" type="radio" hidden="hidden" value="main.css" name="color">
						<label class="color-square s1" for="color1">
							<img src="/back/img/color-square1.png" alt="">
						</label>

						<input id="color2" class="radios" type="radio" hidden="hidden" value="color-yellowgreen.css" name="color">
						<label class="color-square s2" for="color2">
							<img src="/back/img/color-square2.png" alt="">
						</label>

						<input id="color3" class="radios" type="radio" hidden="hidden" value="color-bluegreen.css" name="color">
						<label class="color-square s3" for="color3">
							<img src="/back/img/color-square3.png" alt="">
						</label>

						<input id="color4" class="radios" type="radio" hidden="hidden" value="color-red.css" name="color">
						<label class="color-square s4" for="color4">
							<img src="/back/img/color-square4.png" alt="">
						</label>

						<input id="color5" class="radios" type="radio" hidden="hidden" value="color-grey.css" name="color">
						<label class="color-square s5" for="color5">
							<img src="/back/img/color-square5.png" alt="">
						</label>

						<input id="color6" class="radios" type="radio" hidden="hidden" value="color-black.css" name="color">
						<label class="color-square s6" for="color6">
							<img src="/back/img/color-square6.png" alt="">
						</label>
					</div>
				</div>
				<div class="alert alert-success">
					<ul>
						@foreach($errors as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				<div class="alert alert-danger">
					<ul>
						@foreach($errors as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				<div class="rows button-group">
					<button type="reset" class="btn reset-btn">取消</button>
					<input type="submit" class="btn enter-btn" value="修改">
				</div>
			</form>
		</div>
	</div>

</div>


<!--新增Banner Modal-->
<div id="banner-modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md" role="document">
		<!-- Modal content-->
		<div class="modal-content">
			<form id="AddBanner">
				<div class="modal-header noborder">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="text-center">新增Banner</h3>
				</div>
				<div class="modal-body x-center">

					<div class="input-rows">
						<input type="file" id="BannerImage" name="BannerImage">
					</div>
					<div class="input-rows">
						<p>標題</p><input type="text" class="form-control" id="BannerTitle" name="BannerTitle">
					</div>
					<div class="input-rows">
						<div class="inline-this">
							<p class="radioop"><input type="radio" name="addmode" value="A">連結活動</p> 
							<p class="radioop"><input type="radio" name="addmode" value="U">外連網址</p>
						</div>
					</div>
					<div class="input-rows" id="qq">
						<p>活動</p><select id="BannerActivity" name="BannerActivity" class="form-control" style="width: 220px;">
							<option value="" disabled="disabled" selected>請選擇活動</option>
							@foreach($activity as $act)
								<option value="{{$act->id}}">{{$act->aTitle}}</option>
							@endforeach
						</select>
					</div>
					<div class="input-rows" id="ww" style="">
						<p>起始日期</p>
						<div class="toleft3">
							<div class='input-group date choose-time mgbt-25'>
								<input type='text' class="form-control" name="BStartDate"  />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="input-rows" id="ee" style="">
						<p>結束日期</p>
						<div class="toleft3">
							<div class='input-group date choose-time mgbt-25'>
								<input type='text' class="form-control" name="BEndDate"/>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="input-rows" id="rr">
						<p>連結網址</p><input type="text" class="form-control" id="BannerUrl" name="BannerUrl" placeholder="請輸入連結網址">
					</div>
				</div>

				<div class="alert alert-danger">
					<ul>
						@foreach($errors as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>

				<div class="modal-footer noborder x-center">
					<div class="button-group">
						<button type="reset" class="btn reset-btn" data-dismiss="modal">取消</button>
						<input type="submit" class="btn enter-btn"  value="新增">
					</div>
				</div>
			</form>
		</div>

	</div>
</div>

<!--編輯Banner Modal-->
<div id="edit-modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md" role="document">
		<!-- Modal content-->
		<div class="modal-content">
			<form id="editBanner">
				<div class="modal-header noborder">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="text-center">修改Banner</h3>
					<button type="button" class="btn reset-btn" id="delBanner">刪除Banner</button>
				</div>
				<div class="modal-body x-center">

					<div class="input-rows">
						<input type="file" id="EditImage" name="EditImage">
					</div>
					<div class="input-rows">
						<input type="hidden" class="form-control"  name="EditaId">
						<input type="hidden" class="form-control"  name="EditAct">
						<p>標題</p><input type="text" class="form-control EditTitle"  name="EditTitle">
					</div>
					<div class="input-rows">
						<div class="inline-this">
							<p class="radioop"><input type="radio" name="mode" value="A">連結活動</p> 
							<p class="radioop"><input type="radio" name="mode" value="U">外連網址</p>
						</div>
					</div>
					<div class="input-rows" id="aaa">
						<p>活動</p>
						<select id="EditActivity" name="EditActivity" class="form-control EditActivity" style="width: 220px;"> 
							<option value="" selected="selected" disabled="">請選擇活動</option>
								@foreach($activity as $activity)
								<option value="{{$activity->id}}">{{$activity->aTitle}}</option>
								@endforeach
						</select>
					</div>
					<div class="input-rows" id="ccc" style="">
						<p>起始日期</p>
						<div class="toleft3">
							<div class='input-group date choose-time mgbt-25'>
								<input type='text' class="form-control" name="StartDate"  />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="input-rows" id="ddd" style="">
						<p>起始日期</p>
						<div class="toleft3">
							<div class='input-group date choose-time mgbt-25'>
								<input type='text' class="form-control" name="EndDate"  />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="input-rows" id="bbb">
						<p>連結網址</p><input type="text" class="form-control EditUrl"  name="EditUrl" placeholder="請輸入連結網址">
					</div>
				</div>

				<div class="alert alert-danger">
					<ul>
						@foreach($errors as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>

				<div class="modal-footer noborder x-center">
					<div class="button-group">
						<button type="reset" class="btn reset-btn" data-dismiss="modal">取消</button>
						<input type="submit" class="btn enter-btn"  value="修改">
					</div>
				</div>
			</form>
		</div>

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		
		var Mode = $('input[name="mode"]:checked').val();

		if(Mode == 'A'){
			document.getElementById("aaa").style.display="";
			document.getElementById("bbb").style.display="none";
		}
		else{
			document.getElementById("aaa").style.display="none";
			document.getElementById("bbb").style.display="";
		}
	});
</script>

@endsection