  <h2>登録済み大問一覧</h2>
  @foreach ($prefectures as $prefecture)
      <a href="{{ route('question') }}">{{ $prefecture->name }}</a>
      <a href="{{ route('prefecture_edit') }}">編集</a>
      <a href="{{ route('prefecture_delete') }}">削除</a>
      <br>
  @endforeach
  <a href="{{ route('prefecture_add') }}">大問追加</a>
  <a href="{{ route('prefecture_order_change') }}">並び順変更</a>
