//活動編輯-新增產品
$(document).on('click', '#createProduct', function(){
	var category = $('#newProductCategory').val();
	var name = $('#newProductName').val();

	if(category == '' || name == ''){
		alert('請輸入產品型號及名稱')
	}
	else{
		$.ajax({
			url:"../../api/addProduct",		
			method:"POST",
			data:{
				'category':category,
				'name':name,
			},
			success:function(res){
				if(res.status == '200'){
					$('#newProductCategory').val('');
					$('#newProductName').val('');
				}
			}
		})
	}
});


//活動編輯-新增通路
$(document).on('click', '#createStore', function(){
	var city = $('#newcity').val();
	var store = $('#newStore').val();

	if(city == '' || store == ''){
		alert('請輸入縣市及通路')
	}
	else{
		$.ajax({
			url:"../../api/addStore",		
			method:"POST",
			data:{
				'city':city,
				'store':store,
			},
			success:function(res){
				if(res.status == '200'){
					$('#newcity').val('');
					$('#newStore').val('');
				}
			}
		})
	}
});

//活動編輯-選擇產品
$(document).on('change', '#ProductCategory', function(){
	var category = $('#ProductCategory').val();
	$.ajax({
		url:"../../api/getProductName",		
		method:"POST",
		data:{
			'category':category,
		},
		success:function(res){
			var selOpts = "";
			$.each(res, function (i, item) {
				selOpts += "<option value='"+item.pId+"'>"+item.pName+"</option>";
			})
			$("#ProductName").empty();
			$('#ProductName').append(selOpts);
		}
	})
});

//活動編輯-選擇通路
$(document).on('change', '#cityName', function(){
	var city = $('#cityName').val();
	$.ajax({
		url:"../../api/getStoreName",		
		method:"POST",
		data:{
			'city':city,
		},
		success:function(res){
			var selOpts = "";
			$.each(res, function (i, item) {
				selOpts += "<option value='"+item.sId+"'>"+item.sName+"</option>";
			})
			$("#storeName").empty();
			$('#storeName').append(selOpts);
		}
	})
});



//活動新增-新增產品
$(document).on('click', '#createProductAdd', function(){
	var category = $('#newProductCategoryAdd').val();
	var name = $('#newProductNameAdd').val();

	if(category == '' || name == ''){
		alert('請輸入產品型號及名稱')
	}
	else{
		$.ajax({
			url:"../api/addProduct",		
			method:"POST",
			data:{
				'category':category,
				'name':name,
			},
			success:function(res){
				if(res.status == '200'){
					$('#newProductCategoryAdd').val('');
					$('#newProductNameAdd').val('');
				}
			}
		})
	}
});


//活動新增-新增通路
$(document).on('click', '#createStoreAdd', function(){
	var city = $('#newcityAdd').val();
	var store = $('#newStoreAdd').val();

	if(city == '' || store == ''){
		alert('請輸入縣市及通路')
	}
	else{
		$.ajax({
			url:"../api/addStore",		
			method:"POST",
			data:{
				'city':city,
				'store':store,
			},
			success:function(res){
				if(res.status == '200'){
					$('#newcityAdd').val('');
					$('#newStoreAdd').val('');
				}
			}
		})
	}
});


//活動新增-選擇產品
$(document).on('change', '#ProductCategoryAdd', function(){
	var category = $('#ProductCategoryAdd').val();
	$.ajax({
		url:"../api/getProductName",		
		method:"POST",
		data:{
			'category':category,
		},
		success:function(res){
			var selOpts = "";
			$.each(res, function (i, item) {
				selOpts += "<option value='"+item.pId+"'>"+item.pName+"</option>";
			})
			$("#ProductNameAdd").empty();
			$('#ProductNameAdd').append(selOpts);
		}
	})
});

//活動新增-選擇通路
$(document).on('change', '#cityNameAdd', function(){
	var city = $('#cityNameAdd').val();
	$.ajax({
		url:"../api/getStoreName",		
		method:"POST",
		data:{
			'city':city,
		},
		success:function(res){
			var selOpts = "";
			$.each(res, function (i, item) {
				selOpts += "<option value='"+item.sId+"'>"+item.sName+"</option>";
			})
			$("#storeNameAdd").empty();
			$('#storeNameAdd').append(selOpts);
		}
	})
});


