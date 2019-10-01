// //取得縣市列表
// function getCity(selectedCity, regCity, regDistinct, regZip) {
//     var url = '/api/getCity.php' ;
//     $('#' + regCity).empty().html('<option selected value="">縣市</option>') ;
//     $('#' + regDistinct).empty().html('<option selected disabled value="">地區</option>') ;
//     $('#' + regZip).val('') ;
    
//     $.post(url, {'city': selectedCity}, function(txt) {
//         $('#' + regCity).append(txt) ;
//     }) ;
    
//     return true ;
// }

// //取得鄉鎮市區列表
// function getDistinct(selectedArea, regCity, regDistinct, regZip) {
//     var url = '/api/getDistinct.php' ;
//     var zCity = $('#' + regCity + '_tmp').val() ;
//     // var zCity = $('#' + regCity).val() ;
//     $('#' + regDistinct).empty().html('<option selected disabled value="">地區</option>') ;
//     $('#' + regZip).val('') ;
    
//     $.post(url, {'city': zCity, 'distinct': selectedArea}, function(txt) {
//         $('#' + regDistinct).append(txt) ;
//         if ((selectedArea != '') && (selectedArea != undefined)) {
//             var _zp = $('#' + regDistinct + ' :selected').val() ;
//             $('#' + regZip).val(_zp) ;
//         }
//     }) ;
    
//     return true ;
// }

// //取得縣市列表
// function getCity2(selectedCity, regCity, regDistinct, regZip) {
//     var url = '/api/getCity.php' ;
//     $('#' + regCity).empty().html('<option selected disabled value="">縣市</option>') ;
//     $('#' + regDistinct).empty().html('<option selected disabled value="">地區</option>') ;
//     $('#' + regZip).val('') ;
    
//     $.post(url, function(txt) {
//         $.each(txt, function(k, v) {
//             var tags = '<option value="' + v.zCity + '"' ;
//             if ((selectedCity != '') && (selectedCity != undefined) && (selectedCity == v.zCity)) {
//                 tags = tags + ' checked="checked"' ;
//             }
//             tags = tags + '>' + v.zCity + '</option>' ;
            
//             $('#' + regCity).append(tags) ;
//         }) ;
//     }, 'json') ;
    
//     return true ;
// }

// //取得鄉鎮市區列表
// function getDistinct2(selectedArea, regCity, regDistinct, regZip) {
//     var url = '/api/getDistinct.php' ;
//     var zCity = $('#' + regCity).val() ;
//     $('#' + regDistinct).empty().html('<option selected disabled value="">地區</option>') ;
//     $('#' + regZip).val('') ;
    
//     $.post(url, {'city' : zCity}, function(txt) {
//         $.each(txt, function(k, v) {
//             var tags = '<option value="' + v.zZip + '"' ;
//             if ((selectedArea != '') && (selectedArea != undefined) && (selectedArea == v.zArea)) {
//                 tags = tags + ' checked="checked"' ;
//             }
//             tags = tags + '>' +  v.zArea + '</option>' ;
            
//             $('#' + regDistinct).append(tags) ;
//         }) ;
//     }, 'json') ;
    
//     return true ;
// }

    
//     if ($('[name="regAgree"]').prop('checked')) var reAgree = 'Y' ;
//     else var reAgree = 'N' ;
//     // console.log('regAgree=' + reAgree) ;
//     if (reAgree != 'Y') {
//         alert('請同意授權個資使用!!') ;
//         $('[name="regAgree"]').focus().select() ;
        
//         return false ;
//     }
    
//     //進行註冊
//     var url = '/api/register.php' ;
//     $.post(url, {
//         'reName' : reName,
//         'reGend' : reGend,
//         'reBirth' : reBirth,
//         'reMobile' : reMobile,
//         'reEmail' : reEmail,
//         'reZip' : reZip,
//         'reAddr' : reAddr,
//         'rePass' : rePass,
//         'reAgree' : reAgree
//     }, function(txt) {
//         $('#register').modal('hide') ;
        
//         if ((txt.status == '200') || (txt.status == '201')) {
//             if (txt.data.cAuthOK == 'N') {
//                 $('#phone-verify2').modal('show') ;
//             }
//             else {
//                 $('#success2').modal('show') ;
//             }
//         }
//         else {
//             $('#replyMsgText').empty().html(txt.message) ;
//             $('#replyMsg').modal('show') ;
//         }
//     }, 'json') ;
// }

// //確認是否已登入
// function verifyLogin(no) {
//     if (no) {
//         $('#agree').modal('show') ;
//     }
//     else {
//         $('#pleaselogin').modal('show') ;
//     }
// }

// //登入檢查
// function loginCheck() {
//     var l = $('#loginAccount').val() ;
//     var p = $('#loginPassword').val() ;
    
