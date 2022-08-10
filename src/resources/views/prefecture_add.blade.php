<h1>大問追加</h1>
@if (count($errors)>0)
    <div>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
@endif
<form action="/home/prefecture/add" method="POST">
  @csrf
  <input type="text" name="name" value="{{old('name')}}">
  <input type="submit" value="追加">
</form>

<p>{{$msg}}</p>