//活動新增-活動模式選擇
$(document).ready(function(){
	$('input[name="aMode"]').on('click',function(){
		var Mode = $('input[name="aMode"]:checked').val();

		if(Mode == 'F'){
			document.getElementById("aa").style.display="";
			document.getElementById("bb").style.display="none";
			document.getElementById("cc").style.display="none";
			document.getElementById("dd").style.display="none";
			document.getElementById("ee").style.display="none";
			document.getElementById("ff").style.display="none";
			document.getElementById("gg").style.display="none";
			document.getElementById("hh").style.display="none";
		}
		else{
			document.getElementById("aa").style.display="none";
			document.getElementById("bb").style.display="";
			document.getElementById("cc").style.display="";
			document.getElementById("dd").style.display="";
			document.getElementById("ee").style.display="";
			document.getElementById("ff").style.display="";
			document.getElementById("gg").style.display="";
			document.getElementById("hh").style.display="";
		}
	})
});


//新增活動
$(document).ready(function(){

	jQuery('.alert-danger').hide();

	$('#addEvent').on('submit',function(e){

		for (instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}

		e.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url:'../api/addEvent',
			method:"POST",
			data:formData,
			success:function(result){
				if(result.errors) {
					jQuery('.alert-danger').html('');

					jQuery.each(result.errors, function(key, value){

						jQuery('.alert-danger').show();
						jQuery('.alert-danger').append('<li>'+value+'</li>');
					});
				}
				else{
					window.location = 'event';
				}
			},
			cache: false,
			contentType: false,
			processData: false
		})
	})
})


//編輯活動
$(document).ready(function(){

	jQuery('.alert-danger').hide();

	$('#editEvent').on('submit',function(e){

		for (instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}

		e.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url:'../../api/editEvent',
			method:"POST",
			data:formData,
			success:function(result){
				if(result.success) {
					window.location = '../event';
				}
				else{
					jQuery('.alert-danger').html('');
					jQuery('.alert-danger').show();

					jQuery('.alert-danger').append('<li>編輯失敗</li>');
				}
			},
			cache: false,
			contentType: false,
			processData: false
		})
	})
})


//編輯Banner
$(document).ready(function(){
	$('.editBanner').on('click', function(){

		 txt = $(this).parent().parent().find("input:eq(0)").attr('value'); //id

		 txt1 = $(this).parent().parent().find("input:eq(1)").attr('value'); //title

		 txt2 = $(this).parent().parent().find("input:eq(2)").attr('value'); //startdate

		 txt3 = $(this).parent().parent().find("input:eq(3)").attr('value'); //enddate

		 txt4 = $(this).parent().parent().find("input:eq(4)").attr('value'); //sActivity

		 txt5 = $(this).parent().parent().find("input:eq(5)").attr('value'); //type

		 txt6 = $(this).parent().parent().find("input:eq(6)").attr('value'); //surl

  		$("input[name='EditaId']").val(txt);
		$("input[name='EditTitle']").val(txt1);
		$("input[name='EditUrl']").val(txt6);
		$("input[name='StartDate']").val(txt2);
		$("input[name='EndDate']").val(txt3);
		$("input[name='EditAct']").val(txt4);

		var numbers = $(".EditActivity").find("option");

			for (var j = 1; j < numbers.length; j++) {

				//console.log($(numbers[j]).val())
				if ($(numbers[j]).val() == txt4) {
					$(numbers[j]).attr("selected", "selected");
				}
			}

		var act = $('input[name="EditAct"]').val();

		if(txt5 == 'OUTER'){
			document.all.mode[1].checked = true;
			document.getElementById("aaa").style.display="none";
			document.getElementById("bbb").style.display="";
			document.getElementById("ccc").style.display="";
			document.getElementById("ddd").style.display="";
		}
		else{
			document.all.mode[0].checked = true;
			document.getElementById("aaa").style.display="";
			document.getElementById("bbb").style.display="none";
			document.getElementById("ccc").style.display="";
			document.getElementById("ddd").style.display="";
		}


	});
});


