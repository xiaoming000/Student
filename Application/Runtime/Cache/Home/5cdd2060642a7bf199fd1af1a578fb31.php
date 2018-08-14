<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
<title>添加学生基本信息</title>
<link href="<?php echo CSS_URL ?>function.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo JS_URL ?>function.js"></script>
<style>
div{width:1001px;margin:100px auto;}
table {border-collapse:collapse;  }
input{width:97%;height:35px;border:0px;padding-left:5px;}
select{height:35px;width:90%;border:0px;}
</style>
</head>
<body >
<div class="main" align="center">
<form action="/Student/index.php/Home/Banji/add" method="post">
<table width="500" border="1" cellspacing="0" cellpadding="0" bgcolor="b5d6e6">
  <tr align="center" >
      <td width="15%" height="35">班级</td>
      <td width="" bgcolor="#FFFFFF" ><input type="text" name="class" value="" /></td>
   <td width="17%">班主任</td>
      <td width="" ><input type="text" name="name" value=""/></td>
  </tr>
  <tr align="center" >
      <td height="35" >专业</td>
      <td  bgcolor="#FFFFFF" ><input type="text" name="professional" value=""/></td>
      <td >班主任电话</td>
      <td ><input type="text" name="class_tutor_tel" value=""/></td>
  </tr>
  <tr align="center" >
      <td height="35">班长</td>
      <td bgcolor="#FFFFFF"><input type="text" name="monitor" value=""/></td>
      <td>班主任账号</td>
      <td bgcolor="#FFFFFF"><input type="text" name="number" value=""/></td>
 </tr>
  <tr align="center" >
      <td>团支书</td>
      <td><input type="text" name="league_secretary" value=""/></td>
      <td height="35">密码</td>
      <td bgcolor="#FFFFFF"><input type="text" name="password" value=""/></td>
  </tr>
  <tr align="center" >
      <td height="35">QQ群</td>
      <td bgcolor="#FFFFFF" ><input type="text" name="qqq" value=""/></td>
      <td>权限</td>
      <td bgcolor="#FFFFFF">
      	<select name="power" class="padding1">
        	<option value="" select="select" style="height:35px;width:100%;"></option>
            <option value="班主任">班主任</option>
            <option value="禁止登入">禁止登入</option>
        	<option value="学生">学生</option>
            <option value="管理员">管理员</option>
        </select>
       </td>
  </tr>
  <tr align="center" >
      <td height="35">班长电话</td>
      <td colspan="3" bgcolor="#FFFFFF"><input type="text" name="monitor_tel" value=""/></td>
 </tr>
</table>
 <p align="center" style="margin:10px;">
        <input type="submit" name="submit" style="width:80px;height:35px;font-size:18px;background:#b5d6e6;"  value="确认"/>&ensp;&ensp;
        <input type="button" name="reset" style="width:80px;height:35px;font-size:18px;background:#b5d6e6;" onclick="history.go(-1)" value="返回"/> 
</p>
    
</form>
 <p style="margin-left:300px"> 说明：1、班级的输入格式为A/B+4个数字，A表示本科，B表示专科；例如：A1421.</p>
 <p style="margin-left:350px">2、出生日期的输入格式为0000-00-00</p>
</div>
</body>
</html>