@extends('logitech.includes.header')

@section('index')


<!-- 主要內容 -->
    <div class="section">
        <div class="container">
            <div class="title x-center">
                <h3 class="big-title">最新活動</h3>
                <div class="line"></div>
            </div>
            
            <div class="row">
                @foreach($activities as $data)
                    @if($data->aMode == 'F')
                    <div class="col-md-4 col-sm-6 col-xs-12 x-center">

                        <a href="{{$data->aFBLink}}" target="_blank">
                            <div class="frame">
                                <div class="frame-top">
                                    <img src="{{ substr($data->aImage, 1) }}" alt="">
                                </div>
                                <div class="frame-info">
                                    <h4>{{$data->aTitle}}</h4>
                                    <h5><span class="glyphicon glyphicon-time" aria-hidden="true"></span> {{explode(' ',$data->aStartDate)[0]}}-{{explode(' ',$data->aEndDate)[0]}}</h5>
                                    <!--分享--> 
                                    <h5 class="shares">
                                        <a href="Javascript:void(0);" onclick="heateorSssPopup('https://www.facebook.com/dialog/share?app_id=210518683208429&display=page&href={{$data->aFBLink}}','{{$data->id}}')">
                                            <div class="icon-frame">
                                                <img src="img/fb_share2.jpg">
                                            </div>
                                        </a>
                                        <a href="https://timeline.line.me/social-plugin/share?url={{$data->aFBLink}} {{$data->aDescription}}" onclick="ShareClick('{{$data->id}}','Line')" target="_blank">
                                            <div class="icon-frame">
                                                <img src="img/line_share.jpg">
                                            </div>
                                        </a>
                                        <a href="mailto:?subject={{$data->aSubject}}&body={{$data->aDescription}}{{$data->aFBLink}}" onclick="ShareClick('{{$data->id}}','Email')" target="_blank">
                                            <div class="icon-frame">
                                                <img src="img/mail.jpg">
                                            </div>
                                        </a>
                                    </h5>
                                </div>  
                            </div>
                        </a>
                    </div>
                 @else
                 <div class="col-md-4 col-sm-6 col-xs-12 x-center">
                    <a href="{{url ("/event/event-info/$data->id ") }}" target="_blank">
                        <div class="frame">
                            <div class="frame-top">
                                <img src="{{ substr($data->aImage, 1) }}" alt="">
                            </div>
                            <div class="frame-info">
                                <h4>{{$data->aTitle}}</h4>
                                <h5><span class="glyphicon glyphicon-time" aria-hidden="true"></span>{{explode(' ',$data->aStartDate)[0]}}-{{explode(' ',$data->aEndDate)[0]}}</h5>
                                <!-- 分享 -->
                                <h5 class="shares">
                                    <a href="Javascript:void(0);" onclick="heateorSssPopup('https://www.facebook.com/dialog/share?app_id=210518683208429&display=page&href=https://www.logitech-event.com.tw/event/event-info/{{$data->id}}','{{$data->id}}')">
                                        <div class="icon-frame">
                                            <img src="img/fb_share2.jpg">
                                        </div>
                                    </a>
                                    <a href="https://timeline.line.me/social-plugin/share?url=https://www.logitech-event.com.tw/event/event-info/{{$data->id}}{{$data->aDescription}}" onclick="ShareClick('{{$data->id}}','Line')" target="_blank">
                                        <div class="icon-frame">
                                            <img src="img/line_share.jpg">
                                        </div>
                                    </a>
                                    <a href="mailto:?subject={{$data->aSubject}}&body={{$data->aDescription}}https://www.logitech-event.com.tw/event/event-info/{{$data->id}}" onclick="ShareClick('{{$data->id}}','Email')" target="_blank">
                                        <div class="icon-frame">
                                            <img src="img/mail.jpg">
                                        </div>
                                    </a>
                                </h5>
                            </div>  
                        </div>
                    </a>
                </div>
                @endif
                @endforeach

                <!-- <div class="col-md-4 col-sm-6 col-xs-12 x-center">
                    
                    <a href="https://www.facebook.com/logitech.taiwan/photos/a.115084561878939/2207073029346738/?type=3&theater" target="_blank">
                        <div class="frame">
                            <div class="frame-top">
                                <img src="media/event/03_event-site-FB Banner_768x432-01.jpg" alt="">
                            </div>
                            <div class="frame-info">
                                <h4>分享活動貼文，抽2名K380鍵盤</h4>
                                <h5><span class="glyphicon glyphicon-time" aria-hidden="true"></span> 2019/4/30-2019/6/30</h5>
                                 
                                <h5 class="shares">
                                    <a href="Javascript:void(0);" onclick="heateorSssPopup('https://www.facebook.com/sharer/sharer.php?u=https://www.facebook.com/logitech.taiwan/posts/2193987880655253')">
                                        <div class="icon-frame">
                                            <img src="img/fb_share2.jpg">
                                        </div>
                                    </a>
                                    <a href="https://timeline.line.me/social-plugin/share?url=https://www.facebook.com/logitech.taiwan/posts/2193987880655253 分享活動貼文，抽2名K380鍵盤" target="_blank">
                                        <div class="icon-frame">
                                            <img src="img/line_share.jpg">
                                        </div>
                                    </a>
                                    <a href="mailto:?subject=分享活動貼文，抽2名K380鍵盤&body=入手K380即可獲得時尚羊毛氈平板套(數量有限,送完為止) https://www.facebook.com/logitech.taiwan/posts/2193987880655253" target="_blank">
                                        <div class="icon-frame">
                                            <img src="img/mail.jpg">
                                        </div>
                                    </a>
                                </h5>
                            </div>  
                        </div>
                    </a>
                </div> -->
                <!-- <div class="clearfix hidden-xs"></div>  修正排版問題BY曾 每三個要加一次 --> 
                <div class="col-md-4 col-sm-6 col-xs-12 x-center">
                    <a href="https://store.logitech.tw/v2/official/SalePageCategory/275814" target="_blank">
                        <div class="frame">
                            <div class="frame-top">
                                <img src="img/05_event site Banner-04.jpg" alt="">
                            </div>
                            <div class="frame-info">
                                <h4>電商獨賣禮盒 新年送禮首選！</h4>
                                <h5><span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                <!-- 分享 -->
                                <h5 class="shares">
                                    <a href="Javascript:void(0);" onclick="heateorSssPopup('https://www.facebook.com/sharer/sharer.php?u=https://store.logitech.tw/v2/official/SalePageCategory/275814')">
                                            <div class="icon-frame">
                                                <img src="img/fb_share2.jpg">
                                            </div>
                                        </a>
                                    <a href="https://timeline.line.me/social-plugin/share?url=https://store.logitech.tw/v2/official/SalePageCategory/275814 電商獨賣禮盒，聖誕交換禮物首選!" target="_blank">
                                        <div class="icon-frame">
                                            <img src="img/line_share.jpg">
                                        </div>
                                    </a>
                                    <a href="mailto:?subject=電商獨賣禮盒，聖誕交換禮物首選!&body=電商獨賣禮盒，聖誕交換禮物首選! https://store.logitech.tw/v2/official/SalePageCategory/275814" target="_blank">
                                        <div class="icon-frame">
                                            <img src="img/mail.jpg">
                                        </div>
                                    </a>
                                </h5>
                            </div>  
                        </div>
                    </a>
                </div>

            </div>
            <div class="learnmore x-center">
                <h4><a href="{{ url("event") }}">> 查看更多活動</a></h4>
            </div>
        </div>
    </div>
    <!-- 電商 -->
    <div style="margin-bottom: 50px;">
        <div class="container">
            <div class="title x-center">
                <h3 class="big-title">購物去</h3>
                <div class="line"></div>
            </div>
            <ul class="ss-store">
            <li><a href="https://store.logitech.tw/v2/official " target="_blank"><img src="img/ss1.jpg"></a></li>
            <li><a href="https://24h.pchome.com.tw/region/DSAR" target="_blank"><img src="img/ss2.jpg"></a></li>
            <li><a href="https://tw.buy.yahoo.com/?sub=779" target="_blank"><img src="img/ss3.jpg"></a></li>
            <li><a href="https://www.momoshop.com.tw/category/LgrpCategory.jsp?l_code=2120800000" target="_blank"><img src="img/ss4.jpg"></a></li>
            <li><a href="https://shopee.tw/logitech.store" target="_blank"><img src="img/ss5.jpg"></a></li> 
            </ul>
        </div>
    </div>

@endsection