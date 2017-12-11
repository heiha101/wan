<?php
\app\assets\WebAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理后台</title>
    <style>
        *{
            background-image: url("<?= \app\common\services\Urlservice::buildWwwUrl('/images/web/1.jpg')?>");
            /*background-repeat: no-repeat;*/
        }
    </style>
    <?php $this->head()?>
</head>

<body class="gray-bg">
<?php $this->beginBody()?>
<div class="loginColumns animated fadeInDown">
    <div class="row">

<?= $content?>

    </div>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>