//     if ((l == '') || (l == undefined) || (p == '') || (p == undefined)) {
//         alert('登入資訊有誤!!') ;
//         return false ;
//     }
//     else {
//         var url = '/api/loginCheck.php' ;
//         $.post(url, {'l': l, 'p': p, 'a': 'apply'}, function(txt) {
//             if (txt == 'OK') {
//                 $('#pleaselogin').modal('hide') ;
//                 // $('#login-success').modal('show') ;
//                 alert('登入成功，歡迎回來！') ;
//                 location.reload() ;
//                 // $('#agree').modal('hide') ;
//             }
//             else {
//                 alert('帳號密碼錯誤!!') ;
//                 $('#loginPassword').val('') ;
//             }
//         }) ;
//     }
// }

// //登入檢查2
// function loginCheck2() {
//     var l = $('#loginAccount2').val() ;
//     var p = $('#loginPassword2').val() ;
    
//     if ((l == '') || (l == undefined) || (p == '') || (p == undefined)) {
//         alert('登入資訊有誤!!') ;
//         return false ;
//     }
//     else {
//         var url = '/api/loginCheck.php' ;
//         $.post(url, {'l': l, 'p': p}, function(txt) {
//             if (txt == 'OK') {
//                 $('#pleaselogin2').modal('hide') ;
//                 // $('#login-success').modal('show') ;
//                 alert('登入成功，歡迎回來！') ;
//                 location.reload() ;
//             }
//             else {
//                 alert('帳號密碼錯誤!!') ;
//                 $('#loginPassword2').val('') ;
//             }
//         }) ;
//     }
// }

// //產品列表(大類)
// function pCategoryChange(category, product, aid, rp) {
//     $('#' + category).empty().html('<option value="" selected="true" disabled="true">產品</option>') ;
//     $('#' + product).empty().html('<option value="" selected="true" disabled="true">型號</option>') ;
//     var url = '/api/getProductCat.php' ;

//     $.post(url, {'activity': aid, 'rProduct': rp}, function(txt) {
//         $('#' + category).append(txt) ;
//         pProductChange(category, product, aid) ;
//     }) ;
// }

// //產品列表(詳細)
// function pProductChange(category, product, aid) {
//     $('#' + product).empty().html('<option value="" selected="true" disabled="true">型號</option>') ;
    
//     var cat = $('#' + category).val() ;
//     var url = '/api/getProduct.php' ;
//     $.post(url, {'activity': aid, 'cat': cat}, function(txt) {
//         $('#' + product).append(txt) ;
//     }) ;
// }

// //贈品圖5/31 By國霖
// function pProductImage() {
//     var value = $('#productName :selected').val();
    
//     $.ajax({
//         method: "post",
//         dataType: "json",
//         url: "/api/getProductImage.php",
//         data:{
//             'pId':value,
//         },
//         success:function(res){
            
//             var a = document.getElementById('productImage');
            
//             if(res.pId == '32'){
//                 a.src = res.pImage;
//                 a.width = '50';
//                 a.height = '181';
//             }
//             else if(res.pId == '34'){
//                 a.src = res.pImage;
//                 a.width = '200';
//                 a.height = '168';
//             }
//             else{
//                 a.src = res.pImage;
//                 a.width = '200';
//                 a.height = '168';
//             }
//         },
//     });
// }

// //門市縣市分類
// function pStoreCity(aid, pCity, pDistinct) {
//     $('#'+ pCity).empty().html('<option value="" selected="true" disabled="true">縣市地區</option>') ;
//     $('#'+ pDistinct).empty().html('<option value="" selected="true" disabled="true">通路</option>') ;
// 	var url = '/api/getCityStores.php' ;
	
//     $.post(url, {'activity': aid}, function(txt) {
//         $('#'+ pCity).append(txt) ;
//         pStore(aid, pCity, pDistinct) ;
//     }) ;
// }

// //店頭門市
// function pStore(aid, pCity, pDistinct) {
//     $('#'+ pDistinct).empty().html('<option value="" selected="true" disabled="true">通路</option>') ;
	
// 	var ct = $('#' + pCity).val() ;
// 	var url = '/api/getStore.php' ;
//     $.post(url, {'activity': aid, 'c': ct}, function(txt) {
//         $('#'+ pDistinct).append(txt) ;
//     }) ;
// }
// //##

// //欲前往門市縣市分類
// // function goStoreCity(aid, goCity, goDistinct) {
//     // $('#'+ goCity).empty().html('<option value="" selected="true" disabled="true">縣市地區</option>') ;
//     // $('#'+ goDistinct).empty().html('<option value="" selected="true" disabled="true">門市</option>') ;
// 	// var url = '/api/getCityStores.php' ;
	
//     // $.post(url, {'activity': aid}, function(txt) {
//         // $('#'+ goCity).append(txt) ;
//         // goStore(aid, goCity, goDistinct) ;
//     // }) ;
// // }

// //欲前往門市
// function goStore(aid, store, goCity, goDistinct) {
//     $('#'+ goDistinct).empty().html('<option value="" selected="true" disabled="true">經銷商</option>') ;
	
// 	// var ct = $('#' + goCity).val() ;
// 	var url = '/api/getStore.php' ;
//     // $.post(url, {'activity': aid, 'c': ct}, function(txt) {
//     $.post(url, {'activity': aid, 'rStore': store}, function(txt) {
//         $('#'+ goDistinct).append(txt) ;
//     }) ;
// }

