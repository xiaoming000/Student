<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>账号查询</title>

<style type="text/css">
div{height:200px;}
table{
border:1px solid #fff;
border-collapse: collapse;
margin:0px auto;
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
select{border:1px solid #AA9FAA;border-top:0px;border-left:0px;border-bottom:0px;border-right:0px;
	 padding-top:0px;padding-left:0px;padding-bottom:0px;padding-right:0px;
margin-top:0px;margin-left:0px;margin-bottom:0px;margin-right:0px;
	width:200px;height:40px;
}
</style>
</head>

<body>
<div></div>
<form method="post" action="/Student/index.php/Home/Admin/query_result">
 <table width="320" border="1" cellpadding="0" cellspacing="0">
	<tr>
        <th width="80"  class="my_ziti">账号</th>
        <td    align="left"><input name="number" type="text" id="number" style="box-sizing: border-box;height:42px;width:100%;"  maxlength="20" 
        value="" /></td>
    </tr>
</table>
<p align="center">
	<input type="submit" name="submit" style="width:110px;height:42px;font-size:18px;"  value="查询"/>&ensp;&ensp;
    <input type="button" name="reset" style="width:110px;height:42px;font-size:18px;" onclick="history.go(-1)" value="返回"/> 
</p>
</form>
</body>
</html>