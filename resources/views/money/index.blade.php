@extends('layouts.app')
@section('title','index')

@section('content')
<div class="money-main">

  <div class="user-name">{{ Auth::user()->name }}さんのページ</div>
  <div class="main-img">
      <img id="img" src="{{asset('images/main.png')}}">
    </div>

    <div class="money-top">
      ￥
      <div class="money-total">  
        @foreach ($total_prices as $total_price)
        <tr>
         <td>{{ $total_price->total_prices }}</td>
        </tr>
        @endforeach
      </div>
      <button class="btn " id="hyouji"><i class="fa-solid fa-eye"></i></button>
    </div>

      <div class="link-btn">
        <a href="{{ url('/create') }}" class="btn btn-secondary"><i class="fa-solid fa-money-bill-transfer"></i>入金</a>
        <a href="{{ url('/detail') }}" class="btn btn-secondary"><i class="fa-solid fa-landmark"></i>履歴</a>
        <a href="{{ url('/dreamCreate') }}" class="btn btn-secondary"><i class="fa-solid fa-money-bill-transfer"></i>目標登録 </a>
        <a href="{{ url('/dreamDetail') }}" class="btn btn-secondary">目標 </a>
      </div>
</div>

<script src="js/jquery-3.7.0.min.js"></script>
<script src="{{ asset ('js/click.js') }} "></script>

@endsection
