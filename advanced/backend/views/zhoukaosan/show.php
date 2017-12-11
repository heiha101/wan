<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div align="center">
	<h2>考试</h2>
	<form action="?r=zhoukaosan/show_do" method="post">
		<table>
		<?php foreach ($dan as $key => $val) { ?>
			<input type="hidden" name="dan_id" value="<?= $val['id']?>">
			<tr>
				<th>单选<?= $val['id']?>：</th>
				<td><?= $val['timu']; ?></td>
			</tr>
			<tr>
				<th>选项：</th>
				<td>A：<?= $val['daan1']; ?></td>
			</tr>
			<tr>
				<th></th>
				<td>B：<?= $val['daan2']; ?></td>
			</tr>
			<tr>
				<th></th>
				<td>C：<?= $val['daan3']; ?></td>
			</tr>
			<tr>
				<th></th>
				<td>D：<?= $val['daan4']; ?></td>
			</tr>
			<tr>
				<th>请输入正确答案：</th>
				<td><input type="text" name="danzheng"></td>
			</tr>
		<?php } ?>
		</table>
		<br>
		<table>
		<?php foreach ($duo as $key => $val) { ?>
			<input type="hidden" name="duo_id" value="<?= $val['id']?>">
			<tr>
				<th>多选<?= $val['id']?>：</th>
				<td><?= $val['timu']; ?></td>
			</tr>
			<tr>
				<th>选项：</th>
				<td>A：<?= $val['daan1']; ?></td>
			</tr>
			<tr>
				<th></th>
				<td>B：<?= $val['daan2']; ?></td>
			</tr>
			<tr>
				<th></th>
				<td>C：<?= $val['daan3']; ?></td>
			</tr>
			<tr>
				<th></th>
				<td>D：<?= $val['daan4']; ?></td>
			</tr>
			<tr>
				<th>请输入正确答案：</th>
				<td><input type="text" name="duozheng"></td>
			</tr>
		<?php } ?>
		</table>
		<br>
		<table>
		<?php foreach ($pan as $key => $val) { ?>
			<input type="hidden" name="pan_id" value="<?= $val['id']?>">
			<tr>
				<th>判断<?= $val['id']?>：</th>
				<td><?= $val['timu']; ?></td>
			</tr>
			<tr>
				<th>选项：</th>
				<td>
					<input type="radio" name="daan" value="dui">对
					<input type="radio" name="daan" value="cuo">错
				</td>
			</tr>
		<?php } ?>
		</table>
		<br>
		<table>
			<tr>
				<th></th>
				<td><input type="submit" value="提交试卷"></td>
			</tr>
		</table>
		</form>
	</div>
</body>
</html>