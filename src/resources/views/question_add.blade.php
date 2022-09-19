<h1>設問追加</h1>
<form enctype="multipart/form-data" action="{{$prefecture_id}}" method="POST">
  @csrf
  <p>画像のアップロード</p>
  <input name="image" type="file" accept="image/*">
  <p>{{ $prefecture_id }}</p>
  {{-- <p>選択肢の追加<br>※正解のものにチェックを入れてください</p>
  <ul>
    @for ($i = 0; $i < 3; $i++)
    <li>
      <input type="text">
      <input type="radio">
    </li>   
    @endfor
  </ul> --}}
  <input type="submit" value="追加">
</form>