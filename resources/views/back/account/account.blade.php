@extends('back.includes.header')

@section('index')

<div class="container section tab-content">
		<div id="accountinfo" class="tab-pane fade in active">
			<h2 class="bigest-title"><span class="lnr lnr-user"></span> 帳號資訊</h2>
			<div class="rows">
				<button type="button" id="passSecurity">change</button>
				<button type="button" class="btn enter-btn btn-center" data-toggle="modal" data-target="#accountinfo-add-modal"><span class="lnr lnr-plus-circle" style="margin-right: 2px"></span> 新增帳號</button>
				<table class="nowrap event-table dataTable no-footer dtr-inline" style="width: 100%" id="accountinfo-table">
					<thead>
						<tr>
							<td>#</td>
							<th hidden='hidden' id="aId">id</th>
							<td>姓名</td>
							<td>帳號</td>
							<th hidden='hidden' id="group">group</th>
							<td>建立時間</td>
							<td>查看</td>
						</tr>
					</thead>
					<tbody>
						@foreach($account as $data)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td hidden='hidden' id="aId">{{$data->aId}}</th>
							<td>{{$data->aUserName}}</td>
							<td>{{$data->aAccount}}</td>
							<td hidden='hidden' id="group">{{$data->aGroup}}</th>
							<td>{{$data->aCreateDateTime}}</td>
							<td onclick='accountinfo_view(this)'> <span class='lnr lnr-magnifier'></span></a> </td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div id="accountinfo-modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md" role="document">
		<!-- Modal content-->
		<div class="modal-content">
			<form action="">
				<div class="modal-header noborder">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="text-center">帳號管理</h3>
				</div>
				<div class="modal-body x-center">
					<div class="input-rows">
						<p></p><input class="form-control" type="hidden" id="aId2">
						<p>姓名</p><input class="form-control" type="text" id="aUserName2">
					</div>
					<div class="input-rows">
						<p>帳號</p><input class="form-control" type="text" id="aAccount2">
					</div>
					<div class="input-rows">
						<p>群組</p><input class="form-control" type="text" id="aGroup2">
					</div>
					</div>
					<div class="modal-footer noborder x-center">
						<div class="button-group">

							<button class="btn reset-btn" data-dismiss="modal"  onclick="accountinfo_del()">刪除</button> 
							
							<button type="submit" class="btn enter-btn" data-dismiss="modal">確定</button>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
	<!-- accountinfo-add-modal 新增帳號-->
	<div id="accountinfo-add-modal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-md" role="document">
			<!-- Modal content-->
			<div class="modal-content">
				<form id="addAccount">
					<div class="modal-header noborder">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="text-center">新增帳號</h3>
						</div>
						<div class="modal-body x-center">

							<div class="input-rows">
								<p>姓名</p><input class="form-control" type="text" name="aUserName">
							</div>
							<div class="input-rows">
								<p>帳號</p><input class="form-control" type="text" name="aAccount">
							</div>
							<div class="input-rows">
								<p>密碼</p><input class="form-control" type="password" name="aPassword">
							</div>
							<div class="input-rows">
								<p>群組</p><select class="form-control" name="aGroup">
									<option value="L">LogiTech</option>
									<option value="A">AccuHit</option>
								</select>
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
								<button type="submit" class="btn enter-btn" >確定</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>



@endsection