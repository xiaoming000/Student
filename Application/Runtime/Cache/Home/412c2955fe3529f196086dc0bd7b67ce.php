<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>导入</title>
<style type="text/css" >
</style>
</head>
<body bgcolor="#E8F5FD">
<div style="width:500px;height:400px;margin:0px auto;boder:5px solid red;">
    <form action="/Student/index.php/Home/Fangyuan/in" method="post" enctype="multipart/form-data">
	<table>
    	<tr height="40">
        	<td width="60"><span><input type="file" name="import" style="width:300px;height:30px;font-size:18px;color:white;background-color:#A4DDA1;margin:0px;" /></span>
            <input type="hidden" name="table" value="tablename"/></td>
        </tr>
        <tr align="center">
        	<td><input type="submit" value="导入" style="width:80px;height:30px;font-size:18px;color:#444;margin:0px;" /></td>
        </tr>
	</table></form>
</div>
</body>
</html>