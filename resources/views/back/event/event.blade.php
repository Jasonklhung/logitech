@extends('back.includes.header')

@section('index')

<div class="container section tab-content">
		<div id="event" class="tab-pane fade in active">
			<h2><span class="lnr lnr-star"></span> 活動管理</h2>
				<a type="button" class="btn enter-btn addevent-btn" href="event-add">+ 新增活動</a>
			<div class="rows">
				<form class="filter-group" method="post" action="{{ route('export') }}">
					<div class="mg-top-10">活動參加名單下載</div>
					<div class="input-group">
						<select class="form-control" id="event_active" name="event_active">
							<option  disabled="disabled" selected>選擇活動</option>	
							@foreach($event as $res)
								<option value="{{$res->id}}">{{$res->aTitle}}</option>
							@endforeach
						</select>
					</div>
					<div class="input-group" id="datetest">
						<input type="text" class="form-control choose-date" name="event_start" id="event_start" placeholder="起始日期">
					</div>
					<div class="input-group">
						<input type="text" class="form-control choose-date" name="event_end" id="event_end" placeholder="結束日期">
						<button type="submit" class="btn search" id="event_download">下載</button>
					</div>
				</form>
				<form method="post" enctype="multipart/form-data" action="{{ route('import') }}">
					@csrf
					<input type="file" name="import">
					<div class="input-group"><button type="submit" class="btn search">匯入</button></div>
				</form>
				<hr>

				

				<table class="nowrap stripe event-table dataTable no-footer dtr-inline" style="width: 100%" id="events-table">
					<thead>
						<tr>
							<td>#</td>
							<td>活動名稱</td>
							<td>活動縮圖</td>
							<td>活動期間</td>
							<td>活動狀態</td>
						</tr>
					</thead>
					@foreach($event as $data)
					<tbody>
							<th>{{ $loop->iteration }}</th>
							<th><a class='seeinfo' href='event-info/{{$data->id}}'> {{ $data->aTitle }} </th>
							<th><div class='tableimg-frame'><img src="{{ url($data->aImage) }}" alt=''></div></th>
							<th><p>{{ $data->aStartDate }}</p><p class='dateto'>≀</p><p> {{ $data->aEndDate }}</p></th>
							@if($data->aEndDate < $today)
							<th>已結束</th>
							@elseif($data->aStareDate < $today && $data->aEndDate > $today)
							<th>進行中</th>
							@else
							<th>即將開始</th>
							@endif
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#events-table").DataTable({
			"bPaginate": true,
			"pageLength": 10,
			"searching": true,
			"info": true,
			"bLengthChange" : false,
			"responsive": true,
			"ordering": true,
			"language": {
				"paginate": {
					"previous": "<",
					"next": ">"
				},
				"search": "",
				"loadingRecords": "loading...",
				"processing": "Processing...",
				"zeroRecords": "沒有相符的結果"
			},
			dom: 'frtip',

		});
		$("#events-table_filter input").attr("placeholder","輸入關鍵字查詢");
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#event_download").on('click',function(){
			var event_active = $('#event_active').val();
			var event_start = $('#event_start').val();
			var event_end = $('#event_end').val();

			if(event_active == '' || event_active == null){
				alert('請選擇活動');
				return false;
			}
			else if(event_start == '' || event_end == ''){
				alert('請選擇日期');
				return false;
			}
			else{

			}
		})
	})
</script>

@endsection