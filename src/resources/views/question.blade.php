<p>{{ $prefecture->name }}</p>
@foreach ($questions as $question)
    <a href="{{ route('question_edit') }}">{{ $question->name }}</a>
@endforeach
<br>
<a href="{{route('question_add')}}">設問追加</a>
