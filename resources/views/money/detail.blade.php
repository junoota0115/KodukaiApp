@extends('layouts.app')
@section('title','detail')

@section('content')
<div class="money-main">
<h1>履歴</h1>

<div class="money-log-main">
    <div class="money-log">
        <table>
            <th>入金日/入金時間</th>
            <th>｜金額</th>
            <th>｜コメント</th>
        </table>
        @foreach($money_logs as $money_log)
        <table>
        <div class="money-log">
            <td>{{$money_log->created_at}}</td>
            <td>{{$money_log->price}}円</td>
            <td>{{$money_log->comment}}</td>
        </div>
    </table>
        @endforeach


        <a href="{{ url('/create') }}" class="btn btn-secondary"><i class="fa-solid fa-money-bill-transfer"></i>入金</a>
        <a href="{{ url('/') }}" class="btn btn-secondary"><i class="fa-solid fa-house"></i>戻る</a>

</div>
@endsection