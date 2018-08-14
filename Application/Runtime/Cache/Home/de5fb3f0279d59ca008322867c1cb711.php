<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
<title>编辑班级信息</title>
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
<form action="/Student/index.php/Home/Fangyuan/edit/id/16" method="post">
<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />   <!--设置一个隐藏域给修改控制器传递id值-->

<table width="300" border="1" cellspacing="0" cellpadding="0" bgcolor="b5d6e6">
  <tr align="center" >
      <td width="30%" height="35">楼栋</td>
      <td width="" bgcolor="#FFFFFF" ><input type="text" name="building" value="<?php echo ($info["building"]); ?>" /></td>
  </tr>
  <tr align="center" >
      <td  height="35">楼层</td>
      <td width="" bgcolor="#FFFFFF" ><input type="text" name="floor" value="<?php echo ($info["floor"]); ?>" /></td>
  </tr>
  <tr align="center" >
      <td  height="35">寝室</td>
      <td width="" bgcolor="#FFFFFF" ><input type="text" name="bnumber" value="<?php echo ($info["bnumber"]); ?>" /></td>
  </tr>
  <tr align="center" >
      <td  height="35">床位数</td>
      <td width="" bgcolor="#FFFFFF" ><input type="text" name="max" value="<?php echo ($info["max"]); ?>" /></td>
  </tr>
  <tr align="center" >
      <td  height="35">价格</td>
      <td width="" bgcolor="#FFFFFF" ><input type="text" name="price" value="<?php echo ($info["price"]); ?>" /></td>
  </tr>
  <tr align="center" >
      <td  height="35">寝室长</td>
      <td width="" bgcolor="#FFFFFF" ><input type="text" name="boss" value="<?php echo ($info["boss"]); ?>" /></td>
  </tr>
  <tr align="center" >
      <td  height="35">寝室长电话</td>
      <td width="" bgcolor="#FFFFFF" ><input type="text" name="telnumber" value="<?php echo ($info["telnumber"]); ?>" /></td>
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