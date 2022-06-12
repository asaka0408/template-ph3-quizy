<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>quiz</title>
</head>
<body>
  <h1>{{ $quiz_title[$big_question_index] }}</h1>
  <div>
    @foreach($question_list[$big_question_index] as $question)
    <div>
      <h1>{{ $loop->index + 1 }}. この地名はなんて読む？</h1>
      <ul>
        @foreach($question as $choice)
        <li>{{ $choice }}</li>
        @endforeach
        <li>
          <span>正解！</span><br>
          <span>正解は「たかなわ」です</span>
        </li>
      </ul>
    </div>
    @endforeach
  </div>



</body>
</html>