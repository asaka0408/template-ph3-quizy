<h1>並び順変更</h1>

@foreach ($prefectures as $prefecture)
<p>{{$prefecture->id}}：{{$prefecture->name}}</p>
@endforeach

<form action="submit">
  <button>更新</button>
</form>

{{-- 更新を押したら、レコードの順番が変わるような仕様にする必要がある --}}