//delBanner
$(document).ready(function(){
	$('#delBanner').on('click', function(){

  		var id =  $("input[name='EditaId']").val();

  		if (confirm('是否確定刪除？') == true) {
  			$.ajax({
  				method:'post',
  				url:'../api/delBanner',
  				data:{
  					'id':id
  				},
  				success:function(res){
  					if(res == 'OK'){
  						window.location = 'type';
  					}
  				}
  			})
  		}

	});
});


//Banner新增-模式選擇
$(document).ready(function(){
	$('input[name="addmode"]').on('click',function(){
		var Mode = $('input[name="addmode"]:checked').val();

		if(Mode == 'A'){
			document.getElementById("qq").style.display="";
			document.getElementById("ww").style.display="";
			document.getElementById("ee").style.display="";
			document.getElementById("rr").style.display="none";
		}
		else{
			document.getElementById("qq").style.display="none";
			document.getElementById("ww").style.display="";
			document.getElementById("ee").style.display="";
			document.getElementById("rr").style.display="";
		}
	})
});


//Banner新增-活動顯示時間
$(document).on('change', '#BannerActivity', function(){
	var activity = $('#BannerActivity').val();
	$.ajax({
		url:"../api/getActTime",		
		method:"POST",
		data:{
			'activity':activity,
		},
		success:function(res){
			var start = res[0].aStartDate;
			var end = res[0].aEndDate;

			document.getElementById("ww").style.display="";
			document.getElementById("ee").style.display="";

			$('input[name="BStartDate"]').val(start);
			$('input[name="BEndDate"]').val(end);
		}
	})
});


//Banner新增-新增banner
$(document).ready(function(){

	jQuery('.alert-danger').hide();

	$('#AddBanner').on('submit',function(e){

		e.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url:'../api/addBanner',
			method:"POST",
			data:formData,
			success:function(result){
				if(result.errors) {
					jQuery('.alert-danger').html('');

					jQuery.each(result.errors, function(key, value){

						jQuery('.alert-danger').show();
						jQuery('.alert-danger').append('<li>'+value+'</li>');
					});
				}
				else{
					window.location = 'type';
				}
			},
			cache: false,
			contentType: false,
			processData: false
		})
	})
})



//Banner修改-模式選擇
$(document).ready(function(){
	$('input[name="mode"]').on('click',function(){
		var Mode = $('input[name="mode"]:checked').val();

		if(Mode == 'A'){
			document.getElementById("aaa").style.display="";
			document.getElementById("bbb").style.display="none";
			document.getElementById("ccc").style.display="";
			document.getElementById("ddd").style.display="";
		}
		else{
			document.getElementById("aaa").style.display="none";
			document.getElementById("bbb").style.display="";
			document.getElementById("ccc").style.display="";
			document.getElementById("ddd").style.display="";
		}
	})
});

//Banner編輯修改-活動顯示時間
$(document).on('change', '#EditActivity', function(){
	var activity = $('#EditActivity').val();
	$.ajax({
		url:"../api/getActTime",		
		method:"POST",
		data:{
			'activity':activity,
		},
		success:function(res){
			var start = res[0].aStartDate;
			var end = res[0].aEndDate;

			document.getElementById("ww").style.display="";
			document.getElementById("ee").style.display="";

			$('input[name="StartDate"]').val(start);
			$('input[name="EndDate"]').val(end);
		}
	})
});



//Banner編輯修改
$(document).ready(function(){

	jQuery('.alert-danger').hide();

	$('#editBanner').on('submit',function(e){

		e.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url:'../api/editBanner',
			method:"POST",
			data:formData,
			success:function(result){
				if(result.errors) {
					jQuery('.alert-danger').html('');

					jQuery.each(result.errors, function(key, value){

						jQuery('.alert-danger').show();
						jQuery('.alert-danger').append('<li>'+value+'</li>');
					});
				}
				else{
					window.location = 'type';
				}
			},
			cache: false,
			contentType: false,
			processData: false
		})
	})
})



