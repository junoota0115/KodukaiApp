@extends('layouts.app')
@section('title','index')

@section('content')
<div class="container">
    <div class="row">
        <h1>登録フォーム</h1>
        <div class="create-form">
        <form action="{{route('exeCreate')}}" method="post" >
            @csrf

            <div class="form-group">
                <label for="price">金額を入力</label>
                <input type="integer" class="form-control" id="price" name="price" placeholder="Price">
            </div>
            <div class="form-group">
                <label for="comment">入金理由</label>
                <textarea class="form-control"  id="comment" name="comment" placeholder="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">送信</button>
            <a href="{{ url('/index') }}" class="btn btn-secondary">戻る</a>
        </form>
    </div>

@endsection