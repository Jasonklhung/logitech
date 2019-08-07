@extends('back.includes.header')

@section('index')

<div class="container section tab-content">
		<!-- 數據儀表板 -->
		<div id="chart" class="tab-pane fade in active">
			<h2 class="bigest-title"><span class="lnr lnr-chart-bars"></span> 數據儀表板</h2>
			<ul class="chart-tabs">
				<li class="chart-tab active"><a data-toggle="tab" href="#member-chart">會員數據</a></li> 
				<li class="chart-tab"><a data-toggle="tab" href="#event-chart">活動數據</a></li>
			</ul>
			<div class="tab-content">
				<!-- 數據儀表板-會員數據 -->
				<div id="member-chart" class="tab-pane fade in active">
					<form class="filter-group">
						<div>活動期間</div>
						<div class="input-group">
							<input type="text" class="form-control choose-date" id="data_start" placeholder="請選擇起始日期">
						</div>
						<div class="input-group">
							<input type="text" class="form-control choose-date" id="data_end" placeholder="請選擇結束日期">
							<button type="button" class="btn search" id="data_search"><span class="lnr lnr-magnifier"></span></button>
						</div>
					</form>
					<hr>
					<div class="container-fluid">
						<div class="rows">
							<div class="col">
								<div class="chart-frame">
									<h4>性別人數</h4>
									<table class="chart-table">
										<tr>
											<th>性別</th>
											<th>人數</th>
										</tr>

										<tr>
											<td>男性</td>
											<td id="male">{{$gender[0]}}</td>
										</tr>
										<tr>
											<td>女性</td>
											<td id="female">{{$gender[1]}}</td>
										</tr>
										<tr>
											<td>總計</td>
											<td id="total">{{$gender[2]}}</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="col">
								<div class="chart-frame">
									<h4>新舊會員比例</h4>
									<table class="chart-table">
										<tr>
											<th width="50%">會員</th>
											<th width="50%">人數</th>
										</tr>
										<tr>
											<td>新會員</td>
											<td id="new">{{$member[0]}}</td>
										</tr>
										<tr>
											<td>既有會員</td>
											<td id="old">{{$member[1]-$member[0]}}</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="col">
								<div class="chart-frame">
									<h4>性別年齡比例</h4>
									<table class="chart-table">
										<tr>
											<th>年齡</th>
											<th>男性</th>
											<th>女性</th>
										</tr>
										<tr>

											<td>18以下</td>
											<td id="M_18">{{$age[0][0]->M_18}}</td>
											<td id="F_18">{{$age[1][0]->F_18}}</td>
										</tr>
										<tr>
											<td>18-24</td>
											<td id="M_1824">{{$age[2][0]->M_1824}}</td>
											<td id="F_1824">{{$age[3][0]->F_1824}}</td>
										</tr>
										<tr>
											<td>25-34</td>
											<td id="M_2534">{{$age[4][0]->M_2534}}</td>
											<td id="F_2534">{{$age[5][0]->F_2534}}</td>
										</tr>
										<tr>
											<td>35-44</td>
											<td id="M_3544">{{$age[6][0]->M_3544}}</td>
											<td id="F_3544">{{$age[7][0]->F_3544}}</td>
										</tr>
										<tr>
											<td>45-54</td>
											<td id="M_4554">{{$age[8][0]->M_4554}}</td>
											<td id="F_4554">{{$age[9][0]->F_4554}}</td>
										</tr>
										<tr>
											<td>55-65</td>
											<td id="M_5565">{{$age[10][0]->M_5565}}</td>
											<td id="F_5565">{{$age[11][0]->F_5565}}</td>
										</tr>
										<tr>
											<td>65以上</td>
											<td id="M_65">{{$age[12][0]->M_65}}</td>
											<td id="F_65">{{$age[13][0]->F_65}}</td>
										</tr>
									</table>		
								</div>
							</div>
							<div class="col">
								<div class="chart-frame">
									<h4>居住地區人數</h4>
									<table class="chart-table" id="northTable">
										<tr>
											<th width="50%">地區</th>
											<th width="50%">人數</th>
										</tr>
										<tr id="northTR">
											<td id="searchNorthTD"><i class="fa fa-sort-down fa-2x" id="searchNorth"></i> 北部</td>
											<td id="north">{{$area[0]}}</td>
										</tr>
									</table>
									<table class="chart-table" id="midTable">
										<tr>
											
										</tr>
										<tr>
											<td id="searchMidTD"><i class="fa fa-sort-down fa-2x" id="searchMid" width="50%"></i> 中部</td>
											<td id="mid" width="50%">{{$area[1]}}</td>
										</tr>
									</table>
									<table class="chart-table" id="southTable">
										<tr>
											
										</tr>
										<tr>
											<td id="searchSouthTD"><i class="fa fa-sort-down fa-2x" id="searchSouth" width="50%"></i> 南部</td>
											<td id="south" width="50%">{{$area[2]}}</td>
										</tr>
									</table>
									<table class="chart-table" id="eastTable">
										<tr>
											
										</tr>
										<tr>
											<td id="searchEastTD"><i class="fa fa-sort-down fa-2x" id="searchEast" width="50%"></i> 東部</td>
											<td id="east" width="50%">{{$area[3]}}</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- 數據儀表板-活動數據 -->
				<div id="event-chart" class="tab-pane fade">
					<form class="filter-group">
						<div class="mg-top-10">活動期間</div>
						<div class="input-group">
							<input type="text" class="form-control choose-date"  id="active_start" placeholder="請選擇活動起始日期">
						</div>
						<div class="input-group">
							<input type="text" class="form-control choose-date"  id="active_end" placeholder="請選擇活動結束日期">
							<button type="button" class="btn search" id="active_search"><span class="lnr lnr-magnifier"></span></button>
						</div>
					</form>
					<hr>
					<div class="container-fluid">
						<table class="nowrap event-table" width="100%" id="event-table">
							<thead>
								<tr>
									<td>#</td>
									<td>活動名稱</td>
									<td>活動日期</td>
									<td>活動點擊數</td>
									<td>活動登錄數</td>
									<td>登錄轉換率</td>
								</tr>
							</thead>
							<tbody>
								@foreach($activity as $data)
								<tr>
									<th>{{ $loop->iteration }}</th>
									<th><a class='seeinfo' href='activity-info/{{$data->id}}'> {{ $data->aTitle }}</th>
									<th><p>{{ $data->aStartDate }}</p><p> {{ $data->aEndDate }}</p></th>
									<th>{{ $data->active_click }}</th>
									<th>{{ $data->active_login }}</th>
									@if( $data->active_click == 0 || $data->active_login == 0) 
									<th>0%</th>
									@else
									<th>{{ round($data->active_login/$data->active_click,2)*100 }}%</th>
									@endif
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#event-table').DataTable({
		"bPaginate": true,
		"pageLength": 10,
		"searching": false,
		"info": false,
		"bLengthChange" : false,
		"responsive": true,
		"ordering": true,
		"language": {
			"paginate": {
				"previous": "<",
				"next": ">"
			}
		},
		"dom": 'rt<"mypage"p>',
		dom: 'Bfrtip',
		buttons: [
		{
			extend: 'csv',
			text: 'CSV下載',
			bom : true},
			],
		});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		
			$.ajax({
				url:'../api/searchMemberArea',
				method:'post',
				dataType:'json',
				data:{
					'area':'north',
				},
				success:function(res){
					var data = "";
					$.each(res, function (i, item) {
						data +="<tr bgcolor='#b8dae6' name='NorthTR' style='display:none;'>" 
							 + "<td>"+item.zCity+"</td>"
    						 + "<td>"+item.count+"</td>"
    						 + "</tr>";
					})

					$('#northTable').append(data);

				}
			})



			$.ajax({
				url:'../api/searchMemberArea',
				method:'post',
				dataType:'json',
				data:{
					'area':'mid',
				},
				success:function(res){
					var data = "";
					$.each(res, function (i, item) {
						data +="<tr bgcolor='#b8dae6' name='MidTR' style='display:none;'>" 
							 + "<td>"+item.zCity+"</td>"
    						 + "<td>"+item.count+"</td>"
    						 + "</tr>";
					})

					$('#midTable').append(data);

				}
			})

			$.ajax({
				url:'../api/searchMemberArea',
				method:'post',
				dataType:'json',
				data:{
					'area':'south',
				},
				success:function(res){
					var data = "";
					$.each(res, function (i, item) {
						data +="<tr bgcolor='#b8dae6' name='SouthTR' style='display:none;'>" 
							 + "<td>"+item.zCity+"</td>"
    						 + "<td>"+item.count+"</td>"
    						 + "</tr>";
					})

					$('#southTable').append(data);

				}
			})

			$.ajax({
				url:'../api/searchMemberArea',
				method:'post',
				dataType:'json',
				data:{
					'area':'east',
				},
				success:function(res){
					var data = "";
					$.each(res, function (i, item) {
						data +="<tr bgcolor='#b8dae6' name='EastTR' style='display:none;'>" 
							 + "<td>"+item.zCity+"</td>"
    						 + "<td>"+item.count+"</td>"
    						 + "</tr>";
					})

					$('#eastTable').append(data);
				}
			})

			$('#searchNorth').on('click',function(){
				var aaa  = document.getElementsByName('NorthTR');

				var style = aaa[0].style.display;

				if(style == ''){
					$.each(aaa, function (i, item) {
						aaa[i].style.display="none";
					})
				}
				else{
					$.each(aaa, function (i, item) {
						aaa[i].style.display="";
					})
				}
			})

			$('#searchMid').on('click',function(){
				var aaa  = document.getElementsByName('MidTR');

				var style = aaa[0].style.display;

				if(style == ''){
					$.each(aaa, function (i, item) {
						aaa[i].style.display="none";
					})
				}
				else{
					$.each(aaa, function (i, item) {
						aaa[i].style.display="";
					})
				}
			})

			$('#searchSouth').on('click',function(){
				var aaa  = document.getElementsByName('SouthTR');

				var style = aaa[0].style.display;

				if(style == ''){
					$.each(aaa, function (i, item) {
						aaa[i].style.display="none";
					})
				}
				else{
					$.each(aaa, function (i, item) {
						aaa[i].style.display="";
					})
				}
			})

			$('#searchEast').on('click',function(){
				var aaa  = document.getElementsByName('EastTR');

				var style = aaa[0].style.display;

				if(style == ''){
					$.each(aaa, function (i, item) {
						aaa[i].style.display="none";
					})
				}
				else{
					$.each(aaa, function (i, item) {
						aaa[i].style.display="";
					})
				}
			})

	})
</script>

@endsection