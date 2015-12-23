@extends('layouts.front')

@section('title')
{{ $farmer->name }} - 
@endsection

@section('meta')
    <meta property="og:url"           content="{{ "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']  }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $farmer->name }} - 我的菜市場" />
    <meta property="og:description"   content="{{ str_replace('<br />', '', $farmer->content) }}" />
    <meta property="og:image"         content="http://bazaars.tw/_images/logo-600-500.png" />
@endsection

@section('css')
	<link rel="stylesheet" href="{{ URL::asset('_css_2/farmer.css') }}" />
@endsection

@section('js')
    <script type="text/javascript">
        var farmer_id = {{ $farmer->farmerId }};
    </script>
    <script src="{{ URL::asset('_js_2/farmer.js') }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="Cols col-md-4" id="farmer-personal">
        <div class="cover"><img src="{{ ($farmer->farmerImg) ? URL::asset($farmer->farmerImg) : URL::asset('_files/farmers/farmer_default.jpg') }}" /></div>
        <h1 class="name">{{ $farmer->name }}</h1>

        <div class="atricle">
            <p>{!! $farmer->content !!}</p>
        </div>

        <hr>

        <div class="addrs"><p class="subtitle">聯絡地址</p>{{{ $farmer->city ? $farmer->city_name->cityName : '' }}}{{{ $farmer->town ? $farmer->town_name->townName : '' }}}{{ $farmer->address }}</div>
        <div class="phone"><p class="subtitle">聯絡電話</p>
            <ul>
                @foreach ($farmer->meta as $meta)
                    @if ($meta->descKey == 'phone')
                        <li>{{ $meta->descValue }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="email"><p class="subtitle">聯絡信箱</p>
            <ul>
                @foreach ($farmer->meta as $meta)
                    @if ($meta->descKey == 'email')
                        <li>{{ $meta->descValue }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="link"><p class="subtitle">網頁連結</p>
            <ul>
                @foreach ($farmer->meta as $meta)
                    @if ($meta->descKey == 'link')
                        <li><a href="{{ $meta->descValue }}" target="_blank">{{ $meta->descContent }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>

        <hr>

        <div class="fb-like" data-href="{{ "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']  }}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
    </div>

    <div class="Cols col-md-8" id="farmer-information">
        <h2 class="title">本農提供之食材</h2>
        <ul class="list-offerfoods">
            <li class="items btn"><span class="view_itemName">---</span></li>
        </ul>

        <h2 class="title">選用本農食材之合作店家</h2>
        <ul class="link-stores">
            <li class="items col-md-3">
                <a href="#">
                    <img src="#" width="100" title="合作店家" />
                    <p class="store-name">---</p>
                </a>
            </li>
        </ul>

        <h2 class="title" style="clear: both;">詳細介紹</h2>
        <div class="detail">{!! $farmer->detail !!}</div>
    </div>
</div>
@endsection

@section('body_js')
<!-- Facebook Like Button JavaScript SDK  -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.5&appId=1420890011572510";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Facebook Like Button JavaScript SDK  -->
@endsection
