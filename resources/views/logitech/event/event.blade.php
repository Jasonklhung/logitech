@extends('logitech.includes.header')

@section('index')
	<!-- 主要內容 -->
	<div class="section">
		<div class="container">
			<div>
				<div class="x-center">
					<ul class="nav nav-pills blue-filter" id="filters">
					    <li class="in active"><a data-toggle="tab" id="ALL">全部</a></li>
					    <li><a data-toggle="tab" id="playing">進行中</a></li>
					    <li><a data-toggle="tab" id="ending">已結束</a></li>
					</ul>
                    <!-- <input type="hidden" id="setEventType" value="A"> -->
				</div>
				<h4 class="filter"><a data-toggle="collapse" data-target="#filter-content" href="Javascript:void(0);">進階篩選<span class="lnr lnr-chevron-down" style="margin-left: 2px;font-size: 5px"></span></a>
				</h4>
			</div>
		</div>
		<!-- 進階篩選內容 -->
		<div class="container-fluid filter-content">
			<div id="filter-content" class="collapse">
				<form class="container">
					<div class="input_group">
						<p class="input-title">活動起始日期</p>
						<input type="text" id="eventStartDate" class="form-control choose-date">
					</div> 
				</form>
			</div>
		</div>	
		<div class="container" style="margin-top: 20px;">
			<div class="row" id="active"> 
			@foreach($event as $data)
				@if($data->aMode == 'F')
				@if($data->aEndDate < $today)
					@php
						$blacktop = ' black-top';
					@endphp
				@else
					@php
						$blacktop = '';
					@endphp
				@endif
				<div class="col-md-4 col-sm-6 col-xs-12 x-center">
					<a href="{{$data->aFBLink}}" ">
						<div class="frame">
							<div class="frame-top{{$blacktop}}">
								<img src="{{ substr($data->aImage, 1) }}" alt="">
							</div>
							<div class="frame-info">
								<h4>{{$data->aTitle}}</h4>
								<h5><span class="glyphicon glyphicon-time" aria-hidden="true"></span>{{explode(' ',$data->aStartDate)[0]}}-{{explode(' ',$data->aEndDate)[0]}}</h5>
							</div>	
						</div>
					</a>
				</div>
				@else
				@if($data->aEndDate < $today)
					@php
						$blacktop = ' black-top';
					@endphp
				@else
					@php
						$blacktop = '';
					@endphp
				@endif
				<div class="col-md-4 col-sm-6 col-xs-12 x-center">
					<a href="event/event-info/{{$data->id}}" ">
						<div class="frame">
							<div class="frame-top{{$blacktop}}">
								<img src="{{ substr($data->aImage, 1) }}" alt="">
							</div>
							<div class="frame-info">
								<h4>{{$data->aTitle}}</h4>
								<h5><span class="glyphicon glyphicon-time" aria-hidden="true"></span>{{explode(' ',$data->aStartDate)[0]}}-{{explode(' ',$data->aEndDate)[0]}}</h5>
							</div>	
						</div>
					</a>
				</div>
				@endif
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
				<img src="img/loader.gif">
			</div>
		</div>
	</div>
@endsection