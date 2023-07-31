@extends('layouts.app')
@section('title','index')

@section('content')

    <div class="money-main">
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

            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
            <a href="{{ url('/') }}" class="btn btn-secondary"><i class="fa-solid fa-house"></i></a>
            
        </form>
      </div>
    </div>


@endsection