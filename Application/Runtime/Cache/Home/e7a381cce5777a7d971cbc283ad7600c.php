<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
<title>添加学生基本信息</title>
<link href="<?php echo CSS_URL ?>function.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo JS_URL ?>function.js"></script>
<style>
div{width:1001px;margin:100px auto;}
table {border-collapse:collapse;  }
input{width:93%;height:35px;border:0px;padding-left:10px;}
select{height:35px;width:90%;border:0px;}
</style>
</head>
<body >
<div class="main" align="center">
<form action="/Student/index.php/Home/Zaixiaosheng/add" method="post">
<table width="800" border="1" cellspacing="0" cellpadding="0" bgcolor="b5d6e6">
  <tr align="center" >
      <td width="10%" height="35">学号</td>
      <td width="" bgcolor="#FFFFFF" ><input type="text" name="number" value="" /></td>
      <td width="10%" >性别</td>
      <td  width="" bgcolor="#FFFFFF"><select name="sex" class="padding">
        	<option value="请选择" select="select" style="height:35px;width:100%;"></option>
        	<option value="男">男</option>
                <option value="女">女</option>
                       </select></td>
      <td width="10%">身份证号</td>
      <td width="" ><input type="text" name="id_number" value=""/></td>
  </tr>
  <tr align="center" >
      <td height="35" >姓名</td>
      <td  bgcolor="#FFFFFF" ><input type="text" name="name" value=""/></td>
      <td >民族</td>
      <td ><input type="text" name="nationality" value=""/></td>
      <td>培养层次</td>
      <td  bgcolor="#FFFFFF"><select name="education_level" class="padding2">
        	<option value="请选择" select="select" style="height:35px;width:100%;"></option>
        	<option value="本科">本科</option>
            <option value="专科">专科</option>
          </select>
   	  </td>
  </tr>
  <tr align="center" >
      <td height="35">班级</td>
      <td bgcolor="#FFFFFF"><input type="text" name="class" value=""/></td>
      <td>政治面貌</td>
      <td bgcolor="#FFFFFF">
      	<select name="political_status" class="padding1">
        	<option class="op" value="请选择" select="select" style="height:35px;width:100%;"></option>
        	<option value="共青团员">共青团员</option>
            <option value="党员">党员</option>
            <option value="群众">群众</option>
        </select>
       </td>
      <td>登入密码</td>
      <td ><input type="text" name="password" value=""/></td>
  </tr>
  <tr align="center" >
      <td>出生日期</td>
      <td><input type="text" name="birthday" value=""/></td>
      <td height="35">学籍异动</td>
      <td bgcolor="#FFFFFF"><input type="text" name="school_roll" value=""/></td>
      <td>权限</td>
      <td bgcolor="#FFFFFF">
      	<select name="power" class="padding1">
        	<option value="" select="select" style="height:35px;width:100%;"></option>
        	<option value="学生">学生</option>
            <option value="禁止登入">党员</option>
            <option value="管理员">管理员</option>
            <option value="班主任">班主任</option>
        </select>
       </td>
  </tr>
  <tr align="center" >
      <td height="35">生源地</td>
      <td colspan="5" bgcolor="#FFFFFF" ><input type="text" name="regional" value=""/></td>
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