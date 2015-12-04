@extends('layouts.front')

@section('meta')
    <meta property="og:url"           content="{{ "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']  }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $work->title }}" />
    <meta property="og:description"   content="{{ $work->memo }}" />
    <meta property="og:image"         content="http://bazaars.tw/_images/00_logo.png" />
@endsection

@section('css')
	<link rel="stylesheet" href="{{ URL::asset('_css_2/workdetail.css') }}" />
@endsection

@section('js')
    <script type="text/javascript">
        var work_id = {{ $work->workId }};
    </script>
    <script src="{{ URL::asset('_js_2/workdetail.js') }}"></script>
@endsection

@section('content')
    <div class="content mDataList">
        <div class="cols-header">
            <div class="cover"><img src="{{ URL::asset('_files/farmers/farmer_default.jpg') }}" width="100" class="view_memberPhoto" /></div>
            <h1 class="name view_memberName">{{ $work->user->username }} <span>發佈</span></h1>
            <div class="fb-like" data-href="{{ "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']  }}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>
        <div class="cols-body">
            <ul class="work-content rows">
                <li class="title col-md-3"><h2>打工標題</h2></li>
                <li class="content"><span>{{ $work->title }}</span></li>
                <li class="hr col-md-12">&nbsp;</li>

                <li class="title col-md-3"><h2>工作時間</h2></li>
                <li class="content col-md-9"><span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work->startDT)->format('Y-m-d H:i') }} ~ {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work->endDT)->format('Y-m-d H:i') }}</span></li>
                <li class="hr col-md-12">&nbsp;</li>

                <li class="title col-md-3"><h2>預計工作天數</h2></li>
                <li class="content col-md-9"><span>{{ ( \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work->endDT)->diff( \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work->startDT) )->days ) + 1}}</span></li>
                <li class="hr col-md-12">&nbsp;</li>

                <li class="title col-md-3"><h2>需求人數</h2></li>
                <li class="content col-md-9"><div>{{ $work->workCnt }}</div></li>
                <li class="hr col-md-12">&nbsp;</li>

                <li class="title col-md-3"><h2>工作地點</h2></li>
                <li class="content col-md-9"><div>{{ $work->city_name->cityName }}{{ $work->town_name->townName }}{{ $work->address }}</div></li>
                <li class="hr col-md-12">&nbsp;</li>

                <li class="title col-md-3"><h2>其他備註</h2></li>
                <li class="content col-md-9"><div>{!! $work->memo !!}</div></li>
                <li class="hr col-md-12">&nbsp;</li>

                <li class="title col-md-3"><h2>打工報名</h2></li>
                <li class="content col-md-9">
                    <form action="" id="work-register" class="form_workSign">
                        @if(isset($_SESSION['website_login_session']['memberId']))
                            @if($isOwner)
                                @if($work->attendees->count() > 0)
                                    @foreach($work->attendees as $attendee)
                                        姓名： {{ $attendee->name }}<br/>
                                        電話： {{ $attendee->phone }}<br/>
                                        -----------------------------<br>
                                    @endforeach
                                @else
                                    <span>尚無報名資料</span>
                                @endif
                            @elseif($isSigned)
                                <input type='hidden' name='act' value='work_signCancel'/>
                                <input type='hidden' name='workId' value='{{ $work->workId }}'/>
                                <div class="action"><input type="button" text="取消報名"  value="取消報名" class="aj_workSignCancel" /></div>
                            @else
                                <div class="name"><span>報名姓名</span><input name="farmer-name" type="text" value="{{ $_SESSION["website_login_session"]['username'] }}" /></div>
                                <div class="phone"><span>聯絡電話</span><input name="farmer-phone" type="text" value="{{ $_SESSION["website_login_session"]['phone'] }}" /></div>
                                <div class="action">
                                    <input type='hidden' name='act' value='work_signUp'/>
                                    <input type='hidden' name='workId' value='{{ $work->workId }}'/>
                                    <input type="button" text="報名確認"  value="報名確認" class="aj_workSignUp" />
                                    <input type="button" text="清除重填"  value="清除重填" class="aj_workSignClear" />
                                </div>
                            @endif
                        @else
                            <span>請先登入以報名</span>
                        @endif
                    </form>
                </li>
                <li class="hr clearfix">&nbsp;</li>
            </ul>
        </div>
        <div class="cols-footer clearfix">
            <div><input type="button" class="btn btn-back" value="Back" OnClick="javascript:history.go(-1);" /></div>
        </div>
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
