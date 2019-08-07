

@php 

$url =  $_SERVER['REQUEST_URI'];


$test =  explode('/',$url);

if(isset($test[3]))
{
	$id = $test[3];
}
else{
	
	$id = '';
}

foreach($activities as $fb){
	if($fb->id == $id){
		$aId = $fb->id;
		$aSubject = $fb->aSubject;
		$aDescription = $fb->aDescription;
		$aImage = $fb->aImage;
	}
}

@endphp




	@if(isset($aId))
	<meta property="fb:app_id" content="503275966748258" />
	<meta property="og:url" content="https://www.logitech-event.com.tw/event/event-info/{{$aId}}" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="{{$aSubject}}" />
	<meta property="og:site_name" content="Logitech"/>
	<meta property="og:description" content="{{$aDescription}}" />
	<meta property="og:image" content="https://www.logitech-event.com.tw/{{substr($aImage,1)}}" />
	<meta property="og:image:width" content="768">
	<meta property="og:image:height" content="432">
	@else
	<meta property="og:url" content="https://www.logitech-event.com.tw/" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Logitech羅技最新活動專區，羅技專注於設計與人們生活緊密關連的產品—打造全新的音樂、遊戲、視訊、智慧家庭和運算體驗。台灣" />
	<meta property="og:site_name" content="Logitech"/>
	<meta property="og:description" content="Logitech羅技最新活動專區，羅技專注於設計與人們生活緊密關連的產品—打造全新的音樂、遊戲、視訊、智慧家庭和運算體驗。台灣" />
	<meta property="og:image" content="https://www.logitech-event.com.tw/img/fb.jpg" />
	@endif



