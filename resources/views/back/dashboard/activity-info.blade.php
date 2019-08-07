@extends('back.includes.header')

@section('index')

<div class="container section tab-content">
		<!-- 數據儀表板 -->
		<div id="chart" class="tab-pane fade in active">
			<div class="tab-content">
				<!-- 數據儀表板-會員數據 -->
				<div id="member-chart" class="tab-pane fade in active">
					<form class="filter-group">
						<div>活動期間</div>
						<div class="input-group">
							<input type="text" class="form-control choose-date" id="reg_start" placeholder="請選擇起始日期">
						</div>
						<div class="input-group">
							<input type="text" class="form-control choose-date" id="reg_end" placeholder="請選擇結束日期">
							<button type="button" class="btn search" id="reg_search"><span class="lnr lnr-magnifier"></span></button>
						</div>
					</form>
					<hr>
					<div class="container-fluid">
						<div class="rows">
							<div class="col">
								<div class="chart-frame">
									<h4>活動登錄地區比例</h4>
									<table class="chart-table" id="regTable">
										<thead>
											<tr>
												<th>縣市</th>
												<th>人數</th>
											</tr>
										</thead>
										<tbody>
											@foreach($activeDate as $data)
											<tr>
												<td>{{$data->zCity}}</td>
												<td>{{$data->count}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div class="col">
								<div class="chart-frame">
									<h4>活動登錄轉換率</h4>
									<table class="chart-table">
										<tr>
											<th>註冊人數</th>
											<th id="logintotal">{{$logintotal}}</th>
											<th>100%</th>
										</tr>
										<tr>
											<td>登錄人數</td>
											<td id="regtotal">{{$loginRegister}}</td>
											<td id="regtotal2">{{ round($loginRegister/$logintotal,2) *100}}%</td>
										</tr>
										<tr>
											<td>未登錄人數</td>
											<td id="notreg">{{$logintotal-$loginRegister}}</td>
											<td id="notreg2">{{ round(($logintotal-$loginRegister)/$logintotal,2)*100 }}%</td>
										</tr>
									</table>
								</div>
								<br>
								<div class="chart-frame">
									<h4>登錄人數男女比例</h4>
									<table class="chart-table">
										<tr>
											<td>男</td>
											<td id="regMale">{{$MaleRegister[0]}}</td>
											<td id="regMale2">{{ round($MaleRegister[0]/$logintotal,2) *100}}%</td>
										</tr>
										<tr>
											<td>女</td>
											<td id="regFemale">{{$MaleRegister[1]}}</td>
											<td id="regFemale2">{{ round(($logintotal-$MaleRegister[0])/$logintotal,2)*100 }}%</td>
										</tr>
									</table>
								</div>
								<br>
								<div class="chart-frame">
									<h4>產品品項登錄狀況</h4>
									<table class="chart-table" id="productTable">
										<thead>
											<tr>
												<th>型號</th>
												<th>數量</th>
											</tr>
										</thead>
										<tbody>
											@foreach($registerProduct as $data)
											<tr>
												<td>{{$data->pName}}</td>
												<td>{{$data->count}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div class="col">
								<div class="chart-frame" id="ADPie">
									
								</div>
							</div>
							<div class="col">
								<div class="chart-frame" id="loginPie">
									
								</div>
							</div>
							<div class="col">
								<div class="chart-frame">
									<h4>活動Banner點擊次數</h4>
									<table class="chart-table" id="BannerClick">
										<thead>
											<tr>
												<th>Banner名稱</th>
												<th>總人數</th>
											</tr>
										</thead>
										<tbody>
											@foreach($BannerClick as $data)
											<tr>
												<td>{{$data->sTitle}}</td>
												<td>{{$data->count}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div class="col">
								<div class="chart-frame">
									<h4>活動電商點擊次數</h4>
									<table class="chart-table" id="StoreClick">
										<thead>
											<tr>
												<th>電商名稱</th>
												<th>總人數</th>
											</tr>
										</thead>
										<tbody>
											@foreach($StoreClick as $data)
											<tr>
												<td>{{$data->sName}}</td>
												<td>{{$data->count}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div class="col">
								<div class="chart-frame">
									<h4>活動Banner會員點擊比例</h4>
									<table class="chart-table" id="BannerClickMember">
										<thead>
											<tr>
												<th>總人數</th>
												<th>會員數</th>
												<th>非會員數</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td id="BCM1">{{$BannerClickMember[0]}}</td>
												<td id="BCM2">{{$BannerClickMember[1]}}</td>
												<td id="BCM3">{{$BannerClickMember[2]}}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col">
								<div class="chart-frame">
									<h4>活動電商會員點擊比例</h4>
									<table class="chart-table" id="StoreClickMember">
										<thead>
											<tr>
												<th>總人數</th>
												<th>會員數</th>
												<th>非會員數</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td id="SCM1">{{$StoreClickMember[0]}}</td>
												<td id="SCM2">{{$StoreClickMember[1]}}</td>
												<td id="SCM3">{{$StoreClickMember[2]}}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col">
								<div class="chart-frame">
									<h4>活動分享會員點擊比例</h4>
									<table class="chart-table" id="StoreClickMember">
										<thead>
											<tr>
												<th>總人數</th>
												<th>會員數</th>
												<th>非會員數</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td id="ShareAll">{{$ShareClick[0]}}</td>
												<td id="ShareMember">{{$ShareClick[1]}}</td>
												<td id="ShareMember2">{{$ShareClick[2]}}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col">
								<div class="chart-frame">
									<h4>活動分享點擊比例</h4>
									<table class="chart-table" id="StoreClickMember">
										<thead>
											<tr>
												<th>FaceBook</th>
												<th>Line</th>
												<th>Email</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td id="ShareFB">{{$ShareClick[3]}}</td>
												<td id="ShareLine">{{$ShareClick[4]}}</td>
												<td id="ShareEmail">{{$ShareClick[5]}}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {

		var chart_json = new Array(); 
		var today=new Date();
		var year = today.getFullYear();

		var value = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);

		$.ajax({
			method: 'POST',
			url: '../../api/registerPie',
			data:{
				'value':value,
			},
			dataType: 'json',
			success: function (data) {


				for (i = 0; i < data.length; i++){
					chart_json.push([data[i].zCity, data[i].count]);
				}

				var chart = {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie',
					useHTML:true
				};
				var title = {
					useHTML:true,
					text: '活動登錄地區比例'
				};
				var tooltip = {
					formatter: function() {
						return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.y, 0, ',');

					},
					useHTML:true,
				};
				var credits = {
					enabled: false
				};
				var plotOptions = {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',

						dataLabels: {
							enabled: true,
							useHTML:true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							style: {
								color: (Highcharts.theme && Highcharts.theme.contrastTextColor)||
								'black'
							}
						}
					},
					series:{
						dataLabels:{
							useHTML:true
						}
					}
				};
				var series = [{
					type: 'pie',
					name: 'Browser share',
					data: chart_json,
				}];
				var json = {};   
				json.chart = chart; 
				json.title = title;     
				json.tooltip = tooltip;  
				json.credits = credits;  
				json.series = series;
				json.plotOptions = plotOptions;
				$('#ADPie').highcharts(json);  
			}
		});

	});


	$(document).ready(function() {

		var chart_json2 = new Array(); 
		var today=new Date();
		var year = today.getFullYear();

		var value = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);

		$.ajax({
			method: 'POST',
			url: '../../api/loginPie',
			data:{
				'value':value,
			},
			dataType: 'json',
			success: function (data) {


				chart_json2.push(['登錄人數', data[1]]);
				chart_json2.push(['未登錄人數', data[0]-data[1]]);

				var chart = {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie',
					useHTML:true
				};
				var title = {
					useHTML:true,
					text: '活動登錄轉換率'
				};
				var tooltip = {
					formatter: function() {
						return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.y, 0, ',');

					},
					useHTML:true,
				};
				var credits = {
					enabled: false
				};
				var plotOptions = {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',

						dataLabels: {
							enabled: true,
							useHTML:true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							style: {
								color: (Highcharts.theme && Highcharts.theme.contrastTextColor)||
								'black'
							}
						}
					},
					series:{
						dataLabels:{
							useHTML:true
						}
					}
				};
				var series = [{
					type: 'pie',
					name: 'Browser share',
					data: chart_json2,
				}];
				var json = {};   
				json.chart = chart; 
				json.title = title;     
				json.tooltip = tooltip;  
				json.credits = credits;  
				json.series = series;
				json.plotOptions = plotOptions;
				$('#loginPie').highcharts(json);  
			}
		});

	});

</script>

@endsection