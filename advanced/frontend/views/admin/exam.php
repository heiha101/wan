<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>考试测试</h2>
<form action="?r=admin/examadd" method="post">
<span>单选题</span><br>
题目：<?=$bill_list['title']?><br>
<input type="radio" name="bill" value="a">A<?=$bill_list['answer1']?>  <br>
<input type="radio" name="bill" value="b">B<?=$bill_list['answer2']?>  <br>
<input type="radio" name="bill" value="c">C<?=$bill_list['answer3']?>  <br>
<input type="radio" name="bill" value="d">D<?=$bill_list['answer4']?>  <br>
<span>多选题</span><br>
题目：<?=$many_list['title']?><br>
<input type="checkbox" name="many[]" value="a">A<?=$many_list['answer1']?>  <br>
<input type="checkbox" name="many[]" value="b">B<?=$many_list['answer2']?>  <br>
<input type="checkbox" name="many[]" value="c">C<?=$many_list['answer3']?>  <br>
<input type="checkbox" name="many[]" value="d">D<?=$many_list['answer4']?>  <br>
<span>判断题</span><br>
题目：<?=$decide_list['title']?><br>
<input type="radio" name="decide" value="1">对  <br>
<input type="radio" name="decide" value="0">错  <br>
<input type="submit" value="提交试卷">
</form>
</body>
</html>