// //進行登錄活動
// function registerConfirm(applyDisable, aInvoice, aId) {
//     //表單驗證
//     if (applyDisable) {
//         //消費者帳號已驗證過
//     }
//     else {
//         //消費者帳號尚未驗證
// 		var reName = $('[name="applyName"]').val() ;
// 		// console.log('applyName=' + reName) ;
// 		if ((reName == '') || (reName == undefined)) {
// 			alert('請輸入姓名資訊!!') ;
// 			$('[name="applyName"]').focus().select() ;
			
// 			return false ;
// 		}
// 		else if(reName.match(/\s+$/) || reName.match(/[0-9]+$/)){//姓名格式
// 			alert("姓名資訊!請確實填寫！");
// 			$('[name="regName"]').focus().select() ;
			
// 			return false;
// 		}
		
// 		var reGend = $('input[name="applyGender"]:checked').val()
// 		// console.log('applyGender=' + reGend) ;
// 		if ((reGend == '') || (reGend == undefined)) {
// 			alert('請選擇性別!!') ;
// 			$('[name="applyGender"]').focus().select() ;
			
// 			return false ;
// 		}
		
// 		var reBirth = $('[name="applyBirthday"]').val() ;
// 		// console.log('applyBirthday=' + reBirth) ;
// 		if ((reBirth == '') || (reBirth == undefined)) {
// 			alert('請輸入出生年月日!!') ;
// 			$('[name="applyBirthday"]').focus().select() ;
			
// 			return false ;
// 		}
		
// 		var reMobile = $('[name="applyMobile"]').val() ;
// 		// console.log('applyMobile=' + reMobile) ;
// 		if ((reMobile == '') || (reMobile == undefined)) {
// 			alert('請輸入手機號碼!!') ;
// 			$('[name="applyMobile"]').focus().select() ;
			
// 			return false ;
// 		}
// 		else if(!reMobile.match(/^09[0-9]{2}[0-9]{6}$/)){//行動電話格式
// 			alert("手機號碼請確實填寫！");
// 			$('[name="applyMobile"]').focus().select() ;
			
// 			return false;
// 		}
		
// 		var reEmail = $('[name="applyEmail"]').val() ;
// 		// console.log('applyEmail=' + reEmail) ;
// 		if ((reEmail == '') || (reEmail == undefined)) {
// 			alert('請輸入電子郵件地址!!') ;
// 			$('[name="applyEmail"]').focus().select() ;
			
// 			return false ;
// 		}
// 		else if(!reEmail.match(/[\w\d_.]{2,}@[\w\d_-]{2,}\.[\w\d_-]{2,}(\.[\w\d_-]{2,})?/)){//信箱格式
// 			alert("電子郵件格式請確實填寫！如：aaa@gmail.com");
// 			$('[name="applyEmail"]').focus().select() ;
			
// 			return false;
// 		}
		
// 		var reZip = $('[name="applyZip"]').val() ;
// 		// console.log('applyZip=' + reZip) ;
// 		if ((reZip == '') || (reZip == undefined)) {
// 			alert('請選擇縣市區域!!') ;
// 			$('[name="applyZip"]').focus().select() ;
			
// 			return false ;
// 		}
		
// 		var reAddr = $('[name="applyAddress"]').val() ;
// 		// console.log('applyAddress=' + reAddr) ;
// 		if ((reAddr == '') || (reAddr == undefined)) {
// 			alert('請輸入詳細地址資訊!!') ;
// 			$('[name="applyAddress"]').focus().select() ;
			
// 			return false ;
// 		}  
//     }
// // ##	

// 	if (aInvoice == 11) {
//         //填寫上傳機制：11=兩者皆有
// 		var reInvoice = $('[name="applyInvoice"]').val() ;
// 		if(!reInvoice.match(/^\w+$/)) {//發票資訊
// 			alert("請確認發票資訊是否正確！");
// 			$('[name="applyInvoice"]').focus().select() ;
			
// 			return false;
// 		}

// 		// var reImg = $('[name="upload-file"]').val() ;
// 		// // console.log('upload-file=' + reImg) ;
// 		// if ((reImg == '') || (reImg == undefined)) {
// 			// alert('請上傳發票!!') ;
// 			// $('[name="upload-file"]').focus().select() ;
			
// 			// return false ;
// 		// }
// 		var countImg = 0;
// 		var reImg = $('[name="invoiceImg[]"]').val() ;
// 		// console.log('upload-file=' + reImg) ;
// 		if ((reImg != null)) {
// 			$('[name="invoiceImg[]"]').each(function(){
// 				countImg++;
// 			});
// 		}

// 		if (countImg >= 1) var re = 'Y' ;
// 		else var re = 'N' ;
// 		if (re == 'N') {
// 			alert('請上傳發票!!') ;
// 			$('[name="invoiceImg[]"]').focus().select() ;
			
// 			return false ;
// 		}
// 	}
// 	else if (aInvoice == 10) {
//         //填寫上傳機制：10=上傳發票
// 		var countImg = 0;
// 		var reImg = $('[name="invoiceImg[]"]').val() ;
// 		// console.log('upload-file=' + reImg) ;
// 		if ((reImg != null)) {
// 			$('[name="invoiceImg[]"]').each(function(){
// 				countImg++;
// 			});
// 		}

