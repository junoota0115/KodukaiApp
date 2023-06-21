@extends('layouts.app')
@section('title','index')

@section('content')
<h1>一覧ページ</h1>

<div class="money-top">
    Total
<br>
@foreach ($total_prices as $total_price)
    <tr>
      <td>{{ $total_price->total_prices }}円</td>
    </tr>
    @endforeach
</div>
<br>
<div class="link-btn">
<a href="{{ url('/create') }}" class="btn btn-secondary">入金</a>
<a href="{{ url('/detail') }}" class="btn btn-secondary">履歴</a>
</div>
@endsection