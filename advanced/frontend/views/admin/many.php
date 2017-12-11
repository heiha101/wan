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
<center>
<h2>多选题</h2>
<h3>题目</h3>
<form action="?r=admin/many" method="post">
    <input type="text" name="title">
    <h3>答案</h3>
    A:<input type="text" name="answer1"><input type="checkbox" name="check[]" value="a"><br>
    B:<input type="text" name="answer2"><input type="checkbox" name="check[]" value="b"><br>
    C:<input type="text" name="answer3"><input type="checkbox" name="check[]" value="c"><br>
    D:<input type="text" name="answer4"><input type="checkbox" name="check[]" value="d"><br>
    <input type="submit">
</form>
</center>
</body>
</html>