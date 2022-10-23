@foreach($prefectures as $prefecture)
<a href="{{route('quiz', ['prefecture_id' => $loop->iteration])}}">{{$prefecture->name}}</a>
@endforeach