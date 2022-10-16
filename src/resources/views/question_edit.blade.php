<h1>設問編集</h1>
@if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1></h1>
<form action="/home/question_edit/{{$prefecture->id}}/{{$question->id}}" method="POST">
    @csrf
    <input type="hidden" name="prefecture_id" value="{{ $prefecture->id }}">
    <input type="hidden" name="question_id" value="{{ $question->id }}">
    <p>選択肢の編集<br>※正解のものにチェックを入れてください</p>
    <ul>
        @foreach($choices as $index => $choice)
            <li>
                <input type="text" name="choice_name[]" value="{{$choice->name}}">
                {{-- <input type="radio" name="valid{{$index}}"> --}}
            </li>
        @endforeach
    </ul>
    <input type="submit" value="更新">
</form>
{{$question->name}}

<a href="{{ route('question_delete') }}">削除</a>

{{-- inputに予め内容が反映されるようにする --}}
