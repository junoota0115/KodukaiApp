@extends('layouts.app')
@section('title','detail')

@section('content')
<div class="dream-main">
<h1>夢の詳細</h1>

<div class="doream-log-main">
    <div class="dream-top">
        
      <br>
        <div class="dream-total">  
          @foreach ($dream_total_prices as $dream_total_price)
          <tr>
          <td>目標合計金額  ￥{{ $dream_total_price->dream_total_prices }}</td>
          </tr>
          @endforeach
        </div>
    <div class="dream-log">
        <table>
            <th>｜金額</th>
            <th>｜コメント</th>
        </table>
        @foreach($dream_logs as $dream_log)
        <table>
        <div class="dream-log">
            <td>{{$dream_log->dream_price}}円</td>
            <td>{{$dream_log->comment}}</td>
            @auth
            <form clas="id">
            <td><button class="btn" id="delete" dream_id="{{$dream_log->id}}">削除</button>
            </form>
            </td>
            @endauth
        </div>
    </table>
        @endforeach


        <a href="{{ url('/dreamCreate') }}" class="btn btn-secondary"><i class="fa-solid fa-money-bill-transfer"></i>目標追加</a>
        <a href="{{ url('/index') }}" class="btn btn-secondary"><i class="fa-solid fa-house"></i>戻る</a>

</div>
<script src="js/jquery-3.7.0.min.js"></script>
<script src="{{ asset ('js/delete.js') }} "></script>
@endsection