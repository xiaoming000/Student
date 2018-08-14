<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>添加</title>
  <style>
  body{font-size:15px;background:#e9f7fc;}
  table{width:450px;height:200px;margin:100px 350px;padding:25px 0 0 0;}
  tr,td,input{border:none;}
  input{outline:none;background:#dddddd;}
  .sub{
		height:30px;width:100px;font-size:20px;cursor:pointer;margin:0  0 0 30px;
		background:#dddddd;border-radius:15px;
	  }
  </style>
 </head>
 <body>
  <form action="/Student/index.php/Home/Subsidy/add" method="POST" name="add">
    <table >
		<tr >
			<td align="right" width="100" height="20px">学号*</td>
			<td align="left">
				<input type="text" name="stuid" value="<?php echo ($sub["stuid"]); ?>"/>
				<span style="color:red;"><?php echo ($info['stuid']?$info['stuid']:""); ?></span>
			</td>
		</tr>
		<tr>
			<td align="right">资助类型*</td>
			<td align="left">
				<input type="text" name="type" value="<?php echo ($sub["type"]); ?>"/>
				<span style="color:red;"><?php echo ($info['type']?$info['type']:""); ?></span>
			</td>
		</tr>
		<tr>
			<td align="right">资助金额*</td>
			<td align="left">
				<input type="text" name="money" value="<?php echo ($sub["money"]); ?>"/>
				<span style="color:red;"><?php echo ($info['money']?$info['money']:""); ?></span>
			</td>
		</tr>
		<tr>
			<td align="right">资助时间*</td>
			<td align="left">
				<input type="text" name="time" value="<?php echo ($sub["time"]); ?>"/>
				<span style="color:red;"><?php echo ($info['time']?$info['time']:""); ?></span>
			</td>
		</tr>
		<tr  >
			<td colspan="2">
				<input type="submit" class="sub" value="提交"/>
				<input type="reset" class="sub" value="重置"/>
			</td>
		</tr>
    </table>
  </form>
 </body>
</html>