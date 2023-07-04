@extends('layouts.app')
@section('title','index')

@section('content')

    <div class="dream-main">
        <h1>夢の作成画面</h1>
      <div class="create-form">
        <form action="{{route('dreamUplode')}}" method="post" >
            @csrf

            <div class="form-group">
                <label for="dream_price">目標金額を入力</label>
                <input type="integer" class="form-control" id="dream_price" name="dream_price" placeholder="目標金額">
            </div>
            <div class="form-group">
                <label for="comment">理由</label>
                <textarea class="form-control"  id="comment" name="comment" placeholder="コメント"></textarea>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
            <a href="{{ url('/index') }}" class="btn btn-secondary"><i class="fa-solid fa-house"></i></a>
            
        </form>
      </div>
    </div>


@endsection