@extends('layouts.front')

@section('title')
{{ $store->storeName }} - 
@endsection

@section('meta')
    <meta property="og:url"           content="{{ "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']  }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $store->storeName }} - 我的菜市場" />
    <meta property="og:description"   content="{{ $store->content }}" />
    <meta property="og:image"         content="http://bazaars.tw/_images/logo-600-500.png" />
@endsection

@section('css')
	<link rel="stylesheet" href="{{ URL::asset('_css_2/store_detail.css') }}" />
@endsection

@section('js')
    <script type="text/javascript">
        var store_id = {{ $store->storeId }};
    </script>
    <script src="{{ URL::asset('_js_2/storedetail.js') }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="Cols  col-md-4" id="store-personal">
        <div class="cover"><img src="{{ ($store->storeImg) ? URL::asset($store->storeImg) : URL::asset('_files/stores/logo_00.jpg') }}" width="100" /></div>
        <h1 class="name">{{ $store->storeName }}</h1>

        <div class="atricle">
            <p>{!! $store->content !!}<p>
        </div>

        <hr>

        <div class="addrs"><p class="subtitle">聯絡地址</p>{{{ $store->city ? $store->city_name->cityName : '' }}}{{{ $store->town ? $store->town_name->townName : '' }}}{{ $store->address }}</div>
        <div class="phone"><p class="subtitle">聯絡電話</p>
            <ul>
                @foreach ($store->meta as $meta)
                    @if ($meta->descKey == 'phone')
                        <li>{{ $meta->descValue }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="email"><p class="subtitle">聯絡信箱</p>
            <ul>
                @foreach ($store->meta as $meta)
                    @if ($meta->descKey == 'email')
                        <li>{{ $meta->descValue }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="link"><p class="subtitle">網頁連結</p>
            <ul>
                @foreach ($store->meta as $meta)
                    @if ($meta->descKey == 'link')
                        <li><a href="{{ $meta->descValue }}" target="_blank">{{ $meta->descContent }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>

        <hr>

        <div class="fb-like" data-href="{{ "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']  }}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
    </div>

    <div class="Cols col-md-8" id="cooperation-farmers">
        <h2 class="title">與本店合作的在地農夫</h2>
        <ul class="link-farmers row">
            <li class="items col-md-3"><a href="farmer.html"><img src="{{ URL::asset('_files/farmers/farmer_default.jpg') }}" title="農夫" /><p class="farmer-name">---</p></a></li>
        </ul>

        <h2 class="title" style="clear: both;">詳細介紹</h2>
        <div class="detail">{!! $store->detail !!}</div>
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
