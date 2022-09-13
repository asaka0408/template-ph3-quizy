<h1>設問追加</h1>
<form action="submit">
  <p>画像のアップロード</p>
  <input type="file">
  <p>選択肢の追加<br>※正解のものにチェックを入れてください</p>
  <ul>
    @for ($i = 0; $i < 3; $i++)
    <li>
      <input type="text">
      <input type="radio">
    </li>   
    @endfor
  </ul>
</form>