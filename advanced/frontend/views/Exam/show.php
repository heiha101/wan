<!DOCTYPE html>
<html><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <meta name="Generator" content="EditPlus">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">

    <link rel="stylesheet" href="assets/八维考试系统_files/time.css">
</head>

<body style="background:#f9f9f9">
<style type="text/css">
    .gallery img{
        margin:5px;
        padding:5px;
        width:75px;
        border:solid 1px black;
        -webkit-transform:all 1s;
        -moz-transform: all 1s;
        -o-transform: all 1s;
        background:white;
        /*border-radius:300px;*/
    }
    .gallery img:hover{
        -webkit-transform: scale(4.2)rotate(0deg);
        -moz-transform: scale(4.2)rotate(0deg);
        -o-transform: scale(4.2)rotate(0deg);
    }
    /**

    */
    .slick{
        color:white;
        font-weight:bold;
        padding:10px;
        border:solid 1px black;
        background:lightgreen;
        cursor:pointer;
        -webkit-transform:all 1s;
        -moz-transform: all 1s;
        -o-transform: all 1s;
        border-radius:30px;
    }
    .slick:hover{
        color:black;
        background:yellow;
        -webkit-transform:rotate(20deg);
        -moz-transform:rotate(20deg);
        -o-transform:rotate(20deg);
        -webkit-transform:scale(2.5) scalex(10px) skew(10deg);
        -moz-transform:scale(2.5) scalex(10px) skew(10deg);
        -o-transform:scale(2.5) scalex(10px) skew(10deg);

    }

</style>
<div class="item">

    <!--倒计时模块-->
    <div class="time-item">
    </div>
</div>
<div>
    <form method="post" action="?r=exam/answer">
<!--        <input type="hidden" value="--><?php //echo $id;?><!--" name="id"/>-->
        <div>
            <h3>单选题：<span style="font-size:16px;"></span></h3>
            <?php $i=1;?>
            <?php foreach($dan as $k1=>$v1) { ?>
                <p style="margin-left:40px;">
                </p><pre><p style="font-size: large"><?php echo $i."、"; echo $v1['title']?></p></pre>

                <p></p>
                <p style="margin-left:70px;"><input type="radio" name="<?php echo 'dan'.$v1['id']?>" value="A">A &nbsp;<?php echo $v1['A']?></p><p style="margin-left:70px;"><input type="radio" name="<?php echo 'dan'.$v1['id']?>" value="B">B &nbsp;<?php echo $v1['B']?></p>
                <p style="margin-left:70px;"><input type="radio" name="<?php echo 'dan'.$v1['id']?>" value="C">C &nbsp;<?php echo $v1['C']?></p>						<p style="margin-left:70px;"><input type="radio" name="<?php echo 'dan'.$v1['id']?>" value="D">D &nbsp;<?php echo $v1['D']?></p><p style="margin-left:40px;">
                </p>
                <?php $i++;?>
            <?php }?>
        </div>
          <div>
                  <h3>多选题：<span style="font-size:16px;"></span></h3>
              <?php $j=1;?>
              <?php foreach($duo as $k2=>$v2) { ?>
                  <p style="margin-left:40px;">
                  </p><pre><?php echo $j."、"; echo $v2['title']?></pre>
              <p></p>
                  <p style="margin-left:70px;"><input type="checkbox" name="<?php echo 'duo'.$v2['id']?>[]" value="A">A &nbsp;<?php echo $v2['A']?></p><p style="margin-left:70px;"><input type="checkbox" name="<?php echo 'duo'.$v2['id']?>[]" value="B">B &nbsp;<?php echo $v2['B']?></p>
                  <p style="margin-left:70px;"><input type="checkbox" name="<?php echo 'duo'.$v2['id']?>[]" value="C">C &nbsp;<?php echo $v2['C']?></p>						<p style="margin-left:70px;"><input type="checkbox" name="<?php echo 'duo'.$v2['id']?>[]" value="D">D &nbsp;<?php echo $v2['D']?></p><p style="margin-left:40px;">
                  </
                  <?php $j++;?>
              <?php }?>
          </div>
        <div>
               <h3>判断题：<span style="font-size:16px;"></span></h3>
            <?php $k=1;?>
            <?php foreach($pan as $k3=>$v3) { ?>
                <p style="margin-left:40px;"></p><pre><?php echo $k."、"; echo $v3['title']?></pre>
                <p></p>
                <div style="margin:0px 0px 0 130px;">
                </div>

                <p style="margin-left:70px;"><input type="radio" name="<?php echo 'pan'.$v3['id']?>" value="对">√</p>
                <p style="margin-left:70px;"><input type="radio" name="<?php echo 'pan'.$v3['id']?>" value="错">×</p>
                <?php $k++;?>
            <?php }?>
            </div>
    </form>

    <input type="submit" value="提交试卷"/>

    </body></html>