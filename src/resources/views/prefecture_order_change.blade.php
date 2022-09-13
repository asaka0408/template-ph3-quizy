<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
<form action="/home/prefecture/order_change" method="POST">
  @csrf
    <ul class="sortable">
       @foreach($prefectures as $prefecture)
        <li id="{{ $prefecture['id'] }}">{{ $prefecture['name'] }}</li>
       @endforeach
     </ul>
    <input type="hidden" id="list-ids" name="listIds" />
    <button type="submit" id="submit">更新</button>
</form>
  
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
  'use strict'
$(function() {
  $(".sortable").sortable();
  $(".sortable").disableSelection();
  $("#submit").click(function() {
      var listIds = $(".sortable").sortable("toArray");
      $("#list-ids").val(listIds);
      $("form").submit();
  });
});

</script>
</body>
</html>