// 		if (countImg >= 1) var re = 'Y' ;
// 		else var re = 'N' ;
// 		if (re == 'N') {
// 			alert('請上傳發票!!') ;
// 			$('[name="invoiceImg[]"]').focus().select() ;
			
// 			return false ;
// 		}
// 	}
// 	else if (aInvoice == 01) {
//         //填寫上傳機制：01=填寫發票
// 		var reInvoice = $('[name="applyInvoice"]').val() ;
// 		if(!reInvoice.match(/^\w+$/)) {//發票資訊
// 			alert("請確認發票資訊是否正確！");
// 			$('[name="applyInvoice"]').focus().select() ;
			
// 			return false;
// 		}
// 	}
// // ##

// 	var count = 0;
// 	var reProduct = $('[name="productName[]"]').val() ;
// 	if ((reProduct != null)) {
// 		$('[name="productName[]"]').each(function(){
// 			count++;
// 		});
// 	}
// 	// console.log('productName=' + count) ;
// 	if (count >= 1) var re = 'Y' ;
// 	else var re = 'N' ;
// 	if (re == 'N') {
//         alert('請選擇登錄產品!!') ;
//         $('[name="productName[]').focus().select() ;
        
//         return false ;
//     }
	
// 	// var reBuy = $('[name="purchaseDistinct"]').val() ;
// 	// //console.log('purchaseDistinct=' + reBuy) ;
// 	// if ((reBuy == '') || (reBuy == undefined)) {
// 		// alert('請選擇購買通路!!') ;
// 		// $('[name="purchaseDistinct"]').focus().select() ;
		
// 		// return false ;
// 	// }
// // ##

// 	if (aId == 2) {
// 		//活動需要填寫購買通路
// 		var reBrand = $('[name="ownBrand"]').val() ;
// 		//console.log('ownBrand=' + reBrand) ;
// 		if ((reBrand == '') || (reBrand == undefined)) {
// 			alert('請填寫舊品品牌!!') ;
// 			$('[name="ownBrand"]').focus().select() ;
			
// 			return false ;
// 		}
		
// 		var reStore = $('[name="storePurchase"]').val() ;
// 		// console.log('storePurchase=' + reStore) ;
// 		if ((reStore == '') || (reStore == undefined)) {
// 			alert('請選擇經銷商!!') ;
// 			$('[name="storePurchase"]').focus().select() ;
			
// 			return false ;
// 		}
// 	}
// // ##

//     //進行登錄
//     var url = '/api/apply.php' ;
//     var data = $('#applyForm').serialize() ;
//     $.post(url, data, function(txt) {
//         $('#apply').modal('hide') ;
// 		$("#btnConfirm").attr("disabled", true);
// 		setTimeout(function() {
// 			$("#btnConfirm").attr("disabled", false);
// 		}, 5000)
		
//         if (txt.status == 201) {
//             $('#applyRegisterId').val(txt.data.Last_Id) ;
//             $('#phone-verify').modal('show') ;
//         }
//         else if (txt.status == 200) {
// 			// if (aInvoice == 00){
// 			if (aId == 2 && aInvoice == 00){
// 				var QRurl = '/api/qrcode.php' ;
// 				$.post(QRurl, {'rid': txt.no}, function(txt) {
// 					if (txt =='ok'){
// 						$('#success').modal('show') ;
// 					}
// 					else{
// 						$('#replyMsgText').empty().html('登錄失敗!!') ;
// 						$('#replyMsg').modal('show') ;
// 					}
// 				})
// 			}
// 			else{
// 				$('#success').modal('show') ;
// 			}
//         }
//         else {
//             $('#replyMsgText').empty().html('登錄失敗!!') ;
//             $('#replyMsg').modal('show') ;
//         }
//     }, 'json') ;
// }

// //驗證碼確認
// function authCheck2(aId, aInvoice) {
//     var url = '/api/authCheck.php' ;
//     var co = $('#smsAuthCode2').val() ;
//     var ap = $('#applyRegisterId').val() ;
//     $.post(url, {'c': co, 'a': ap}, function(txt) {
//         if (txt == 'OK') {
//             $('#phone-verify').modal('hide') ;
//             // if (aInvoice == 00){
// 			if (aId == 2 && aInvoice == 00){
// 				var QRurl = '/api/qrcode.php' ;
// 				$.post(QRurl, {'rid': ap}, function(txt) {
// 					if (txt =='ok'){
// 						$('#success').modal('show') ;
// 					}
// 					else{
// 						$('#replyMsgText').empty().html('登錄失敗!!') ;
// 						$('#replyMsg').modal('show') ;
// 					}
// 				})
// 			}
// 			else{
// 				$('#success').modal('show') ;
// 			}
//         }
//         else {
//             alert("驗證碼錯誤!!請重新輸入") ;
//         }
//     }) ;
// }

