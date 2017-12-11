<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger" style="font-size: 40px">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <h3 style="margin-left: 50px"><a href="javascript: history.go(-1);">BACK</a></h3>
    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>
</div>
<script src="<?php \app\common\services\Urlservice::buildWwwUrl('/js/jquery.min.js')?>" type="text/javascript"></script>
