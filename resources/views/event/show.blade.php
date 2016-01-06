@extends('layouts.front')

@section('meta')
    <meta property="og:url"           content="{{ "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']  }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $event->title }}" />
    <meta property="og:description"   content="{{ str_replace('<br />', '', $event->content) }}" />
    <meta property="og:image"         content="http://bazaars.tw/_images/logo-600-500.png" />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('_css_2/active_detail.css') }}" />
@endsection

@section('content')
    <div class="content mDataList" id="active-content">
        <div class="cols-header">
            <h1 class="title">{{ $event->title }}</h1>
            <div class="fb-like" data-href="{{ "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']  }}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>
        <div class="cols-body">
            <ul class="rows">
                <li class="title col-md-3"><h2>活動時間</h2></li>
                <li class="content col-md-9"><p>{{ $event->startDT }} ~ {{ $event->endDT }}</p></li>
                <li class="hr col-md-12">&nbsp;</li>
                <li class="title col-md-3 clearfix"><h2>活動地點</h2></li>
                <li class="content col-md-9"><p>{{ $event->city_name->cityName }}{{ $event->town_name->townName }}{{ $event->address }}</p></li>
                <li class="hr col-md-12">&nbsp;</li>
                <li class="title col-md-3 clearfix"><h2>活動內容</h2></li>
                <li class="content col-md-9"><p>{!! $event->content !!}</p></li>
                <li class="hr col-md-12">&nbsp;</li>
                <li class="clearfix"></li>
            </ul>
        </div>
        <div class="cols-footer clearfix">
            <div><input type="button" class="btn btn-back" value="Back" OnClick="javascript:history.go(-1);" /></div>
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
