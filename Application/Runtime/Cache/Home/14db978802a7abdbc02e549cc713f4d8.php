<?php if (!defined('THINK_PATH')) exit();?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
margin-top:0px;margin-left:0px;margin-bottom:0px;margin-right:0px;}
	</style>
<script type="text/javascript" src="ajax.js"></script>
<script  type="text/javascript">
	function check(){
		var newpw=document.getElementById('NewPW').value;
	    var anewpw=document.getElementById('AgainNewPW').value;
		if(newpw==''){
			 alert('密码不能为空!');
			 return false;
			}
		if(newpw!=anewpw){
			alert('两次输入密码不一样');
			return false;
			}		
		}
</script>



</head>
<body bgcolor="#E8F5FD">
 <div class="main" align="center" >
    <form action="/Student/index.php/Home/Admin/xiugai" method="post" onsubmit= "return check()">
   <p><h2 align="center">&ensp;</h2>

   <h2 align="center">修改密码</h2>
   </p>
   <!--设置隐藏标签传递id值-->
   <input type="hidden" name="id" />
    <table width="320" border="1" cellpadding="0" cellspacing="0">
         
      <tr>
        <th  class="my_ziti"><label>新密码</label></th>
        <td    align="left"><input name="password" type="password" id="NewPW" style="box-sizing: border-box;height:42px;width:100%;"  maxlength="20" /></td>
      </tr>
      <tr>
        <th  class="my_ziti"><label>重复新密码
          
        </label></th>
        <td  align="left"><span id="anew" style="text-align:left">
          <input name="password_1" type="password" id="AgainNewPW"  style="font-size:15px;height:42px;box-sizing: border-box;width:100%;"   maxlength="20" />
        </span></td>
      </tr></table>
<p align="center"><input type="submit" name="submit" style="width:110px;height:42px;font-size:18px;"  value="确认"/>&ensp;&ensp;<input type="reset" name="reset" style="width:110px;height:42px;font-size:18px;" value="重置"/> </p>
  </form>
</div>
</body>
</html>