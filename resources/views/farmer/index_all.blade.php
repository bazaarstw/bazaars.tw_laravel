@extends('layouts.front')

@section('css')
	<link rel="stylesheet" href="{{ URL::asset('_css_2/food_class_farmers.css') }}" />
@endsection

@section('content')
<div class="Col">
    <div class="content mDataList" id="stores-list">

        <h3 class="cols-title hidden-xs">
            <ul class="item-list row">
                <li class="items col-md-3"><span>農友姓名</span></li>
                <li class="items col-md-3"><span>所在縣市</span></li>
            </ul>
        </h3>

        <div class="cols-body">
            @foreach ($farmers as $farmer)
            <a href="{{ URL::route('farmer.show', $farmer->farmerId) }}" class="mSample">
                <ul class="item-list row">
                    <li class="items col-md-3"><span>{{ $farmer->name }}</span></li>
                    <li class="items col-md-3"><span>{{ $farmer->city_name ? $farmer->city_name->cityName : '' }}</span></li>
                </ul>
            </a>
            @endforeach
        </div>

    </div>
</div>
@endsection
