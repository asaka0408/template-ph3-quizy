<h1>設問追加</h1>
@if (count($errors)>0)
    <div>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
@endif
<form action="/home">
  <input type="hidden" name="id" value="{{$form->id}}">
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

<a href="{{ route('question_delete') }}">削除</a>

{{-- inputに予め内容が反映されるようにする --}}
