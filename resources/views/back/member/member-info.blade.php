@extends('back.includes.header')

@section('index')

<div class="container section tab-content">
			<!-- 會員管理 -->
			<div id="member" class="tab-pane fade in active">
				<div class="title-group">
					<div>
						<h2 class="bigest-title"><span class="lnr lnr-arrow-left-circle pre-page" onclick="history.back()"></span> 會員資料</h2>
						<button class="btn reset-btn" onclick="">刪除</button>
					</div>
				</div>

				<div class="rows">
					<div class="input-rows">
						<p class="input-title">姓名：</p>{{$member[0]['cName']}}<p class="input-val"></p>
					</div>
					@if($member[0]['cGender'] == 'M')
					<div class="input-rows">
						<p class="input-title">性別：</p>男<p class="input-val"></p>
					</div>
					@else
					<div class="input-rows">
						<p class="input-title">性別：</p>女<p class="input-val"></p>
					</div>
					@endif
					<div class="input-rows">	
						<p class="input-title">生日：</p>{{$member[0]['cBirthday']}}<p class="input-val"></p>	
					</div>
					<div class="input-rows">
						<p class="input-title">E-mail：</p>{{$member[0]['cEmail']}}<p class="input-val"></p>
					</div>
					<div class="input-rows">
						<p class="input-title">手機：</p>{{$member[0]['cMobile']}}<p class="input-val"></p>
					</div>
					<div class="input-rows">
						<p class="input-title">地址：</p>{{$member[0]['zCity']}}{{$member[0]['zArea']}}{{$member[0]['cAddress']}}<p class="input-val"></p>
					</div>
				</div>
				<table class="nowrap event-table dataTable no-footer dtr-inline" style="width: 100%" id="memberinfo-table">
					<thead>
						<tr>
							<td>#</td>
							<td>活動名稱</td>
							<td>產品型號</td>
							<td>活動狀態</td>
							<td>登錄時間</td>
							<td> </td>
						</tr>
					</thead>					
					<tbody>
					@foreach($member as $member)
						@if($member->aTitle == '')

						@else
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $member->aTitle }}</td>
							<td>{{ $member->product }}</td>
							@if($member->endDate < $today)
							<td>已結束</td>
							@else
							<td>進行中</td>
							@endif
							<td>{{ $member->regTime }}</td>
							<td><a class="seeinfo" href="{{url('/event/event-info/'.$member->AID.' ')}}" target="_blank">查看活動</a></td>
						</tr>
						@endif
					@endforeach
					</tbody>					
				</table>
		    </div>
		</div>
	</div>

@endsection