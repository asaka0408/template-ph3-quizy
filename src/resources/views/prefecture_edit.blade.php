<h1>大問編集</h1>
@if (count($errors)>0)
    <div>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
@endif
<form action="/home/prefecture/edit/{{$prefecture->prefecture_id}}" method="POST">
  @csrf
  <input type="hidden" name="prefecture_id" value="{{$prefecture->prefecture_id}}">
  <input type="text" name="name" value="{{$prefecture->name}}">
  {{-- 既存の登録内容がinputタグに入っている状態にしたい --}}
  <input type="submit" value="更新">
</form>