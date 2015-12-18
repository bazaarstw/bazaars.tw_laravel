@extends('layouts.front')

@section('title')
店家列表 - 
@endsection

@section('css')
	<link rel="stylesheet" href="{{ URL::asset('_css_2/store_search.css') }}" />
@endsection

@section('content')
<div class="Col">
    <div class="content mDataList" id="stores-list">

        <h3 class="cols-title hidden-xs">
            <ul class="item-list row">
                <li class="items col-md-3"><span>商店名稱</span></li>
                <li class="items col-md-3"><span>所在縣市</span></li>
            </ul>
        </h3>

        <div class="cols-body">
            @foreach ($stores as $store)
            <a href="{{ URL::route('store.show', $store->storeId) }}" class="mSample">
                <ul class="item-list row">
                    <li class="items col-md-3"><span>{{ $store->storeName }}</span></li>
                    <li class="items col-md-3"><span>{{ $store->city_name ? $store->city_name->cityName : '' }}</span></li>
                </ul>
            </a>
            @endforeach
        </div>

    </div>
</div>
@endsection
