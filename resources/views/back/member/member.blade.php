@extends('back.includes.header')

@section('index')

<div class="container section tab-content">
			<!-- 會員管理 -->
			<div id="member" class="tab-pane fade in active">
				<h2 class="bigest-title"><span class="lnr lnr-users"></span> 會員管理</h2>
				<div class="rows">
					<form class="filter-group">
			      		<div>註冊日期</div>
			      		<div class="input-group-2" style="margin-right: 10px">
			      			<input type="text" class="form-control choose-date" aria-describedby="search" placeholder="請選擇起始日期" id="StartDate">			      
			      		</div>
			      		~
			      		<div class="input-group">
			      			<input type="text" class="form-control choose-date" aria-describedby="search" placeholder="請選擇結束日期" id="EndDate">
			      			<button type="button" class="btn search" id="Membersearch"><span class="lnr lnr-magnifier"></span></button>
			      		</div>
			      	</form>	
				</div>
				<div class="rows">
					<table class="nowrap stripe hover event-table dataTable no-footer dtr-inline" style="width: 100%" id="member-table">
						<thead>
							<tr>
								<td>#</td>
								<td>姓名</td>
								<td>性別</td>
								<td>E-mail</td>
								<td>手機</td>
								<td>地址</td>
								<td>建立時間</td>
								<td>參與活動1</td>
								<td>參與活動2</td>
								<td>參與活動3</td>
								<td>參與活動4</td>
							</tr>
						</thead>
						<tbody>
										
						</tbody>
					</table>
				</div>
		    </div>
		</div>
	</div>
	<script type="text/javascript">
		//memberDate
