<h1>大問削除</h1>

<p>以下の大問を本当に削除しますか？</p>
<form action="/home/prefecture/delete/{{$form->id}}" method="POST">
  @csrf
  <input type="hidden" name="id" value="{{$form->id}}">
  <p>{{$form->name}}</p>
  <input type="submit" value="削除">
</form>
<a href="{{route('home')}}">キャンセル</a>