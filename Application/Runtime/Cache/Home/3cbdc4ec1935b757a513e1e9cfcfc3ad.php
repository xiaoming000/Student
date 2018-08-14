<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>账号查询结果</title>

<style type="text/css">

div{height:150px;}
body{background-color:#e9f7fc;}
table{border:0px solid #B4DAF0 ;margin:0px auto;}
th{width:60px;height:35px;text-align:center;}
td{width:200px;height:35px;text-align:center;}	

</style>
</head>
<div></div>
<table border="1" cellpadding="0" cellspacing="0"><br>
<tr>
	<th width="60" height="35" align="center" bgcolor="b5d6e6">账号</th>
    <td width="200" align="center"><?php echo ($list["number"]); ?></td>	
</tr>
<tr>
	<th bgcolor="b5d6e6">姓名</th>
    <td><?php echo ($list["name"]); ?></td>	
</tr>
<tr>
	<th bgcolor="b5d6e6">密码</th>
    <td><?php echo ($list["password"]); ?></td>	
</tr>
<tr>
	<th bgcolor="b5d6e6">权限</th>
    <td><?php echo ($list["power"]); ?></td>	
</tr>
</table>
    <p align="center">
        <input type="button" name="reset" style="width:80px;height:30px;font-size:18px;" onclick="history.go(-1)" value="返回"/> 
	</p>
<body>
</body>
</html>