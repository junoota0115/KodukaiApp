@extends('layouts.app')
@section('title','detail')

@section('content')
<h1>履歴</h1>
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