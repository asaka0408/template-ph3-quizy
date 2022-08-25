  <h2>登録済み大問一覧</h2>
  @foreach ($prefectures as $prefecture)
      <a href="{{ route('question')}}">{{ $prefecture->name }}</a>
      <a href="{{ route('prefecture_edit', ['id' => $prefecture->id]) }}">編集</a>
      <a href="{{ route('prefecture_delete', ['id' => $prefecture->id]) }}">削除</a>
      <br>
  @endforeach
  <a href="{{ route('prefecture_add') }}">大問追加</a>
  <a href="{{ route('prefecture_order_change') }}">並び順変更</a>

  {{-- 全体的にパラメータを設置して、該当する都道府県の内容が表示されるように変更 --}}
