@extends('layouts.app')

@section('content')
    <h2>登録済み大問一覧</h2>
    @foreach($prefectures as $prefecture)
      <p>{{$prefecture->name}}</p>
    @endforeach
    <a href="">大問追加</a>
    <a href="">大問編集</a>
    <a href="">大問削除</a>

    @foreach($prefectures as $prefecture)
    <p>{{$prefecture->name}}</p>
    @foreach($questions as $question)
        <a href="">{{$question->name}}</a>
    @endforeach
    <a href="">設問追加</a>
    @endforeach

@endsection
