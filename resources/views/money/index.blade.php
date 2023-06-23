@extends('layouts.app')
@section('title','index')

@section('content')
<div class="money-index">
  <h1>一覧ページ</h1>
    <div class="money-top">
      ￥
    <br>
      <div class="money-total">  
        @foreach ($total_prices as $total_price)
        <tr>
        <td>{{ $total_price->total_prices }}</td>
        </tr>
        @endforeach
      </div>
        <button class="btn btn-secondary" id="hyouji">切替</button>
      </div>
    <br>
  <div class="link-btn">
    <a href="{{ url('/create') }}" class="btn btn-secondary">入金</a>
    <a href="{{ url('/detail') }}" class="btn btn-secondary">履歴</a>
  </div>
</div>

<script src="js/jquery-3.7.0.min.js"></script>
<script src="{{ asset ('js/click.js') }} "></script>
@endsection