$(document).ready(function(){

			$.ajax({
				method:'get',
				url:'../api/memberTable',
				dataType:'json',
				success:function(response){
					var rows;
    				var number = 1;
    				$.each(response, function (i, item) {
    					
    					if(item.aa != '0' && item.bb == '0' && item.cc == '0' && item.dd == '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td>交換禮物不LINE皮 暖入心坎禮</td>"
    						+ "<td></td>"
    						+ "<td></td>"
    						+ "<td></td>"
    						+ "</tr>";
    					}
    					else if(item.aa != '0' && item.bb != '0' && item.cc == '0' && item.dd == '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td>交換禮物不LINE皮 暖入心坎禮</td>"
    						+ "<td>豬事大吉舊換新</td>"
    						+ "<td></td>"
    						+ "<td></td>"
    						+ "</tr>";
    					}
    					else if(item.aa != '0' && item.bb == '0' && item.cc != '0' && item.dd == '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td>交換禮物不LINE皮 暖入心坎禮</td>"
    						+ "<td></td>"
    						+ "<td>遇鍵粉嫩新時尚</td>"
    						+ "<td></td>"
    						+ "</tr>";
    					}
    					else if(item.aa != '0' && item.bb == '0' && item.cc == '0' && item.dd != '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td>交換禮物不LINE皮 暖入心坎禮</td>"
    						+ "<td></td>"
    						+ "<td></td>"
    						+ "<td>畢業季 歡樂慶</td>"
    						+ "</tr>";
    					}
    					else if(item.aa != '0' && item.bb != '0' && item.cc != '0' && item.dd == '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td>交換禮物不LINE皮 暖入心坎禮</td>"
    						+ "<td>豬事大吉舊換新</td>"
    						+ "<td>遇鍵粉嫩新時尚</td>"
    						+ "<td></td>"
    						+ "</tr>";
    					}
    					else if(item.aa != '0' && item.bb != '0' && item.cc == '0' && item.dd != '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td>交換禮物不LINE皮 暖入心坎禮</td>"
    						+ "<td>豬事大吉舊換新</td>"
    						+ "<td></td>"
    						+ "<td>畢業季 歡樂慶</td>"
    						+ "</tr>";
    					}
    					else if(item.aa != '0' && item.bb == '0' && item.cc != '0' && item.dd != '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td>交換禮物不LINE皮 暖入心坎禮</td>"
    						+ "<td></td>"
    						+ "<td>遇鍵粉嫩新時尚</td>"
    						+ "<td>畢業季 歡樂慶</td>"
    						+ "</tr>";
    					}
    					else if(item.aa != '0' && item.bb != '0' && item.cc != '0' && item.dd != '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td>交換禮物不LINE皮 暖入心坎禮</td>"
    						+ "<td>豬事大吉舊換新</td>"
    						+ "<td>遇鍵粉嫩新時尚</td>"
    						+ "<td>畢業季 歡樂慶</td>"
    						+ "</tr>";
    					}
    					else if(item.aa == '0' && item.bb != '0' && item.cc == '0' && item.dd == '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td></td>"
    						+ "<td>豬事大吉舊換新</td>"
    						+ "<td></td>"
    						+ "<td></td>"
    						+ "</tr>";
    					}
    					else if(item.aa == '0' && item.bb != '0' && item.cc != '0' && item.dd == '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td></td>"
    						+ "<td>豬事大吉舊換新</td>"
    						+ "<td>遇鍵粉嫩新時尚</td>"
    						+ "<td></td>"
    						+ "</tr>";
    					}
    					else if(item.aa == '0' && item.bb != '0' && item.cc == '0' && item.dd != '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td></td>"
    						+ "<td>豬事大吉舊換新</td>"
    						+ "<td></td>"
    						+ "<td>畢業季 歡樂慶</td>"
    						+ "</tr>";
    					}
    					else if(item.aa == '0' && item.bb != '0' && item.cc != '0' && item.dd != '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td></td>"
    						+ "<td>豬事大吉舊換新</td>"
    						+ "<td>遇鍵粉嫩新時尚</td>"
    						+ "<td>畢業季 歡樂慶</td>"
    						+ "</tr>";
    					}
    					else if(item.aa == '0' && item.bb == '0' && item.cc != '0' && item.dd == '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td></td>"
    						+ "<td></td>"
    						+ "<td>遇鍵粉嫩新時尚</td>"
    						+ "<td></td>"
    						+ "</tr>";
    					}
    					else if(item.aa == '0' && item.bb == '0' && item.cc != '0' && item.dd != '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td></td>"
    						+ "<td></td>"
    						+ "<td>遇鍵粉嫩新時尚</td>"
    						+ "<td>畢業季 歡樂慶</td>"
    						+ "</tr>";
    					}
    					else if(item.aa == '0' && item.bb == '0' && item.cc == '0' && item.dd != '0'){
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td></td>"
    						+ "<td></td>"
    						+ "<td></td>"
    						+ "<td>畢業季 歡樂慶</td>"
    						+ "</tr>";
    					}
    					else{
    						rows += "<tr>"
    						+ "<td>" + number++ + "</td>"
    						+ "<td> <a class='seeinfo' href='member-info/"+item.id+"'>" + item.cName + "</a></td>"
    						+ "<td>" + item.cGender + "</td>"
    						//+ "<td>" + item.cFBID + "</td>"
    						//+ "<td>" + item.cBirthday + "</td>"
    						+ "<td>" + item.cEmail + "</td>"
    						+ "<td>" + item.cMobile + "</td>"
    						+ "<td>" + item.zCity + item.zArea + item.cAddress + "</td>"
    						+ "<td>" + item.cCreateDateTime + "</td>"
    						+ "<td></td>"
    						+ "<td></td>"
    						+ "<td></td>"
    						+ "<td></td>"
    						+ "</tr>";
    					}
				})
			$('#member-table tbody').append(rows);
			$("#member-table").DataTable({
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
				dom: 'Bfrtip',
				buttons: [
					{
						extend: 'csv',
						text: 'CSV下載',
						bom : true
					},
				],

			});
			$("#member-table_filter input").attr("placeholder","輸入關鍵字查詢");

			}
		})
	})
	</script>

@endsection