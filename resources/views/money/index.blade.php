@extends('layouts.app')
@section('title','index')

@section('content')
<h1>一覧ページ</h1>
<div class="money-top">
ここに合計金額を入れる<br>
100000円
</div>
<br>
<div class="money-log">
    @foreach($money_logs as $money_log)
    <div class="money-log">
    {{$money_log->created_at}}
    {{$money_log->price}}円
    {{$money_log->comment}}
    </div>
    @endforeach
</div>

<a href="{{ url('/create') }}" class="btn btn-secondary">入金</a>
@endsection