@extends('layouts.master')

@section('header')
    <ul class="row">
        <li class="col-md-7 col-xs-12 logo">
            <a href="{{ URL::asset('index.html') }}" title="返回首頁"><img src="{{ URL::asset('_images/00_logo.png') }}" alt="" /></a>
        </li>
        <li class="col-md-5 col-xs-12">
            <!---------------- UserInfor ---------------->
            <div class="user-block row">
                @if(isset($_SESSION["website_login_session"]))
                <ul class="view_loging">
                    <li class="view_loginInfo col-md-6 col-xs-12">您好，<span class="member-name">{{ $_SESSION["website_login_session"]['username'] }}</span>！</li>
                    <li class="col-md-3 col-xs-12"><a href="{{ URL::asset('logout.html') }}" class="list aj_logout btn btn-normal" title="登出">登出</a></li>
                    <li class="col-md-3 col-xs-12"><a href="{{ URL::asset('member/index.html') }}" class="list aj_logout btn btn-normal" title="管理">管理</a></li>
                </ul>
                @else
                <ul class="view_notLogin">
                    <li class="col-md-9 col-xs-9">訪客 您好，歡迎來到「我的菜市埸」！</li>
                    <li class="col-md-3 col-xs-3"><a href="{{ URL::asset('login.html') }}" class="list btn btn-normal btn-login" title="登入">登入</a></li>

                </ul>
                @endif
            </div>
            <!---------------- UserInfor ---------------->

            <!---------------- MenuBar ---------------->
            <nav id="MenuBar" class="navbar navbar-inverse navbar-static-top">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand visible-xs" href="#" title="我的菜市場 MENU">我的菜市場 MENU</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                    <li><a href="{{ URL::asset('index.html') }}" title="首頁">首頁</a></li>
                    <li><a href="{{ URL::asset('food.html') }}" title="找在地好食材">找在地好食材</a></li>
                    <li><a href="{{ URL::asset('store_search.html') }}" title="安心店家">安心店家</a></li>
                    <li><a href="{{ URL::asset('schedule.html') }}" title="訊息即時通">訊息即時通</a></li>
                    </ul>
                </div>
            </nav>
            <!---------------- MenuBar ---------------->
        </li>
    </ul>
@endsection
