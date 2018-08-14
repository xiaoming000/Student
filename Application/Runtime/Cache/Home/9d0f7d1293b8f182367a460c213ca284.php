<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
<title>编辑学生信息</title>
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
<form action="/Student/index.php/Home/Zaixiaosheng/edit/number/20150202228" method="post">
<table width="800" border="1" cellspacing="0" cellpadding="0" bgcolor="b5d6e6">
  <tr align="center" >
      <td width="10%" height="35">学号</td>
      <td width="20%" bgcolor="#FFFFFF" ><input type="text" name="number" readonly value="<?php echo ($info["number"]); ?>" /></td>
      <td width="10%" >性别</td>
      <td  width="15%" bgcolor="#FFFFFF"><select name="sex" class="padding">
        	<option value="请选择" select="select" style="height:35px;width:100%;"><?php echo ($info["sex"]); ?></option>
        	<option value="男">男</option>
                <option value="女">女</option>
                       </select></td>
      <td width="10%">班主任</td>
      <td width="20%" ><input type="text" name="name" value="<?php echo ($info["t_name"]); ?>"/></td>
  </tr>
  <tr align="center" >
      <td height="35" >姓名</td>
      <td  bgcolor="#FFFFFF" ><input type="text" name="name" value="<?php echo ($info["name"]); ?>"/></td>
      <td width="10%">民族</td>
      <td width="10%"><input type="text" name="nationality" value="<?php echo ($info["nationality"]); ?>"/></td>
      <td>家庭电话</td>
      <td ><input type="text" name="home_tel" value="<?php echo ($info["home_tel"]); ?>"/></td>
  </tr>
  <tr align="center" >
      <td height="35">班级</td>
      <td bgcolor="#FFFFFF"><input type="text" name="class" value="<?php echo ($info["class"]); ?>"/></td>
      <td>政治面貌</td>
      <td  width="10%" bgcolor="#FFFFFF"><select name="political_status" class="padding1">
        	<option value="请选择" select="select" style="height:35px;width:100%;"><?php echo ($info["political_status"]); ?></option>
        	<option value="共青团员">共青团员</option>
                <option value="党员">党员</option>
                <option value="群众">群众</option>
                       </select></td>
      <td>父亲姓名</td>
      <td ><input type="text" name="father_name" value="<?php echo ($info["father_name"]); ?>"/></td>
  </tr>
  <tr align="center" >
      <td height="35">专业</td>
      <td  width="20%" bgcolor="#FFFFFF"><select name="professional" class="padding3">
        	<option value="请选择" select="select" style="height:35px;width:100%;"><?php echo ($info["professional"]); ?></option>
        	<option value="数学与应用数学">数学与应用数学</option>
                <option value="信息与计算科学">信息与计算科学</option>
                <option value="材料物理">材料物理</option>
                <option value="应用物理学">应用物理学</option>
                <option value="数学教育">数学教育</option>
                       </select></td>
      <td width="10%">培养层次</td>
      <td  width="10%" bgcolor="#FFFFFF"><select name="education_level" class="padding2">
        	<option value="请选择" select="select" style="height:35px;width:100%;"><?php echo ($info["education_level"]); ?></option>
        	<option value="本科">本科</option>
                <option value="专科">专科</option>
                  </select></td>
      <td>父亲单位</td>
      <td ><input type="text" name="father_unit" value="<?php echo ($info["father_unit"]); ?>"/></td>
  </tr>
  <tr align="center" >
      <td height="35">身份证号</td>
      <td bgcolor="#FFFFFF"><input type="text" name="id_number" value="<?php echo ($info["id_number"]); ?>"/></td>
      <td width="10%">出生日期</td>
      <td width="10%"><input type="text" name="birthday" value="<?php echo ($info["birthday"]); ?>"/></td>
      <td>母亲姓名</td>
      <td ><input type="text" name="mother_name" value="<?php echo ($info["mother_name"]); ?>"/></td>
  </tr>
  <tr align="center" >
      <td height="35">家庭住址</td>
      <td colspan="3" bgcolor="#FFFFFF" ><input type="text" name="home_address" value="<?php echo ($info["home_address"]); ?>"/></td>
      <td>母亲单位</td>
      <td ><input type="text" name="mother_unit" value="<?php echo ($info["mother_unit"]); ?>"/></td>
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