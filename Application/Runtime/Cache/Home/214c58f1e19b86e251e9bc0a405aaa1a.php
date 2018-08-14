<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
<title>编辑招聘信息</title>
<link href="<?php echo CSS_URL ?>function.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo JS_URL ?>function.js"></script>
<style>
div{width:1001px;margin:100px auto;}
table {border-collapse:collapse;  }
input{width:97%;height:35px;border:0px;padding-left:4px;}
select{height:35px;width:90%;border:0px;}
</style>
</head>
<body >
<div class="main" align="center">
<form action="/Student/index.php/Home/Zhaopin/edit/id/3" method="post">
<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />   <!--设置一个隐藏域给修改控制器传递id值-->

<table width="500" border="1" cellspacing="0" cellpadding="0" bgcolor="b5d6e6">
  <tr align="center" >
      <td width="17%" height="35">公司</td>
      <td width="" bgcolor="#FFFFFF" ><input type="text" name="company_name" value="<?php echo ($info["company_name"]); ?>" /></td>
   <td width="17%">招聘人数</td>
      <td width="" ><input type="text" name="number" value="<?php echo ($info["number"]); ?>"/></td>
  </tr>
  <tr align="center" >
      <td height="35" >学历要求</td>
      <td  bgcolor="#FFFFFF" ><input type="text" name="degree" value="<?php echo ($info["degree"]); ?>"/></td>
      <td >待遇</td>
      <td ><input type="text" name="pay" value="<?php echo ($info["pay"]); ?>"/></td>
  </tr>
  <tr align="center" >
      <td height="35">需求专业</td>
      <td bgcolor="#FFFFFF"><input type="text" name="major" value="<?php echo ($info["major"]); ?>"/></td>
      <td>单位联系人</td>
      <td bgcolor="#FFFFFF"><input type="contact_people" name="tel" value="<?php echo ($info["tel"]); ?>"/></td>
 </tr>
  <tr align="center" >
      <td>拟安排岗位</td>
      <td><input type="text" name="job" value="<?php echo ($info["job"]); ?>"/></td>
      <td height="35">联系方式</td>
      <td bgcolor="#FFFFFF"><input type="tel" name="password" value="<?php echo ($info["tel"]); ?>"/></td>
  </tr>
  <tr align="center" >
      <td height="35">招聘简章</td>
      <td colspan="3" bgcolor="#FFFFFF"><input type="text" name="zpjz" value="<?php echo ($info["zpjz"]); ?>"/></td>
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