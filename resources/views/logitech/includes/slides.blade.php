

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
		<ol class="carousel-indicators">
			@php
				$res = count($siders)
			@endphp
			@for ($i = 0; $i < $res; $i++)
				@if($i == 0)
					@php
						$_active = 'active';
					@endphp
				@else
		  			@php
		  				$_active = '';
		  			@endphp
		  		@endif
				<li data-target="#myCarousel" data-slide-to={{$i}} class={{$_active}}></li>
			@endfor
            

		    <!-- <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li> -->

		</ol>
	  <!-- Wrapper for slides -->
	  	<div class="carousel-inner">
	  	@foreach($siders as $k => $v)
	  		@if($k == 0)
	  			@php
	  				$_active = ' active';
	  			@endphp
	  		@else
	  			@php
	  				$_active = '';
	  			@endphp
	  		@endif
            <div class="item{{$_active}}">
        	@if($v->sType == 'INNER')
		      	<a href="event/event-info/{{$v->sActivity}}" onclick="recordBannerClick('{{$v->aId}}')"><img src="{{ substr($v->sImage, 1) }}" alt=""></a>
		    @else
		    	<a href="{{$v->sUrl}}"  onclick="recordBannerClick('{{$v->aId}}')"><img src="{{ substr($v->sImage, 1) }}" alt=""></a>
		    @endif
		      <div class="carousel-caption">
		      </div>
		    </div>
		@endforeach
	  	</div>

	  <!-- Left and right controls -->
	  	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
	    	<span class="lnr lnr-chevron-left"></span>
	    	<span class="sr-only">Previous</span>
	  	</a>
	  	<a class="right carousel-control" href="#myCarousel" data-slide="next">
	    	<span class="lnr lnr-chevron-right"></span>
	    	<span class="sr-only">Next</span>
	  	</a>
	</div>