// //會員登出
// function logout() {
//     var url = '/api/logout.php' ;
//     $.post(url, function(txt) {
//         if (txt == 'OK') {
//             alert('您已登出了') ;
//             // window.location = 'https://www.logitech-event.com.tw/?at=accuhit' ;
//             // window.location = 'https://www.logitech-event.com.tw' ;
//             window.location = "/" ;
//         }
//         else {
//             alert('Opps...') ;
//         }
//     }) ;
// }


// //aId = 2 (舊換新活動)已參加過
// function alreadUsed(res) {
// 	if (res == 'Y') {
// 		alert('舊換新活動已參加過') ;
// 		window.location = "/" ;
// 	}
// }

// //aId = 2 (舊換新活動)推送兌換簡訊
// function goExchange(aid, cid) {
// 	$('#success').modal('hide') ;
// 	alert('活動簡訊發送中...請稍等...');
	
// 	var url = '/api/goExchange.php' ;
// 	$.post(url, {'a': aid, 'c': cid}, function(txt) {
//         if (txt.status == 200) {
//             alert('請確認您的手機及Email信箱，是否收到優惠簡訊內容，'+"\n"+'並依指示完成兌換動作。');
// 			reload();
//         }
// 	}, 'json') ;
// }

/* -----------------------------------新羅技js ------------------------*/
//show 得獎公告
function showAward(no) {

    $.ajax({
        url:'../../api/showAward',
        method:'post',
        data:{
            'no':no,
        },
        dataType:'json',
        success:function(response){
            if (response){
                $('#award-show').empty().html(response[0].aState) ;
                $('#award-modal').modal('show');
            }
            else {
                $('#award-show').empty().html('目前尚無得獎名單') ;
                $('#award-modal').modal('show');
            }
        }
    })
}

//Event 全部
$('#ALL').on('click',function(){
    $.ajax({
        method: 'GET',
        url: 'api/allevent',
        dataType: 'json',
        success: function (response) {
            var rows = '';
            var today=new Date();

            var currentDateTime =
            today.getFullYear()+'-'+
            (today.getMonth()+1)+'-'+
            today.getDate()+' '+
            today.getHours()+':'+today.getMinutes();

            var currDate = Date.parse(new Date(currentDateTime.replace(/-/g, '/')));

            $('#active').empty();

            if(response == ''){
                rows += "<div style='text-align:center;''>"
                +"<h4>目前尚無活動</h4>"
                +"</div>";
            }
            else{
                $.each(response, function (i, item) {
                    if(currDate > Date.parse(new Date(item.aEndDate.replace(/-/g, '/'))) ){
                        rows += "<div class='col-md-4 col-sm-6 col-xs-12 x-center'>"
                        +"<a href='event/event-info/"+item.id+"'>"
                        + "<div class='frame'>"
                        + "<div class='frame-top black-top'>"
                        + "<img src=" +item.aImage.substr(1)+ ">"
                        + "</div>"
                        + "<div class='frame-info'>"
                        + "<h4>" +item.aTitle+ "</h4>"
                        + "<h5><span class='glyphicon glyphicon-time' aria-hidden='true'></span>"+item.aStartDate.split(" ")[0]+"-"+item.aEndDate.split(" ")[0]+"</h5>"
                        + "</div>"
                        + "</div>"
                        + "</a>"
                        + "</div>";
                    }
                    else{
                        rows += "<div class='col-md-4 col-sm-6 col-xs-12 x-center'>"
                        +"<a href='event/event-info/"+item.id+"'>"
                        + "<div class='frame'>"
                        + "<div class='frame-top'>"
                        + "<img src=" +item.aImage.substr(1)+ ">"
                        + "</div>"
                        + "<div class='frame-info'>"
                        + "<h4>" +item.aTitle+ "</h4>"
                        + "<h5><span class='glyphicon glyphicon-time' aria-hidden='true'></span>"+item.aStartDate.split(" ")[0]+"-"+item.aEndDate.split(" ")[0]+"</h5>"
                        + "</div>"
                        + "</div>"
                        + "</a>"
                        + "</div>";
                    }
                });
            }
            $('#active').append(rows);
        },
    });
})

//Event 進行中
$('#playing').on('click',function(){
    $.ajax({
        method: 'GET',
        url: 'api/playing',
        dataType: 'json',
        success: function (response) {
            var rows = '';

            $('#active').empty();

            if(response == ''){
                rows += "<div style='text-align:center;''>"
                +"<h4>目前尚無活動</h4>"
                +"</div>";
            }
            else{
                $.each(response, function (i, item) {
                    rows += "<div class='col-md-4 col-sm-6 col-xs-12 x-center'>"
                    +"<a href='event/event-info/"+item.id+"'>"
                    + "<div class='frame'>"
                    + "<div class='frame-top'>"
                    + "<img src=" +item.aImage.substr(1)+ ">"
                    + "</div>"
                    + "<div class='frame-info'>"
                    + "<h4>" +item.aTitle+ "</h4>"
                    + "<h5><span class='glyphicon glyphicon-time' aria-hidden='true'></span>"+item.aStartDate.split(" ")[0]+"-"+item.aEndDate.split(" ")[0]+"</h5>"
                    + "</div>"
                    + "</div>"
                    + "</a>"
                    + "</div>";
                });
            }
            $('#active').append(rows);
        },
    });
})

