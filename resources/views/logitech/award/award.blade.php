@extends('logitech.includes.header')

@section('index')
	<!-- 主要內容 -->
	<div class="section">
		<div class="container">
			<div>
				<div class="x-center">
					<h3 class="big-title">最新公告</h3>
					<div class="line"></div>
				</div>
				<h4 class="filter"><a data-toggle="collapse" data-target="#filter-content">進階篩選<span class="lnr lnr-chevron-down" style="margin-left: 2px;font-size: 5px"></span></a>
				</h4>
			</div>
		</div>
		<!-- 進階篩選 -->
		<div class="container-fluid filter-content">
			<div id="filter-content" class="collapse">
				<form class="container">
					<!--
                    <div class="input_group">
						<p class="input-title">產品類別</p>
						<select class="form-control" name="" id="productType">
							<option value="">1</option>
							<option value="">2</option>
						</select>
					</div>
                    -->
					<div class="input_group">
						<p class="input-title">活動起始日期</p>
						<input type="text" id="awardStartDate" class="form-control choose-date">
					</div> 
				</form>
			</div>	
		</div>	
		<div class="container">
			<div class="row" id="award"> 
			@foreach($award as $data)
				<div class="col-md-4 col-sm-6 col-xs-12 x-center">
					<a href="event/event-info/{{$data->id}}" ">
						<div class="frame">
							<div class="frame-top black-top">
								<img src="{{ substr($data->aImage, 1) }}" alt="">
							</div>
							<div class="frame-info">
								<h4>{{$data->aTitle}}</h4>
								<h5><span class="glyphicon glyphicon-time" aria-hidden="true"></span>{{explode(' ',$data->aStartDate)[0]}}-{{explode(' ',$data->aEndDate)[0]}}</h5>
							</div>	
						</div>
					</a>
				</div>
			@endforeach
			</div>
			<div class="page x-center">
				<ul class="pagination" id="eventPages">

				</ul>
			</div>
            <input type="hidden" id="eventPageShow" value="1">
		</div>	
	</div>
	<!-- loading-gif -->
	<div aria-hidden="true" class="modal fade" id="waiting" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered" role="document" style="text-align: center;">
			<div class="modal-content">
				<img src="{{ url("img/loader.gif") }}">
			</div>
		</div>
	</div>
@endsection