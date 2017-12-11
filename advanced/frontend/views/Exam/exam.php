<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<script src="assets/js/jquery.min.js"></script>
<body>
    <center>
<!--        单选-->
        <form action="?r=exam/insert" method="post">
        <table class="table">
        <tr>
            <td><h3>添加新题</h3></td>
        </tr>
        <tr>
            <td>题目</td>
            <td><input type="text" placeholder="请输入题目" name="dan_title"/></td>
        </tr>
         <tr>
             <td>答案</td>
             <td>A<input type="text" name="dan_a"/>&nbsp;&nbsp;<input type="checkbox" value="A" name="dan_answer" class="dan"/></td>
         </tr>
        <tr>
            <td></td>
            <td>B<input type="text" name="dan_b"/>&nbsp;&nbsp;<input type="checkbox" value="B" name="dan_answer" class="dan"/></td>
        </tr>
        <tr>
            <td></td>
            <td>C<input type="text" name="dan_c"/>&nbsp;&nbsp;<input type="checkbox" value="C" name="dan_answer" class="dan"/></td>
        </tr>
        <tr>
            <td></td>
            <td>D<input type="text" name="dan_d"/>&nbsp;&nbsp;<input type="checkbox" value="D" name="dan_answer" class="dan"/></td>
        </tr>
        </table>
        <table class="table">
            <tr>
               <!--  <td><input type="text" value="多选题" readonly style="width: 80px"/></td> -->
                <td><h3>添加新题</h3></td>
            </tr>
            <tr>
                <td>题目</td>
                <td><input type="text" placeholder="请输入题目" name="duo_title"/></td>
            </tr>
            <tr>
                <td>答案</td>
                <td>A<input type="text" name="duo_a"/>&nbsp;&nbsp;<input type="checkbox" value="A" class="duo" name="duo_answer[]"/></td>
            </tr>
            <tr>
                <td></td>
                <td>B<input type="text" name="duo_b"/>&nbsp;&nbsp;<input type="checkbox" value="B" class="duo" name="duo_answer[]"/></td>
            </tr>
            <tr>
                <td></td>
                <td>C<input type="text" name="duo_c"/>&nbsp;&nbsp;<input type="checkbox" value="C" class="duo" name="duo_answer[]"/></td>
            </tr>
            <tr>
                <td></td>
                <td>D<input type="text" name="duo_d"/>&nbsp;&nbsp;<input type="checkbox" value="D" class="duo" name="duo_answer[]"/></td>
            </tr>
        </table>
        <table class="table">
            <tr>
               <!--  <td><input type="text" value="判断题" readonly style="width: 80px"/></td> -->
                <td><h3>添加新题</h3></td>
            </tr>
            <tr>
                <td>题目</td>
                <td><input type="text" placeholder="请输入题目" name="pan_title"/></td>
            </tr>
            <tr>
                <td>答案</td>
                <td>对&nbsp;<input type="radio" name="pan_answer" value="对"/>&nbsp;&nbsp;错&nbsp;<input type="radio" name="pan_answer" value="错"/></td>
            </tr>

        </table>
            <input type="submit" value="提交" id="insert"/>
        </form>
    </center>

</body>
</html>
<script>
    $(function(){
        $("#insert").click(function(){
            var num=$("input[class='dan']:checked").length;
            var num_duo=$("input[class='duo']:checked").length;
            if(num>1)
            {
                alert("单选题只可有一个答案");
                return false;
            }
            if(num<1)
            {
                alert("单选题必须有一个答案");
                return false;
            }
            if(num_duo<2)
            {
                alert("多选题值必须有两个以上答案");
                return false;
            }
        })
    })
</script>