
    @foreach($prefectures as $prefecture)
    <p>{{$prefecture->name}}</p>
    @foreach($questions as $question)
        <a href="">{{$question->name}}</a>
    @endforeach
    <a href="">設問追加</a>
    @endforeach