$(document).ready(function(){
		$(".open-menu").hide();
		var footHeight= $(".bg-black footer").height();
		var minHeight=$(window).height()-footHeight;
		$(".bg-black .section").css("min-height",minHeight);

		var w=$(window).width();
		if(w<1440){
			$(".open-menu").show();
			$(".left-bar").css("left","-250px");
		}else{
			$(".open-menu").hide();
			$(".left-bar").css("left","0px");
		}

		// $(".event-table").DataTable({
  //         "bPaginate": true,
  //         "pageLength": 10,
  //         "searching": false,
  //         "info": true,
  //         "bLengthChange" : false,
  //         "responsive": true,
  //         "ordering": true,
  //         "language": {
	 //          "paginate": {
		// 	      "previous": "<",
		// 	      "next": ">"
		// 	    }
		//    },
		//    "dom": 'rt<"mypage"p>'	           
 	// 	});



	});

	$('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
		$($.fn.dataTable.tables(true)).DataTable()
		.columns.adjust();
	});
	$(window).resize(function(){
		var footHeight= $(".bg-black footer").height();
		var minHeight=$(window).height()-footHeight;
		$(".bg-black .section").css("min-height",minHeight);
		var w=$(window).width();
		if(w<1440){
			$(".open-menu").show();
			$(".left-bar").css("left","-250px");
		}else{
			$(".open-menu").hide();
			$(".left-bar").css("left","0px");
		}
	});
	$('.choose-date').datepicker({
	    format: "yyyy-mm-dd",
	    language: "zh-TW",
	    autoclose: true
	});

	
    $(function() {
        $('.choose-time').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            widgetPositioning: {
                horizontal: 'right',
            }
        });
    });
    $(function() {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            widgetPositioning: {
                horizontal: 'right',
            }
        });
    });


	//左邊navbar的特效
	 $('.mylnav .lnav').click(function(e) {
        $('.lnav').removeClass('left-bar-hover');
        $(this).addClass('left-bar-hover');
	});
	 $(".close-menu").click(function(){
	 	$(".left-bar").css("left","-250px");
	 	$(".open-menu").show();
	 });
	 $(".open-menu").click(function(){
	 	$(".left-bar").css("left","0");
	 	$(".open-menu").hide();
	 });



	 // 首頁Banner上傳預覽-圖

	 $("#file-upload-banner1").change(function(){
	 	readURL1(this);
	});
	
	function readURL1(input){
	  if(input.files && input.files[0]){
	    var reader = new FileReader();
	    reader.onload = function (e) {
	       $("#preview_img1").attr('src', e.target.result);
	       $("#preview_imgsm1").attr('src', e.target.result);
	    }
	    reader.readAsDataURL(input.files[0]);
	  }
	}

	$("#file-upload-banner2").change(function(){
	 	readURL2(this);
	});
	 
	function readURL2(input){
	  if(input.files && input.files[0]){
	    var reader = new FileReader();
	    reader.onload = function (e) {
	       $("#preview_img2").attr('src', e.target.result);
	       $("#preview_imgsm2").attr('src', e.target.result);
	    }
	    reader.readAsDataURL(input.files[0]);
	  }
	}

	$("#file-upload-banner3").change(function(){
	 	readURL3(this);
	});
	 
	function readURL3(input){
	  if(input.files && input.files[0]){
	    var reader = new FileReader();
	    reader.onload = function (e) {
	       $("#preview_img3").attr('src', e.target.result);
	       $("#preview_imgsm3").attr('src', e.target.result);
	    }
	    reader.readAsDataURL(input.files[0]);
	  }
	}


	$("#file-upload-banner4").change(function(){
	 	readURL3(this);
	});
	 
	function readURL4(input){
	  if(input.files && input.files[0]){
	    var reader = new FileReader();
	    reader.onload = function (e) {
	       $("#preview_img4").attr('src', e.target.result);
	       $("#preview_imgsm4").attr('src', e.target.result);
	    }
	    reader.readAsDataURL(input.files[0]);
	  }
	}


	$("#file-upload-banner5").change(function(){
	 	readURL5(this);
	});
	 
	function readURL5(input){
	  if(input.files && input.files[0]){
	    var reader = new FileReader();
	    reader.onload = function (e) {
	       $("#preview_img5").attr('src', e.target.result);
	       $("#preview_imgsm5").attr('src', e.target.result);
	    }
	    reader.readAsDataURL(input.files[0]);
	  }
	}


	$("#file-upload-banner6").change(function(){
	 	readURL6(this);
	});
	 
	function readURL6(input){
	  if(input.files && input.files[0]){
	    var reader = new FileReader();
	    reader.onload = function (e) {
	       $("#preview_img6").attr('src', e.target.result);
	       $("#preview_imgsm6").attr('src', e.target.result);
	    }
	    reader.readAsDataURL(input.files[0]);
	  }
	}
	$("#upload-eventpic").change(function(){
	 	readURL7(this);
	});
	function readURL7(input){
	  if(input.files && input.files[0]){
	    var reader = new FileReader();
	    reader.onload = function (e) {
	       $("#preview_img7").attr('src', e.target.result);
	    }
	    reader.readAsDataURL(input.files[0]);
	  }
	}

	$("#upload-newspic").change(function(){
	 	readURL8(this);
	});
	function readURL8(input){
	  if(input.files && input.files[0]){
	    var reader = new FileReader();
	    reader.onload = function (e) {
	       $("#preview_img8").attr('src', e.target.result);
	    }
	    reader.readAsDataURL(input.files[0]);
	  }
	}

	

	// 首頁Banner上傳預覽-連結
	$("#enter-url1").change(function(){
		inserturl("#enter-url1");
	});
	$("#enter-url2").change(function(){
		inserturl("#enter-url2");
	});
	$("#enter-url3").change(function(){
		inserturl("#enter-url3");
	});
	$("#enter-url4").change(function(){
		inserturl("#enter-url4");
	});
	$("#enter-url5").change(function(){
		inserturl("#enter-url5");
	});
	$("#enter-url6").change(function(){
		inserturl("#enter-url6");
	});


	function inserturl(id){
		var val=$(id).val();
		var insertto=$(id).attr("insertto");
		$(insertto).attr("href",val);

	}


	/*$(".addinput-btn1").click(function(){
		$(".add-input-group-1").last().after("<div class='add-input-group-1'><select class='form-control' id='Product1'><option value='' disabled='disabled' selected>產品品項</option><option value=''>我是產品品項1</option><option value=''>我是產品品項2</option></select> <select class='form-control' id='Product2'><option value='' disabled='disabled' selected>產品品項</option><option value=''>我是產品型號1</option><option value=''>我是產品型號2</option></select></div>");
	});

	$(".addinput-btn2").click(function(){
		$(".add-input-group-2").last().after("<div class='add-input-group-2'><select class='form-control' id='City'><option value='' disabled='disabled' selected>縣市</option><option value=''>台北市</option><option value=''>新北市</option></select> <select class='form-control' id='Store'><option value='' disabled='disabled' selected>通路</option><option value=''>我是通路1</option><option value=''>我是通路2</option></select></div>");
	});*/


	function changetype(){
		var val=$("#edit-type").val();
		if(val=="ahref"){
			$(".all-select-content .select-content").removeClass("active");
			$("#ahref").addClass("active");
		}else if(val=="htmledit"){
			$(".all-select-content .select-content").removeClass("active");
			$("#htmledit").addClass("active");
			
		}

	}