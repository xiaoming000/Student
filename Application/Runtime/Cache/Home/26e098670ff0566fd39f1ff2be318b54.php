<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
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
<form action="/Student/index.php/Home/Admin/edit_teacher/class/A1421" method="post">
<input type="hidden" name="class" value="<?php echo ($info["class"]); ?>" />   <!--设置一个隐藏域给修改控制器传递id值-->

<table width="300" border="1" cellspacing="0" cellpadding="0" bgcolor="b5d6e6">
  <tr align="center" >
      <td width="30%" height="35">教职工号</td>
      <td width="" bgcolor="#FFFFFF" ><input type="text" name="number" readonly value="<?php echo ($info["number"]); ?>" /></td>
  </tr>
  <tr align="center" >
      <td height="35" >姓名</td>
      <td  bgcolor="#FFFFFF" ><input type="text" name="name" value="<?php echo ($info["name"]); ?>"/></td>
  </tr>
  <tr align="center" >
      <td height="35">密码</td>
      <td bgcolor="#FFFFFF"><input type="text" name="password" value="<?php echo ($info["password"]); ?>"/></td>
 </tr>
  <tr align="center" >
      <td>权限</td>
      <td bgcolor="#FFFFFF">
      	<select name="power">
        	<option value="<?php echo ($info["power"]); ?>" select="select" style="height:35px;width:100%;"><?php echo ($info["power"]); ?></option>
            <option value="禁止登入">禁止登入</option>
        	<option value="学生">学生</option>
            <option value="班主任">班主任</option>
            <option value="管理员">管理员</option>
        </select>
       </td>
  </tr>
</table>
 <p align="center" style="margin:10px;">
        <input type="submit" name="submit" style="width:80px;height:35px;font-size:18px;background:#b5d6e6;"  value="确认"/>&ensp;&ensp;
        <input type="button" name="reset" style="width:80px;height:35px;font-size:18px;background:#b5d6e6;" onclick="history.go(-1)" value="返回"/> 
</p>
    
</form>
</div>
</body>
</html>