//CSS更新
$(document).ready(function(){

	jQuery('.alert-danger').hide();
	jQuery('.alert-success').hide();

	$('#editCSS').on('submit',function(e){

		e.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url:'../api/editCSS',
			method:"POST",
			data:formData,
			success:function(result){
				if(result.success) {
					jQuery('.alert-success').html('');

					jQuery.each(result.success, function(key, value){

						jQuery('.alert-success').show();
						jQuery('.alert-success').append('<li>'+value+'</li>');
					});
				}
				else{
					jQuery('.alert-danger').html('');

					jQuery.each(result.errors, function(key, value){

						jQuery('.alert-danger').show();
						jQuery('.alert-danger').append('<li>'+value+'</li>');
					});
				}
			},
			cache: false,
			contentType: false,
			processData: false
		})
	})
})


//memberDateSearch
$(document).ready(function(){
	$('#Membersearch').on('click',function(){

		var start = $('#StartDate').val();
		var end = $('#EndDate').val();

			$.ajax({
				method:'post',
				url:'../api/memberTableSearch',
				data:{
					"start":start,
					"end":end,
				},
				dataType:'json',
				success:function(response){
					var rows;
    				var number = 1;

    				$('#member-table').DataTable().destroy();
					$('#member-table tbody').empty();

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
})


//帳號資訊-查看
function accountinfo_view(obj) {  
	var tds= $(obj).parent().find('td');
	$('#aId').val(tds.eq(1).text());
	$('#aUserName2').val(tds.eq(2).text());
	$('#aAccount2').val(tds.eq(3).text());
	$('#aGroup2').val(tds.eq(4).text());

	$('#accountinfo-modal').modal('show'); 
}


$(document).ready(function(){

	jQuery('.alert-danger').hide();

	$('#addAccount').on('submit',function(e){

		e.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url:'../api/addAccount',
			method:"POST",
			data:formData,
			success:function(result){
				if(result.errors) {
					jQuery('.alert-danger').html('');

					jQuery.each(result.errors, function(key, value){

						jQuery('.alert-danger').show();
						jQuery('.alert-danger').append('<li>'+value+'</li>');
					});
				}
				else{
					window.location = 'account-info';
				}
			},
			cache: false,
			contentType: false,
			processData: false
		})
	})
})



//數據儀錶板->會員數據(日期查詢)
$(document).ready(function(){
	$("#data_search").on('click',function (e) {

		var start = $('#data_start').val();
		var end = $('#data_end').val();

		if (start == '' || end == ''){
			alert('請選擇起始與結束日期');
			return false;
		}
		else{
			
			$.ajax({
				url:"../api/dataSearch",
				method:"POST",
				dataType: "json",
				data:{
					'start':start,
					'end':end
				},
				success:function(response){
					$("#female,#male,#total,#new,#old,#M_18,#F_18,#M_1824,#F_1824,#M_2534,#F_2534,#M_3544,#F_3544,#M_4554,#F_4554,#M_5565,#F_5565,#M_65,#F_65,#north,#mid,#south,#east").text('');
					
					var Male = response[0];
					var Female = response[1];
					var total = response[2];
					var news = response[3];
					var old = response[4]-news;
					var M_18 = response[5][0].M_18;
					var F_18 = response[6][0].F_18;
					var M_1824 = response[7][0].M_1824;
					var F_1824 = response[8][0].F_1824;
					var M_2534 = response[9][0].M_2534;
					var F_2534 = response[10][0].F_2534;
					var M_3544 = response[11][0].M_3544;
					var F_3544 = response[12][0].F_3544;
					var M_4554 = response[13][0].M_4554;
					var F_4554 = response[14][0].F_4554;
					var M_5565 = response[15][0].M_5565;
					var F_5565 = response[16][0].F_5565;
					var M_65 = response[17][0].M_65;
					var F_65 = response[18][0].F_65;
					var north = response[19];
					var mid = response[20];
					var south = response[21];
					var east = response[22];

					var northdata = response[23];
					var middata = response[24];
					var southdata = response[25];
					var eastdata = response[26];

					var data = "";
					$("tr[name='NorthTR']").empty();
					$.each(northdata, function (i, item) {
						data +="<tr bgcolor='#b8dae6' name='NorthTR' style='display:none;'>" 
							 + "<td>"+item.zCity+"</td>"
    						 + "<td>"+item.count+"</td>"
    						 + "</tr>";
					})
					$('#northTable').append(data);


					var data2 = "";
					$("tr[name='MidTR']").empty();
					$.each(middata, function (i, item) {
						data2 +="<tr bgcolor='#b8dae6' name='MidTR' style='display:none;'>" 
							 + "<td>"+item.zCity+"</td>"
    						 + "<td>"+item.count+"</td>"
    						 + "</tr>";
					})
					$('#midTable').append(data2);


					var data3 = "";
					$("tr[name='SouthTR']").empty();
					$.each(southdata, function (i, item) {
						data3 +="<tr bgcolor='#b8dae6' name='SouthTR' style='display:none;'>" 
							 + "<td>"+item.zCity+"</td>"
    						 + "<td>"+item.count+"</td>"
    						 + "</tr>";
					})
					$('#southTable').append(data3);


					var data4 = "";
					$("tr[name='EastTR']").empty();
					$.each(eastdata, function (i, item) {
						data4 +="<tr bgcolor='#b8dae6' name='EastTR' style='display:none;'>" 
							 + "<td>"+item.zCity+"</td>"
    						 + "<td>"+item.count+"</td>"
    						 + "</tr>";
					})
					$('#eastTable').append(data4);



					$('#female').append(Female);
					$('#male').append(Male);
					$('#total').append(total);
					$('#new').append(news);
					$('#old').append(old);
					$('#M_18').append(M_18);
					$('#F_18').append(F_18);
					$('#M_1824').append(M_1824);
					$('#F_1824').append(F_1824);
					$('#M_2534').append(M_2534);
					$('#F_2534').append(F_2534);
					$('#M_3544').append(M_3544);
					$('#F_3544').append(F_3544);
					$('#M_4554').append(M_4554);
					$('#F_4554').append(F_4554);
					$('#M_5565').append(M_5565);
					$('#F_5565').append(F_5565);
					$('#M_65').append(M_65);
					$('#F_65').append(F_65);
					$('#north').append(north);
					$('#mid').append(mid);
					$('#south').append(south);
					$('#east').append(east);
				},
			});
		}
	});
});


//活動數據搜尋
$(document).ready(function(){
	$("#active_search").on('click',function (e) {

		var start = $('#active_start').val();
		var end = $('#active_end').val();

		if (start == '' || end == ''){
			alert('請選擇起始與結束日期');
		}
		else{
			$.ajax({
				url:"../api/activeSearch",
				method:"POST",
				dataType: "json",
				data:{
					'start':start,
					'end':end,
				},
				success:function(response){
					var row;
					var number = 1;
					$.each(response, function (i, item) {
						$('#event-table').DataTable().destroy();
						$('#event-table tbody').empty();

						row += "<tr>"
						+ "<td>" + number++ + "</td>"
						+ "<td><a class='seeinfo' href='activity-info/"+item.id+"'>" + item.aTitle + "</td>"
						+ "<td><p>"+ item.aStartDate +"</p><p> "+ item.aEndDate +"</p></td>"
						+ "<td>" + item.active_click + "</td>"
						+ "<td>" + item.active_login + "</td>"
						+ "<td>" + ((item.active_login/item.active_click)*100).toFixed(2)+'%' + "</td>"
						+ "</tr>";

					});
					$('#event-table tbody').append(row);
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
						}).draw();


				},           
			});
		}
	});
})




//活動數據-詳細內容搜尋
$(document).ready(function(){
	$("#reg_search").on('click',function (e) {

		var start = $('#reg_start').val();
		var end = $('#reg_end').val();
		var value = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);


		if (start == '' || end == ''){
			alert('請選擇起始與結束日期');
		}
		else{
			$.ajax({
				url:"../../api/regSearch",
				method:"POST",
				dataType: "json",
				data:{
					'id':value,
					'start':start,
					'end':end,
				},
				success:function(response){
					
					//居住縣市
					var row;
					$('#regTable tbody').empty();
					$.each(response[0], function (i, item) {
						

						row += "<tr>"
						+ "<td>" + item.zCity + "</td>"
						+ "<td>" + item.count + "</td>"
						+ "</tr>";

					});
					$('#regTable tbody').append(row);
					//


					//註冊比例
					$('#logintotal').empty();
					$('#regtotal').empty();
					$('#regtotal2').empty();
					$('#notreg').empty();
					$('#notreg2').empty();


					$('#logintotal').append(response[1]);
					$('#regtotal').append(response[2]);
					$('#regtotal2').append(((response[2]/response[1])*100).toFixed()+'%');
					$('#notreg').append(response[1]-response[2]);
					$('#notreg2').append(((response[1]-response[2])/response[1]*100).toFixed()+'%');
					//


					//登錄男女比例

					$('#regMale').empty();
					$('#regMale2').empty();
					$('#regFemale').empty();
					$('#regFemale2').empty();

					$('#regMale').append(response[3]);
					$('#regMale2').append(((response[3]/response[1])*100).toFixed()+'%');
					$('#regFemale').append(response[4]);
					$('#regFemale2').append(((response[1]-response[3])/response[1]*100).toFixed()+'%');

					//

					//產品總數
					var rows;
					$('#productTable tbody').empty();
					$.each(response[13], function (i, item) {
						

						rows += "<tr>"
						+ "<td>" + item.pName + "</td>"
						+ "<td>" + item.count + "</td>"
						+ "</tr>";

					});
					$('#productTable tbody').append(rows);
					//

					//BannerClickTable
					var row1;
					$('#BannerClick tbody').empty();
					$.each(response[5], function (i, item) {
						

						row1 += "<tr>"
						+ "<td>" + item.sTitle + "</td>"
						+ "<td>" + item.count + "</td>"
						+ "</tr>";

					});
					$('#BannerClick tbody').append(row1);
					//

					//StoreClickTable
					var row2;
					$('#StoreClick tbody').empty();
					$.each(response[9], function (i, item) {
						

						row2 += "<tr>"
						+ "<td>" + item.sName + "</td>"
						+ "<td>" + item.count + "</td>"
						+ "</tr>";

					});
					$('#StoreClick tbody').append(row2);
					//


					//活動Banner會員點擊比例

					$('#BCM1').empty();
					$('#BCM2').empty();
					$('#BCM3').empty();

					$('#BCM1').append(response[6]);
					$('#BCM2').append(response[7]);
					$('#BCM3').append(response[8]);

					//

					//活動電商會員點擊比例

					$('#SCM1').empty();
					$('#SCM2').empty();
					$('#SCM3').empty();

					$('#SCM1').append(response[10]);
					$('#SCM2').append(response[11]);
					$('#SCM3').append(response[12]);

					//
					$('#ShareFB').empty();
					$('#ShareLine').empty();
					$('#ShareEmail').empty();

					$('#ShareFB').append(response[14]);
					$('#ShareLine').append(response[15]);
					$('#ShareEmail').append(response[16]);


					//縣市pie
					$('#ADPie').empty();

					var chart_json = new Array(); 

					for (i = 0; i < response[0].length; i++){
						chart_json.push([response[0][i].zCity, response[0][i].count]);
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


					//註冊pie

					$('#loginPie').empty(); 

					var chart_json2 = new Array(); 

					chart_json2.push(['登錄人數', response[2]]);
					chart_json2.push(['未登錄人數', response[1]-response[2]]);

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
				},           
			});
		}
	});
})


$(document).ready(function(){
	$('#passSecurity').on('click',function(){
		$.ajax({
			url:'../api/passSecurity',
			method:'post',
			success:function(res){
				
			}
		})
	})
})


function delEvent(id){
	if (confirm('是否確定刪除？') == true) {
		$.ajax({
			method:'post',
			url:'../../api/delEvent',
			data:{
				'id':id,
			},
			success:function(res){
				if(res == 'OK')
				{
					window.location = '../event';
				}
			}
		})
	}
}