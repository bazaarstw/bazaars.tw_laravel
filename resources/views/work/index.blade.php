@extends('layouts.front')

@section('css')
	<link rel="stylesheet" href="{{ URL::asset('_css_2/work_search.css') }}" />
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
        <form action="" id="form-food-search" class="mSearch">
            <ul class="cols-search row">
                <li class="title col-md-2"><h3>打工地點</h3></li>
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
                    <input type="text" class="input-keywords view_workKey" size="30" />
                </li>
                <li class="action col-md-1">
                    <input type="button" class="aj_workSearch" text="搜索"  value="搜索" />
                </li>
            </ul>
        </form>

        <div class="content mDataList" id="stores-list">
            <div class="cols-header">
                <h1 class="title"><span>發現台灣在地農田打工機會</span></h1>
                <h2 class="title">共搜索 <span class="view_workCnt">{{ count($works) }}</span> 筆</h2>
            </div>
            <h3 class="cols-title">
                <ul class="item-list row">
                    <li class="items col-md-3"><span>工作名稱</span></li>
                    <li class="items col-md-2"><span>地　　點</span></li>
                    <li class="items col-md-1"><span>需求人數</span></li>
                    <li class="items col-md-2"><span>工資計算</span></li>
                    <li class="items col-md-2"><span>預計工作天數</span></li>
                    <li class="items col-md-2"><span>日　　期</span></li>
                </ul>
            </h3>
            <div class="cols-body">
                @foreach ($works as $work)
                <a href="{{ URL::route('work.show', $work->workId) }}" class="mSample">
                    <ul class="item-list row">
                        <li class="items col-md-3"><span>{{ $work->title }}</span></li>
                        <li class="items col-md-2"><span>{{ $work->city_name->cityName }}{{ $work->town_name->townName }}{{ $work->address }}</span></li>
                        <li class="items col-md-1"><span>{{ $work->workCnt }}</span></li>
                        <li class="items col-md-2"><span>{{ $work->salary }}</span></li>
                        <li class="items col-md-2"><span>{{ ( \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work->endDT)->diff( \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work->startDT) )->days ) + 1}}</span></li>
                        <li class="items col-md-2"><span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work->startDT)->format('Y-m-d H:i') }} ~ <br />{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work->endDT)->format('Y-m-d H:i') }}</span></li>
                    </ul>
                </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