//Event 已結束
$('#ending').on('click',function(){
    $.ajax({
        method: 'GET',
        url: 'api/ending',
        dataType: 'json',
        success: function (response) {
            var rows = '';

            $('#active').empty();

            if(response == ''){
                rows += "<div style='text-align:center;''>"
                +"<h4>目前尚無活動</h4>"
                +"</div>";
            }
            else{
                $.each(response, function (i, item) {
                    rows += "<div class='col-md-4 col-sm-6 col-xs-12 x-center'>"
                    +"<a href='event/event-info/"+item.id+"'>"
                    + "<div class='frame'>"
                    + "<div class='frame-top black-top'>"
                    + "<img src=" +item.aImage.substr(1)+ ">"
                    + "</div>"
                    + "<div class='frame-info'>"
                    + "<h4>" +item.aTitle+ "</h4>"
                    + "<h5><span class='glyphicon glyphicon-time' aria-hidden='true'></span>"+item.aStartDate.split(" ")[0]+"-"+item.aEndDate.split(" ")[0]+"</h5>"
                    + "</div>"
                    + "</div>"
                    + "</a>"
                    + "</div>";
                });
            }
            $('#active').append(rows);
        },
    });
})


//Event 搜尋
$(document).ready(function(){
	$('#eventStartDate').change(function(){

		var sd = $('#eventStartDate').val();

		$.ajax({
			method: 'POST',
			url: 'api/searchActivities',
			dataType: 'json',
			data:{
				'date':sd,
			},
			success: function (response) {
				var rows = '';

				var today=new Date();

				var currentDateTime =
				today.getFullYear()+'-'+
				(today.getMonth()+1)+'-'+
				today.getDate()+' '+
				today.getHours()+':'+today.getMinutes();

				var currDate = Date.parse(new Date(currentDateTime.replace(/-/g, '/')));

				$('#active').empty();

				if(response == ''){
					rows += "<div style='text-align:center;''>"
					+"<h4>目前尚無活動</h4>"
					+"</div>";
				}
				else{
					$.each(response, function (i, item) {
						if(currDate > Date.parse(new Date(item.aEndDate.replace(/-/g, '/'))) ){
							rows += "<div class='col-md-4 col-sm-6 col-xs-12 x-center'>"
							+"<a href='event/event-info/"+item.id+"'>"
							+ "<div class='frame'>"
							+ "<div class='frame-top black-top'>"
							+ "<img src=" +item.aImage.substr(1)+ ">"
							+ "</div>"
							+ "<div class='frame-info'>"
							+ "<h4>" +item.aTitle+ "</h4>"
							+ "<h5><span class='glyphicon glyphicon-time' aria-hidden='true'></span>"+item.aStartDate.split(" ")[0]+"-"+item.aEndDate.split(" ")[0]+"</h5>"
							+ "</div>"
							+ "</div>"
							+ "</a>"
							+ "</div>";
						}
						else{
							rows += "<div class='col-md-4 col-sm-6 col-xs-12 x-center'>"
							+"<a href='event/event-info/"+item.id+"'>"
							+ "<div class='frame'>"
							+ "<div class='frame-top'>"
							+ "<img src=" +item.aImage.substr(1)+ ">"
							+ "</div>"
							+ "<div class='frame-info'>"
							+ "<h4>" +item.aTitle+ "</h4>"
							+ "<h5><span class='glyphicon glyphicon-time' aria-hidden='true'></span>"+item.aStartDate.split(" ")[0]+"-"+item.aEndDate.split(" ")[0]+"</h5>"
							+ "</div>"
							+ "</div>"
							+ "</a>"
							+ "</div>";
						}
					});
				}
				$('#active').append(rows);
			},
		});
	})
})


//Award 搜尋
$(document).ready(function(){
	$('#awardStartDate').change(function(){
		var sd = $('#awardStartDate').val() ;

		$.ajax({
			method: 'POST',
			url: 'api/searchAward',
			dataType: 'json',
			data:{
				'date':sd,
			},
			success: function (response) {
				var rows = '';

				$('#award').empty();

				if(response == ''){
					rows += "<div style='text-align:center;''>"
					+"<h4>目前尚無得獎公告</h4>"
					+"</div>";
				}
				else{
					$.each(response, function (i, item) {
						rows += "<div class='col-md-4 col-sm-6 col-xs-12 x-center'>"
						+"<a href='event/event-info/"+item.id+"'>"
						+ "<div class='frame'>"
						+ "<div class='frame-top black-top'>"
						+ "<img src=" +item.aImage.substr(1)+ ">"
						+ "</div>"
						+ "<div class='frame-info'>"
						+ "<h4>" +item.aTitle+ "</h4>"
						+ "<h5><span class='glyphicon glyphicon-time' aria-hidden='true'></span>"+item.aStartDate.split(" ")[0]+"-"+item.aEndDate.split(" ")[0]+"</h5>"
						+ "</div>"
						+ "</div>"
						+ "</a>"
						+ "</div>";
					});
				}
				$('#award').append(rows);
			},
		});
	})
})


