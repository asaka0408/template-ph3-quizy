@foreach($prefectures as $prefecture)
<a href="{{route('quiz', ['id' => $loop->iteration])}}">{{$prefecture->name}}</a>
@endforeach