<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>quiz</title>
</head>
<body>
  <h1>{{ $prefecture->name }}</h1>
  <div>
    @foreach($questions as $question)
    <div>
      <h1>{{ $loop->index + 1 }}. この地名はなんて読む？</h1>
      <img src="{{$question->image}}" alt="地名画像">
      <ul>
        @foreach ($question->choices as $choice)
        <li>{{ $choice->name }}</li>   
        @endforeach
        <li>
          <span>正解！</span><br>
          <span>正解は「{{$question->name}}」です</span>
        </li>
      </ul>
    </div>
    @endforeach
  </div>



</body>
</html>