//檢查註冊參數
function checkValidation() {
    //表單驗證
    var reName = $('[name="regName"]').val() ;
    // console.log('regName=' + reName) ;
    if ((reName == '') || (reName == undefined)) {
        alert('請輸入姓名資訊!!') ;
        $('[name="regName"]').focus().select() ;
        
        return false ;
    }
	else if(reName.match(/\s+$/) || reName.match(/[0-9]+$/)){//姓名格式
		alert("姓名資訊!請確實填寫！");
		$('[name="regName"]').focus().select() ;
		
		return false;
	}
    
    var reGend = $('input[name="regGender"]:checked').val()
    // console.log('regGender=' + reGend) ;
    if ((reGend == '') || (reGend == undefined)) {
        alert('請選擇性別!!') ;
        $('[name="regGender"]').focus().select() ;
        
        return false ;
    }
    
    var reBirth = $('[name="regBirthday"]').val() ;
    // console.log('regBirthday=' + reBirth) ;
    if ((reBirth == '') || (reBirth == undefined)) {
        alert('請輸入出生年月日!!') ;
        $('[name="regBirthday"]').focus().select() ;
        
        return false ;
    }
    
    var reMobile = $('[name="regMobile"]').val() ;
    // console.log('regMobile=' + reMobile) ;
    if ((reMobile == '') || (reMobile == undefined)) {
        alert('請輸入手機號碼!!') ;
        $('[name="regMobile"]').focus().select() ;
        
        return false ;
    }
	else if(!reMobile.match(/^09[0-9]{2}[0-9]{6}$/)){//行動電話格式
		alert("手機號碼請確實填寫！");
		$('[name="regMobile"]').focus().select() ;
		
		return false;
	}
    
    var reEmail = $('[name="regEmail"]').val() ;
    // console.log('regEmail=' + reEmail) ;
    if ((reEmail == '') || (reEmail == undefined)) {
        alert('請輸入電子郵件地址!!') ;
        $('[name="regEmail"]').focus().select() ;
        
        return false ;
    }
	else if(!reEmail.match(/[\w\d_.]{2,}@[\w\d_-]{2,}\.[\w\d_-]{2,}(\.[\w\d_-]{2,})?/)){//信箱格式
		alert("電子郵件格式請確實填寫！如：aaa@gmail.com");
		$('[name="regEmail"]').focus().select() ;
		
		return false;
    }
    
    var regCity = $('[name="regCity"]').val() ;
    // console.log('regZip=' + reZip) ;
    if ((regCity == '') || (regCity == undefined)) {
        alert('請選擇縣市區域!!') ;
        $('[name="regZip"]').focus().select() ;
        
        return false ;
    }
    
    var reAddr = $('[name="regAddress"]').val() ;
    // console.log('regAddress=' + reAddr) ;
    if ((reAddr == '') || (reAddr == undefined)) {
        alert('請輸入詳細地址資訊!!') ;
        $('[name="regAddress"]').focus().select() ;
        
        return false ;
    }
    
    var rePass = $('[name="regPassword"]').val() ;
    // console.log('regPassword=' + rePass) ;
    if ((rePass == '') || (rePass == undefined)) {
        alert('請輸入密碼!!') ;
        $('[name="regPassword"]').focus().select() ;
        
        return false ;
    }
    
    var rePass2 = $('[name="regPassword2"]').val() ;
    // console.log('regPassword=' + rePass) ;
    if (rePass2 != rePass) {
        alert('兩次輸入密碼不一致!!') ;
        $('[name="regPassword"]').focus().select() ;
        
        return false ;
    }

    if ($('[name="regAgree"]').prop('checked')) var reAgree = 'Y' ;
    else var reAgree = 'N' ;
    // console.log('regAgree=' + reAgree) ;
    if (reAgree != 'Y') {
        alert('請同意授權個資使用!!') ;
        $('[name="regAgree"]').focus().select() ;
        
        return false ;
    }

    $( "#registerForm" ).submit();
}

//reload page
function reload(id) {
    location.reload();
}

function cancel() {
	window.location = 'member' ;
}

//登錄活動規則確認
function eventAgree() {
    if ($('#event_agree').prop('checked')) {
        $('#agree').modal('hide') ;
        $('#apply').modal('show') ;
    }
    else {
        $('#event_agree').prop('checked', false) ;
        alert('請同意個資授權使用! 若不同意、將無法進行活動登錄') ;
    }
}

//舊換新選擇產品
$(document).on('change', '#productCategory', function(){
	var productCategory = $('#productCategory').val();
	var aId = $('#aId').val();

	$.ajax({
		url:"../../api/selProduct",	
		method:"POST",
		data:{
			'productCategory':productCategory,
			'aId':aId,
		},					
		success:function(res){
			var selOpts = "<option value='' selected='selected' disabled='true'>請選擇型號</option>";
			$.each(res, function (i, item) {
				selOpts += "<option value='"+item.pId+"'>"+item.pName+"</option>";
			})
			$("#productName").empty();
			$('#productName').append(selOpts);
		}
	})
});

