<meta charset="utf8">

<style>
    table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
    table tr{ height: 40px;}
    table td{ border: 1px solid #ddd; text-align: center}

    *{margin: 0; padding:0 ; font-family: 微软雅黑}
    a{ text-decoration: none; color: #666;}

    .top{ width: 100%; text-align: center;}
    .top h2{ margin-top: 50px;}

    form{ width: 450px; margin: 0 auto; margin-top: 50px;}
    form input{
        width: 300px;
        height: 40px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding-left: 5px;
        font-size: 14px;
    }

    form p{
        margin-top: 20px;
        width: 100%;
    }

    form span{
        width: 100px;
        text-align: right;
        display: inline-block;
    }

    .a_button{
        width: 150px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        background: green;
        color: #fff;
        display: block;
        border: 1px solid green;
        border-radius: 5px;
        margin: 0 auto;
    }
</style>

<div class="right">
    <div class="search-box">
        <?= $content ?>
    </div>

