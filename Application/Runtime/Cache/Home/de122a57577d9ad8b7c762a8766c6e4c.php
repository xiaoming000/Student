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
  <form action="/Student/index.php/Home/Pinkunshengku/add" method="POST" name="add">
    <table background="#8EE5EE">
		<tr>
			<td align="right" width="100" height="20px">学号*</td>
			<td>
				<input type="text" name="stuid" value="<?php echo ($pin["stuid"]); ?>"/>
				<span style="color:red;"><?php echo ($info['stuid']?$info['stuid']:""); ?></span>
			</td>
			
		</tr>
		<tr>
			<td align="right">认定等次*</td>
			<td align="left">
				<input type="text" name="grade" value="<?php echo ($pin["grade"]); ?>"/>
				<span style="color:red;"><?php echo ($info['grade']?$info['grade']:""); ?></span>
			</td>
		</tr>
		<tr>
			<td align="right">在库状态*</td>
			<td align="left">
				<input type="text" name="state" value="<?php echo ($pin["state"]); ?>"/>
				<span style="color:red;"><?php echo ($info['state']?$info['state']:""); ?></span>
			</td>
		</tr>
		<tr>
			<td align="right">入库时间*</td>
			<td align="left">
				<input type="text" name="in_time" value="<?php echo ($pin["in_time"]); ?>"/>
				<span style="color:red;"><?php echo ($info['in_time']?$info['in_time']:""); ?></span>
			</td>
		</tr>
		<tr>
			<td align="right">出库时间</td>
			<td align="left"><input type="text" name="out_time" value="<?php echo ($pin["out_time"]); ?>"/></td>
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