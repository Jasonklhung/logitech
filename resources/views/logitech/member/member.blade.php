@extends('logitech.includes.header')

@section('index')
	<!-- 主要內容 -->
	<div class="section member">
		<div class="container">
			<ul class="nav nav-tabs">
			    <li class="active"><a data-toggle="tab" href="#member-info">個人基本資料</a></li>
			    <li><a data-toggle="tab" href="#apply-history">登錄歷史紀錄</a></li>
			</ul>
			<div class="tab-content">
			    <div id="member-info" class="tab-pane fade in active">
			    	<form method="POST" action="{{route('editinfo')}}" name="editinfo" onKeyDown="if (event.keyCode == 13) {return false;}">
			    		@csrf
			    		<table class="member-info">
			    			<tr>
			    				<td>姓名：</td>
			    				<td>{{Auth::guard('web')->user()->cName}}</td>
			    			</tr>
			    			<tr>
			    				<td>性別：</td>
			    				@if(Auth::guard('web')->user()->cGender == 'M')					
								<td>男</td>
								@else
								<td>女</td>
								@endif
			    			</tr>
			    			<tr>
			    				<td>生日：</td>
								<td>{{Auth::guard('web')->user()->cBirthday}}</td>
			    			</tr>
			    			<tr>
			    				<td>Email：</td>
			    				<td class="flex-inline"><div class="edit">{{Auth::guard('web')->user()->cEmail}}</div><input class="form-control val" type='hidden'><span class="lnr lnr-pencil edit-symbol"></span></td>
			    			</tr>
			    			<tr>
			    				<td>手機號碼：</td>
			    				<td class="flex-inline"><div class="edit">{{Auth::guard('web')->user()->cMobile}}</div></td>
			    			</tr>
			    			<tr>
			    				<td>郵寄地址：</td>
			    				@if($zip == '')
			    				<td class="flex-inline"><div class="edit">{{Auth::guard('web')->user()->cAddress}}</div><input class="form-control val" type='hidden'><span class="lnr lnr-pencil edit-symbolA"></span></td>
			    				@else
			    				<td class="flex-inline"><div class="edit2">{{$zip->zCity}}{{$zip->zArea}}{{Auth::guard('web')->user()->cAddress}}</div><input class="form-control val" type='hidden'><span class="lnr lnr-pencil edit-symbolA"></span></td>
			    				@endif
			    			</tr>
			    			<tr>
			    				<td>密碼：</td>
			    				<td class="flex-inline"><div class="edit">**********</div><input class="form-control val" type='hidden'><span class="lnr lnr-pencil change-pass"></span></td>
			    			</tr>
			    			<!-- <tr>
			    				<td>&nbsp;</td><td>
                                    <button type="submit" class="btn btn-default main-button">確定修改</button><br><br>

                                    <button type="button" class="btn btn-default main-button" onclick="cancel()">取消重整</button>
                                </td>
			    			</tr> -->
			    		</table>
			    		<div class="btn-group1">
				    		<button type="submit" class="btn btn-default main-button">確定修改</button><br><br>
	                        <button type="button" class="btn btn-default main-button" onclick="cancel()">取消重整</button>
                        </div>
			    	</form>
			    </div>
			    <div id="apply-history" class="tab-pane fade">
			    	<table class="apply-history nowrap row-border" id="activities-list" width="100%">
						<thead>
							<tr>
								<td>#</td>
								<td>活動名稱</td>
								<td>產品型號</td>
								<td>公告名單</td>
								<td>登錄時間</td>
								<td>活動狀態</td>
							</tr>
						</thead>
						<tbody>
							@foreach($activity as $data)
							@if($data->title == '')

							@else
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $data->title }}</td>
								<td>{{ $data->product }}</td>
								<td><a href="event/event-info/{{$data->id}}">查看內容</a></td>
								<td>{{ $data->regTime }}</td>
								@if($data->endDate <$today)
								<td>已結束</td>
								@else
								<td>進行中</td>
								@endif
							</tr>
							@endif
							@endforeach
						</tbody>
					</table> 	
			    </div>
			</div>
	  	</div>
	</div>

	<!-- 修改密碼 model-->
	<div class="modal fade" id="change-pass" role="dialog">
	    <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		        <div class="modal-header modal-noborder">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        <div class="modal-body">
		        	<form id="changePass">
		        		@csrf
		        		<div class="content">
		        			<center><h4>修改密碼</h4></center>

		        			<div class="alert alert-danger">
		        				<ul>
		        					@foreach($errors as $error)
		        					<li>{{ $error }}</li>
		        					@endforeach
		        				</ul>
		        			</div>

		        			<input type="password" class="form-control modal-input" name="oldpassword" placeholder="請輸入舊密碼" required="">
		        			<br>
		        			<input type="password" class="form-control modal-input mg-bt-20" style="margin-bottom: 5px;" name="newpassword" placeholder="請輸入新密碼" required="">
		        			<input type="password" class="form-control modal-input mg-bt-20" name="confirmpassword" placeholder="請再次輸入輸入新密碼" required="">

		        		</div>
		        		<center>
		        			<div class="button-group mg-bt-20">
		        				<button type="submit" class="btn btn-default login-success main-button-sm" data-toggle="modal">修改</button>
		        				<button type="button" class="btn btn-default register main-button-sm" data-toggle="modal" data-dismiss="modal">取消</button>
		        			</div>
		        		</center>
		        	</form>

		        </div>
		    </div>
	    </div>
	</div>
	<script type="text/javascript">
		$("#activities-list").DataTable({
	        "bPaginate": true,
	        "pageLength": 10,
	        "language": {
		        "paginate": {
			      "previous": "<",
			      "next": ">"
			    }
			 },
	        "searching": false,
	        "info": false,
	        "bLengthChange" : false,
	        "responsive": true,
	        "ordering": false,
	        "dom": 'rt<"mypage"p>',
            "oLanguage": {
               "sZeroRecords": "無活動登錄紀錄"
            },
	 	});

		$('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
			$($.fn.dataTable.tables(true)).DataTable()
			.columns.adjust();
		});

		//編輯個人資料(鉛筆點擊觸發)
		$(".edit-symbol").click(
			function(){
			var email = $('.edit').html();
			$(this).hide();//隱藏鉛筆避免2次點擊
			$(this).parent().children(".edit").after("<input type='text' name='email' class='form-control input-val' value='"+email+"'>");//製造一個拋棄式input
			$(this).parent().children(".edit").hide();
			$(".input-val").keypress(function(e){
			  code = (e.keyCode ? e.keyCode : e.which);
			  if (code == 13)
			  {
			  		var inputval=$(this).val().trim();
			  		if(inputval||inputval!=""){ //如果有值傳值給隱藏欄位
			  			$(this).parent().children(".edit").html(inputval);
					    $(this).parent().children(".val").val(inputval);//給隱藏欄位值
					    $(this).parent().children(".edit").show();
					    $(this).parent().children(".edit-symbol").show();
					    $(this).remove();
			  		}
			      
			      $(this).parent().children(".edit").hide();
	  			  $(this).parent().children(".edit-symbol").show();
	  			  $(this).remove();
			  }
			});
		});


		$(".edit-symbolA").click(
			function(){
			var address = $('.edit2').html();
			$(this).hide();//隱藏鉛筆避免2次點擊
			$(this).parent().children(".edit2").after("<input type='text' name='addr' value='"+address+"' class='form-control input-valA'>");//製造一個拋棄式input
			$(this).parent().children(".edit2").hide();
			$(".input-valA").keypress(function(e){
			  code = (e.keyCode ? e.keyCode : e.which);
			  if (code == 13)
			  {
			  		var inputval=$(this).val().trim();
			  		if(inputval||inputval!=""){ //如果有值傳值給隱藏欄位
			  			$(this).parent().children(".edit2").html(inputval);
					    $(this).parent().children(".val").val(inputval);//給隱藏欄位值
					    $(this).parent().children(".edit2").show();
					    $(this).parent().children(".edit-symbolA").show();
					    $(this).remove();
			  		}
			      
			      $(this).parent().children(".edit2").hide();
	  			  $(this).parent().children(".edit-symbolA").show();
	  			  $(this).remove();
			  }
			});
		});

		$(".change-pass").click(function(){
			$('#change-pass').modal('show');
		})
	</script>
	<script type="text/javascript">
		$(document).ready(function(){

			jQuery('.alert-danger').hide();

			$('#changePass').on('submit',function(e){

				e.preventDefault();
				var formData = new FormData(this);

				$.ajax({
					method:'POST',
					url:"{{route('changePass')}}",
					data:formData,
					success:function(result)
					{
						if(result.errors) {
							jQuery('.alert-danger').html('');

							jQuery.each(result.errors, function(key, value){

								jQuery('.alert-danger').show();
								jQuery('.alert-danger').append('<li>'+value+'</li>');
							});
						}
						else{
							jQuery('.alert-danger').html('');

							jQuery.each(result.success, function(key, value){

								jQuery('.alert-danger').show();
								jQuery('.alert-danger').append('<li>'+value+'</li>');
								window.location.reload()
							});
						}
					},
					cache: false,
					contentType: false,
					processData: false
				})
			})
		})
	</script>
@endsection