@extends('layouts.front')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('_css_2/active_list.css') }}" />
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $.aj_listCity();
        });
    </script>
@endsection

@section('content')
    <div class="Cols">
        <form action="" id="form-active-search" class="mSearch">
            <ul class="cols-search row">
                <li class="title col-md-2"><h3>活動地點</h3></li>
                <li class="content col-md-3">
                    <select class="view_citySelectList">
                        <option value="">全部</option>
                    </select>
                    <select class="view_townSelectList">
                        <option value="" selected="selected">全部</option>
                    </select>
                </li>
                <li class="title col-md-2"><h3>關鍵字搜索</h3></li>
                <li class="content col-md-4">
                    <input type="text" class="input-keywords view_newsKey" size="30" />
                </li>
                <li class="action col-md-1">
                    <input type="button" class="aj_newsSearch" text="搜索"  value="搜索" />
                </li>
            </ul>
        </form>

        <div class="content mDataList" id="actives-list">

            <div class="cols-header">
                <h1 class="title"><span>活動報報</span></h1>
                <h2 class="title">共搜索 <span class="view_newsCnt">{{ count($events) }}</span> 筆</h2>
            </div>

            <h3 class="cols-title">
                <ul class="item-list row">
                <li class="items col-md-4"><span>活動名稱</span></li>
                <li class="items col-md-3"><span>地　　點</span></li>
                <li class="items col-md-2"><span>有效日期</span></li>
                <li class="items col-md-2"><span>發佈日期</span></li>
                <li class="items col-md-1"><span>詳細資訊</span></li>
                </ul>
            </h3>

            <div class="cols-body">
                @foreach ($events as $event)
                <a href="{{ URL::route('event.show', $event->newsId) }}" class="mSample">
                    <ul class="item-list row">
                        <li class="items col-md-4"><span>{{ $event->title }}</span></li>
                        <li class="items col-md-3"><span>{{ $event->city_name->cityName }}{{ $event->town_name->townName }}{{ $event->address }}</span></li>
                        <li class="items col-md-2"><span>{{ $event->startDT }} ~ {{ $event->endDT }}</li>
                        <li class="items col-md-2"><span>{{ $event->createDT }}</span></li>
                        <li class="items col-md-1"><span class="fa fa-search"></span></li>
                    </ul>
                </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
