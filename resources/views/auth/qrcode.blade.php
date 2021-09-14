@extends('logitech.includes.qrcode')

@section('index')

<script type="text/javascript">
	$.ajax({
		method:'get',
		url:"{{route('ShareClick2')}}",
		dataType:'json',
		data:{
			'activity':'12',
			'type':'qrcode',
			'consumerId':'null'
		},
		success:function(res){

		}
	})
	location.replace('https://www.logitech-event.com.tw/event/event-info/12')
</script>
@endsection