//確認是否參加過活動
function alreadUsed(res) {
	if (res == 'Y') {
		alert('舊換新活動已參加過') ;
		window.location = "" ;
	}
}

//登錄發票-活動
$(document).ready(function(){

	jQuery('.alert-danger').hide();

	$('#applyForm').on('submit',function(e){

		e.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url:'../../api/registerSubmit',
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
					jQuery.each(result.success, function(key, value){
							console.log(key);
							console.log(value);

						if(value == 'ok'){
							jQuery('#apply').modal('hide');
							jQuery('#success').modal('show');
						}
						else{
							
						}
					});
				}
			},
			cache: false,
			contentType: false,
			processData: false
		})
	})
})


//贈品圖
function pProductImage() {
    var value = $('#productName :selected').val();
    var a = document.getElementById('productImage');
    a.src = '';
    a.width = '';
    a.height = '';

    $.ajax({
        method: "post",
        dataType: "json",
        url: "../../api/getProductImage",
        data:{
            'pId':value,
        },
        success:function(res){

        	console.log(res[0].pImage);
            
            var a = document.getElementById('productImage');
            
            if(res[0].pId == '10' || res[0].pId == '34'){
                a.src = '../../'+res[0].pImage;
                a.width = '60';
                a.height = '135';
            }
            else if(res[0].pId == '32'){
                a.src = '../../'+res[0].pImage;
                a.width = '36';
                a.height = '132';
            }
            else{
                a.src = '../../'+res[0].pImage;
                a.width = '108';
                a.height = '120';
            }
        },
    });
}

$(document).ready(function(){
	$('#AuthFalied').on('click',function(){
		$('#phone-verify').modal('show');

		var cTel = $('#Authcel').val();
		var id = $('#Authid').val();
		$.ajax({
            url:"../../api/Authcode",
            method:"POST",
            dataType: "text",
            data:{
                'cTel':cTel,
                'id':id,
            },
            success:function(txt){
                if (txt == 'OK') {
                    
                }
                else{

                }
            }
        });
	})
})

//重新產出驗證碼
function regenerateSMSauthCode() {
	var cTel = $('#Authcel').val();
	var id = $('#Authid').val();
	$.ajax({
		url:"../../api/ResendAuthcode",
		method:"POST",
		dataType: "text",
		data:{
			'id':id,
			'cTel':cTel,
		},
		success:function(txt){
			if (txt == 'OK') {
				alert('驗證碼已送出、請確認！') ;
			}
			else console.log(txt) ;
		}
	});
}


//驗證碼確認
function authCheck() {
	var id = $('#Authid').val();
	var code = $('#smsAuthCode2').val() ;
	$.ajax({
		url:"../../api/authCheck",
		method:"POST",
		dataType: "text",
		data:{
			'id':id,
			'code':code,
		},
		success:function(txt){
			if (txt == 'OK') {
				$('#phone-verify').modal('hide') ;
				window.location.reload()
			}
			else {
				alert("驗證碼錯誤!!請重新輸入") ;
			}
		}
	});
}


// $(document).ready(function(){
// 	$('#netbuy').on('click',function(){
// 		if($("#netbuy").prop("checked")) {
// 			document.getElementById("numberTR1").style.display="";
// 			document.getElementById("numberTR2").style.display="";
// 		}
// 		else{
// 			document.getElementById("numberTR1").style.display="none";
// 			document.getElementById("numberTR2").style.display="none";
// 		}
// 	})
// })


// $(document).on('change', '#storePurchase', function(){
// 	var storePurchase = $('#storePurchase').val();
	
// 	if(storePurchase == '25' || storePurchase == '28' || storePurchase == '29' || storePurchase == '30' || storePurchase == '31' || storePurchase == '32' || storePurchase == '33' || storePurchase == '34' || storePurchase == '35' || storePurchase == '36' || storePurchase == '37' || storePurchase == '38' || storePurchase == '39' || storePurchase == '40'){
// 		document.getElementById("numberTR1").style.display="";
//  		document.getElementById("numberTR2").style.display="";
//  		document.getElementById("netbuy").checked= true;
// 	}
// 	else{
// 		document.getElementById("numberTR1").style.display="none";
//  		document.getElementById("numberTR2").style.display="none";
//  		document.getElementById("netbuy").checked= false;
// 	}
// });



$(document).on('change', '#realstore', function(){

	document.getElementById("numberTR5").style.display="";
	document.getElementById("numberTR6").style.display="";
	document.getElementById("numberTR3").style.display="none";
	document.getElementById("numberTR4").style.display="none";
	document.getElementById("numberTR1").style.display="none";
	document.getElementById("numberTR2").style.display="none";
	document.getElementById("netbuy").checked= false;

});

$(document).on('change', '#netstore', function(){

	document.getElementById("numberTR5").style.display="none";
	document.getElementById("numberTR6").style.display="none";
	document.getElementById("numberTR3").style.display="";
	document.getElementById("numberTR4").style.display="";
	document.getElementById("numberTR1").style.display="";
	document.getElementById("numberTR2").style.display="";
	document.getElementById("netbuy").checked= true;

});