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
<form action="/home/prefecture/edit/{{$form->id}}" method="POST">
  @csrf
  <input type="hidden" name="id" value="{{$form->id}}">
  <input type="text" name="name" value="{{$form->name}}">
  {{-- 既存の登録内容がinputタグに入っている状態にしたい --}}
  <input type="submit" value="更新">
</form>