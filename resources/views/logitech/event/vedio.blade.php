@extends('logitech.includes.header-vedio')

@section('index')
<div class="ytber-banner">
    <a href="">
        <img src="{{ url("img/ytber_banner.jpg") }}" alt="職人首選">
    </a>
</div>
<div class="ytber-page">
        <div class="ytber-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 vcenter">
                        <img src="{{ url("img/Group 11.png") }}" alt="">
                    </div>
                    <div class="col-sm-6 text vcenter">
                        <h3 class="big-title">分享職人系列影片抽羅技好禮</h3>
                        <div class="line"></div>
                        <p>
                            羅技職人首選Master系列新品，特別邀請知名暢銷作家御姊愛及門前隱味大叔合作拍攝MX系列職人影片，活動期間只要在臉書公開分享職人系列影片，即可參加抽獎，有機會獲得MX Master
                            3或MX
                            Keys智能鍵盤，立刻分享影片並抽羅技好禮！
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ytber-video" id="video-area">
            <div class="container">
                <h3 class="big-title">羅技Master系列新品職人跨界合作</h3>
                <div class="line"></div>
                <div class="row">
                    <div class="col-sm-6 ytber">
                        <div class="yt-wrap">
                            <iframe src="https://www.youtube.com/embed/q9zVSWa_DoE" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                        <div class="row share">
                            <div class="col-xs-7 col-sm-6 vcenter">
                                    <h4>大叔 Archer</h4>
                                    <p>門前隱味牛肉麵老闆</p>
                            </div>
                            <div class="col-xs-5 col-sm-6 vcenter">
                                <a href="{{ route('redirect') }}" target="_blank" class="share-btn">點此分享</a>
                            </div>
                        </div>
                        <hr>
                        <p class="text">
                            門前隱味牛肉麵店老闆，同時也是三家網頁設計公司的老闆，自稱大叔，總是以帶點感性又幽默的故事口吻，在粉絲團分享許多開店日常及充滿溫度的能量文字。一天限量銷售30碗牛肉麵的門前隱味，目前訂位已預約至2021年底，而大叔也將繼續傳遞美味與溫度給更多喜愛門前隱味的朋友們。
                        </p>
                    </div>
                    <div class="col-sm-6 ytber">
                        <div class="yt-wrap">
                            <iframe src="https://www.youtube.com/embed/ZhK8Lt_2Yz4" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                        <div class="row share">
                            <div class="col-xs-7 col-sm-6 vcenter">
                                <h4>御姊愛</h4>
                                <p>知名暢銷作家</p>
                            </div>
                            <div class="col-xs-5 col-sm-6 vcenter">    
                                <a href="{{ route('redirect2') }}" target="_blank" class="share-btn">點此分享</a>
                            </div>
                        </div>
                        <hr>
                        <p class="text">
                            知名暢銷作家及主持人，寫作領域涵蓋兩性、職場、跨國文化、女力、美學。目前為GQ雜誌撰寫專欄，也曾為商業周刊、壹週刊、皇冠雜誌、姊妹淘、TVBS專欄作家，撰寫過無數創下超過10萬點閱數的熱門文章，最高紀錄更有單篇文章破60萬點閱數。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection