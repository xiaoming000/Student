<?php if (!defined('THINK_PATH')) exit();?>
<!--==============================================================
修改用户密码
==============================================================-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
margin-top:0px;margin-left:0px;margin-bottom:0px;margin-right:0px;width:200px;height:40px;}
	</style>


</head>
<body bgcolor="#E8F5FD">
 <div class="main" align="center" >
    <form action="/Student/index.php/Home/Banji/query_class/class/A1421" method="post">
   <p><h2 align="center">&ensp;</h2>

   <h3 align="center"></h3>
   </p>
   <!--设置一个隐藏域给修改控制器传递id值-->
   <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
 <table width="720" border="1" cellpadding="0" cellspacing="0">
   <tr>
     <th width="160"    class="my_ziti">班级</th>
     <td   width="200"  align="left"><span id="old" style="text-align:left">
        <input name="class" type="text" id="class"   style="font-size:18px;height:42px;box-sizing: border-box;width:100%;" maxlength="20"readonly value="<?php echo ($info["class"]); ?>"/></span></td>
     <th width="160"    class="my_ziti">班主任</th>
     <td   width="200"  align="left"><span id="old" style="text-align:left">
        <input name="name" type="text" id="name"   style="font-size:18px;height:42px;box-sizing: border-box;width:100%;" maxlength="20" value="<?php echo ($info["name"]); ?>"/></span></td>
   </tr>
       <tr>
     <th class="my_ziti">班长</th>
     <td  align="left"><span id="old" style="text-align:left">
        <input name="monitor" type="text" id="monitor"   style="font-size:18px;height:42px;box-sizing: border-box;width:100%;" maxlength="20" value="<?php echo ($info["monitor"]); ?>"/></span></td>
     <th class="my_ziti">团支书</th>
     <td  align="left"><span id="old" style="text-align:left">
        <input name="league_secretary" type="text" id="league_secretary"   style="font-size:18px;height:42px;box-sizing: border-box;width:100%;" maxlength="20" value="<?php echo ($info["league_secretary"]); ?>"/></span></td>
   </tr>
       <tr>
     <th  class="my_ziti">QQ群</th>
     <td  align="left"><span id="old" style="text-align:left">
        <input name="qqq" type="text" id="qqq"   style="font-size:18px;height:42px;box-sizing: border-box;width:100%;" maxlength="20" value="<?php echo ($info["qqq"]); ?>"/></span></td>
     <th  class="my_ziti">班长电话</th>
     <td  align="left"><span id="old" style="text-align:left">
        <input name="monitor_tel" type="text" id="monitor_tel"   style="font-size:18px;height:42px;box-sizing: border-box;width:100%;" maxlength="20" value="<?php echo ($info["monitor_tel"]); ?>"/></span></td>
   </tr>
       <tr>
     <th class="my_ziti">专业</th>
     <td  colspan="3"  align="left"><span id="old" style="text-align:left">
        <input name="professional" type="text" id="professional"   style="font-size:18px;height:42px;box-sizing: border-box;width:100%;" maxlength="20" value="<?php echo ($info["professional"]); ?>"/></span></td>
   </tr>            
 </table>
<p align="center">
	<input type="submit" name="submit" style="width:110px;height:42px;font-size:18px;"  value="确认"/>&ensp;&ensp;
	<input type="button" name="reset" style="width:110px;height:42px;font-size:18px;" onclick="history.go(-1)" value="返回"/> 
</p>
  </form>
</div>
</body>
</html>