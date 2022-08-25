<h1>大問削除</h1>

<p>以下の大問を本当に削除しますか？</p>
<form action="/home/prefecture/delete/{{$prefecture->id}}" method="POST">
  {{-- ここを変えるとパラメーターがうまく行かなくてエラーになっちゃうから保留 --}}
  @csrf
  <input type="hidden" name="id" value="{{$prefecture->id}}">
  <p>{{$prefecture->name}}</p>
  <input type="submit" value="削除">
</form>
<a href="{{route('home')}}">キャンセル</a>