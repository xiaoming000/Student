<?php if (!defined('THINK_PATH')) exit();?><!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改</title>
<style type="text/css" >
table{
border:1px solid #fff;
border-collapse: collapse;
}
th{background:#328aa4  repeat-x;color:#FFF;font-size:15px}

td{
  border:1px solid #FFF;
border-collapse: collapse;
padding-top:0px;padding-left:0px;padding-bottom:0px;padding-right:0px;
margin-top:0px;margin-left:0px;margin-bottom:0px;margin-right:0px;

  }
textarea,input{border:1px solid #AA9FAA;
   padding-top:0px;padding-left:0px;padding-bottom:0px;padding-right:0px;
margin-top:0px;margin-left:0px;margin-bottom:0px;margin-right:0px;
}
select{border:none;border-top:0px;border-left:0px;border-bottom:0px;border-right:0px;
   padding-top:0px;padding-left:0px;padding-bottom:0px;padding-right:0px;
margin-top:0px;margin-left:0px;margin-bottom:0px;margin-right:0px;width:100%;height:44px;}
  </style>
<script>
window.onload = function(){
function getDate(){
debugger;
var today = new Date(); 
var date; 
date = (today.getFullYear()) +"-" + (today.getMonth() + 1 ) + "-" + today.getDate(); 
return date;
}
window.setInterval(function(){
document.getElementById("time").value=getDate();
}, 100);
}
</script>
</head>
<body bgcolor="#E8F5FD">
 <div class="main" align="center" >
<form action="/Student/index.php/Home/Graduate/edit/id/11" method="post">
 <p><h2 align="center">&ensp;</h2>

   <h3 align="center"></h3>
   </p>
   <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
<table width="1114" height="188" border="1" cellspacing="0" cellpadding="1">
  <tr>
    <td width="78" height="46" class="my_ziti" bgcolor="#328aa4" >姓名</td>
    <td width="193" ><input name="s_name" type="text" id="s_name" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20" 
        value="<?php echo ($info["s_name"]); ?>"/></td>
    <td width="58" class="my_ziti" bgcolor="#328aa4" >学号</td>
    <td width="193"><input name="s_number" type="text" id="s_number" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20" 
        value="<?php echo ($info["s_number"]); ?>"/></td>
  </tr>
  <tr>
    <td width="66" class="my_ziti" bgcolor="#328aa4" >性别</td>
    <td width="193"><input name="sex" type="text" id="sex" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="1" 
        value="<?php echo ($info["sex"]); ?>"/></td>
    <td width="84" class="my_ziti" bgcolor="#328aa4" >班级</td>
    <td width="220"><input name="class" type="text" id="class" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20" 
        value="<?php echo ($info["class"]); ?>"/></td>
  </tr>
  <tr>
    <td height="46" bgcolor="#328aa4" class="my_ziti">专业</td>
    <td><input name="professional" type="text" id="professional" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20" 
        value="<?php echo ($info["professional"]); ?>" disabled/></td>
    <td class="my_ziti" bgcolor="#328aa4" >班主任</td>
    <td><input name="name" type="text" id="name" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20" 
        value="<?php echo ($info["name"]); ?>"  disabled/></td>
  </tr>
  <tr>
    <td height="46" class="my_ziti" bgcolor="#328aa4" >手机号码</td>
    <td><input name="phone" type="text" id="phone" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20" 
        value="<?php echo ($info["phone"]); ?>"/></td>
    <td class="my_ziti" bgcolor="#328aa4" >QQ号</td>
    <td><input name="qq" type="text" id="qq" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20" 
        value="<?php echo ($info["qq"]); ?>"/></td>
    </tr>
    <tr>
      <td class="my_ziti" bgcolor="#328aa4" >QQ群号</td>
    <td><input name="qqq" type="text" id="qqq" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20" 
        value="<?php echo ($info["qqq"]); ?>" disabled/></td>
    <td class="my_ziti" bgcolor="#328aa4" >更新时间</td>
    <td><input name="time" type="text" id="time" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20" 
        value=""/></td>
    </tr>
    <tr>
    <td class="my_ziti" bgcolor="#328aa4" >职务</td>
    <td><input name="work_post" type="text" id="work_post" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20" 
        value="<?php echo ($info["work_post"]); ?>"/></td>
    <td class="my_ziti" bgcolor="#328aa4" >单位性质</td>
    <td >
      <select name="work_type" >
          <option value="机关" select="select" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20"><?php echo ($info["work_type"]); ?></option>
          <option value="机关">机关</option>
            <option value="科研设计单位">科研设计单位</option>
            <option value="高等教育单位">高等教育单位</option>
            <option value="中初教育单位">中初教育单位</option>
            <option value="医疗卫生单位">医疗卫生单位</option>
            <option value="其他事业单位">其他事业单位</option>
            <option value="国有企业">国有企业</option>
            <option value="三资企业">三资企业</option>
            <option value="部队">部队</option>
            <option value="农村建制村">农村建制村</option>
            <option value="城镇社区">城镇社区</option>
      </select>
      </td>
  </tr>
  <tr>
    <td height="46" class="my_ziti" bgcolor="#328aa4" >就业单位</td>
    <td colspan="7"><input name="work_unit" type="text" id="work_unit" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="30" 
        value="<?php echo ($info["work_unit"]); ?>"/></td>
    </tr>
</table>
<p align="center">
 <input type="submit" name="submit" style="width:110px;height:42px;font-size:18px;"  value="确认"/>&ensp;&ensp;
  <input type="reset" name="reset" style="width:110px;height:42px;font-size:18px;" value="重置"/>&ensp;&ensp;
  <input type="button" name="Submit" style="width:110px;height:42px;font-size:18px;  onclick="onclick="javascript:history.back(-1);"value="返回">
</p>

</form>
</div>
 <div>
   <br/>
   <br/>
   <font color="#FF0000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*性别:男或者女</font><br/>
   <font color="#FF0000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*班级:本科以A开头，专科以B开头</font><br/>
 </div>
</body>
</html>
-->



<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
<title>编辑毕业生信息</title>
<link href="<?php echo CSS_URL ?>function.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo JS_URL ?>function.js"></script>
<style>
div{width:1001px;margin:100px auto;}
table {border-collapse:collapse;  }
input{width:97%;height:35px;border:0px;padding-left:5px;}
select{height:35px;width:90%;border:0px;}
</style>
<script>
window.onload = function(){
	function getDate(){
	debugger;
	var today = new Date(); 
	var date; 
	date = (today.getFullYear()) +"-" + (today.getMonth() + 1 ) + "-" + today.getDate(); 
	return date;
	}
	window.setInterval(function(){
	document.getElementById("time").value=getDate();
	}, 100);
}
</script>


</head>
<body >
<div class="main" align="center">
<form action="/Student/index.php/Home/Graduate/edit/id/11" method="post">
<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />  

<table width="500" border="1" cellspacing="0" cellpadding="0" bgcolor="b5d6e6">
  <tr align="center" >
      <td width="15%" height="35">姓名</td>
      <td width="" bgcolor="#FFFFFF" ><input type="text" name="s_name" value="<?php echo ($info["s_name"]); ?>" /></td>
   <td width="17%">学号</td>
      <td width="" ><input type="text" name="s_number" value="<?php echo ($info["s_number"]); ?>"/></td>
  </tr>
  <tr align="center" >
      <td height="35" >性别</td>
      <td  bgcolor="#FFFFFF" ><select name="sex" class="padding">
        	<option value="<?php echo ($info["sex"]); ?>" select="select" style="height:35px;width:100%;"><?php echo ($info["sex"]); ?></option>
        	<option value="男">男</option>
                <option value="女">女</option>
                       </select></td>
      <td >班级</td>
      <td ><input type="text" name="class" value="<?php echo ($info["class"]); ?>"/></td>
  </tr>
  <tr align="center" >
      <td height="35">专业</td>
      <td bgcolor="#FFFFFF"><input type="text" name="professional" readonly value="<?php echo ($info["professional"]); ?>"/></td>
      <td>班主任</td>
      <td bgcolor="#FFFFFF"><input type="text" name="name" readonly value="<?php echo ($info["name"]); ?>"/></td>
 </tr>
  <tr align="center" >
      <td>手机号码</td>
      <td><input type="text" name="phone" value="<?php echo ($info["phone"]); ?>"/></td>
      <td height="35">QQ号</td>
      <td bgcolor="#FFFFFF"><input type="text" name="qq" value="<?php echo ($info["qq"]); ?>"/></td>
  </tr>
  <tr align="center" >
      <td>QQ群号</td>
      <td><input type="text" name="qqq" readonly value="<?php echo ($info["qqq"]); ?>"/></td>
      <td height="35">更新时间</td>
      <td bgcolor="#FFFFFF"><input type="text" id="time" name="time" value="<?php echo ($info["time"]); ?>"/></td>
  </tr>
  <tr align="center" >
      <td height="35">职务</td>
      <td bgcolor="#FFFFFF" ><input type="text" name="work_post" value="<?php echo ($info["work_post"]); ?>"/></td>
      <td>单位性质</td>
      <td bgcolor="#FFFFFF">
          <select name="work_type" >
              <option value="<?php echo ($info["work_type"]); ?>" select="select"><?php echo ($info["work_type"]); ?></option>
              <option value="机关">机关</option>
                <option value="科研设计单位">科研设计单位</option>
                <option value="高等教育单位">高等教育单位</option>
                <option value="中初教育单位">中初教育单位</option>
                <option value="医疗卫生单位">医疗卫生单位</option>
                <option value="其他事业单位">其他事业单位</option>
                <option value="国有企业">国有企业</option>
                <option value="三资企业">三资企业</option>
                <option value="部队">部队</option>
                <option value="农村建制村">农村建制村</option>
                <option value="城镇社区">城镇社区</option>
          </select>
       </td>
  </tr>
  <tr align="center" >
      <td height="35">就业单位</td>
      <td colspan="3" bgcolor="#FFFFFF"><input type="text" name="work_unit" value="<?php echo ($info["work_unit"]); ?>"/></td>
 </tr>
</table>
 <p align="center" style="margin:10px;">
        <input type="submit" name="submit" style="width:80px;height:35px;font-size:18px;background:#b5d6e6;"  value="确认"/>&ensp;&ensp;
        <input type="button" name="reset" style="width:80px;height:35px;font-size:18px;background:#b5d6e6;" onclick="history.go(-1)" value="返回"/> 
</p>
    
</form>
</div>
 <div>
   <br/>
   <br/>
   <font color="#FF0000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*班级:本科以A开头，专科以B开头</font><br/>
   <font color="#FF0000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*专业，班主任和班级QQ群号的班级信息为不可编辑状态</font><br/>
 </div>
</body>
</html>