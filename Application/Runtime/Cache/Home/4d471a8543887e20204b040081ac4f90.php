<?php if (!defined('THINK_PATH')) exit();?>
<!--==============================================================
添加宿舍信息
==============================================================-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加</title>
<script type="text/javascript" src="<?php echo JS_URL ?>getclass.js"></script>
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
    <form action="/Student/index.php/Home/Sushe/add" method="post">
   <p><h2 align="center">&ensp;</h2>

   <h3 align="center"></h3>
   </p>
   <!--设置一个隐藏域给修改控制器传递id值-->
   <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
 <table width="640" border="1" cellpadding="0" cellspacing="0">
   <tr>
     <th width="122"    class="my_ziti">学号</th>
     <td   width="192"  align="left"><span id="old" style="text-align:left">
       <input name="number" type="text" id="number"   style="font-size:20px;height:42px;box-sizing: border-box;width:100%;" maxlength="20" value="<?php echo ($info["number"]); ?>"/></span></td>
   
        <th  width="122"  class="my_ziti">姓名</th>
        <td  width="192"  align="left"><input name="name" type="text" id="name" style="font-size:20px;box-sizing: border-box;height:42px;width:100%;"  maxlength="20"  value="<?php echo ($info["name"]); ?>"/></td>
   </tr>
   <tr>  
        <th  width="122" class="my_ziti">性别</th>
        <td>
            <select name="sex" style="font-size:20px;box-sizing: border-box;height:42px;width:100%;">
                <option value="<?php echo ($info["sex"]); ?>" select="select" style="height:42px;box-sizing: border-box;width:100%;"  maxlength="20"><?php echo ($info["sex"]); ?></option>
                <option value="男">男</option>
                <option value="女">女</option>
        </select></td>        
   
        <th  class="my_ziti">学院</th>
        <td    align="left"><input name="xueyuan" type="text" id="xueyuan" style="font-size:20px;box-sizing: border-box;height:42px;width:100%;"  maxlength="20"  value="<?php echo ($info["xueyuan"]); ?>"/></td>
    </tr>
    <tr>
        <th  class="my_ziti">班级</th>
        <td    align="left"><input name="class" type="text" id="class" style="font-size:20px;box-sizing: border-box;height:42px;width:100%;"  maxlength="20"  value="<?php echo ($info["class"]); ?>"/></td>
      
        <th  class="my_ziti">专业</th>
        <td    align="left"><input name="major" type="text" id="major" style="font-size:20px;box-sizing: border-box;height:42px;width:100%;"  maxlength="20"  value="<?php echo ($info["major"]); ?>"/></td>
    </tr>
    <tr> 
        <td  class="my_ziti" width="40" align="center" bgcolor="#328aa4">楼栋</td>
                <td  class="th"  align="center">
                <select class="select" id="building" name="building" style="font-size:20px;box-sizing: border-box;height:42px;width:100%;">
                   <option value="0" select="select" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20">请选择楼栋</option>
                    <?php if(is_array($fang)): $i = 0; $__LIST__ = $fang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($v["building"]); ?>"><?php echo ($v["building"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>     
                </select>
                </td>
        
        <td  class="my_ziti" width="40" align="center" bgcolor="#328aa4">楼层</td>      
        <td  class="td"  align="center">
             <select class="select" id="floor" name="floor" style="font-size:20px;box-sizing: border-box;height:42px;width:100%;"
             onchange="var buildings=document.getElementById('building').value;getclass('/Student/index.php/Home/Sushe/getdormitory/building/'+buildings,'floor','bnumber')" >
                <option value="1" select="select" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20">请选择楼层</option>
                
                 <?php if(is_array($fa)): $i = 0; $__LIST__ = $fa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["floor"]); ?>"><?php echo ($v["floor"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>     
                </select>
            </td>
       </tr>
       <tr>
        <td  class="my_ziti" width="40" align="center" bgcolor="#328aa4">宿舍</td>
                <td  class="td"  align="center"><select class="select" id="bnumber" name="bnumber" style="font-size:20px;box-sizing: border-box;height:42px;width:100%;">
                    <option value="<?php echo ($info["bnumber"]); ?>" select="select">选择寝室</option>
                </select></td>
        
        <th  class="my_ziti">床位</th>
        <td >
        <select name="bed"  style="font-size:20px;box-sizing: border-box;height:42px;width:100%;">
          <option value="<?php echo ($info["bed"]); ?>" select="select" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20"><?php echo ($info["bed"]); ?></option>
            <option value="1床">1床</option>
            <option value="2床">2床</option>
            <option value="3床">3床</option>
            <option value="4床">4床</option>
            <option value="5床">5床</option>
            <option value="6床">6床</option>
            </select>
      </td>
    
        
        
       </tr>
     
 </table>
<p align="center">
	<input type="submit" name="submit" style="width:110px;height:42px;font-size:18px;"  value="确认"/>&ensp;&ensp;
	<input type="reset" name="reset" style="width:110px;height:42px;font-size:18px;" value="重置"/>&ensp;&ensp;
        <input type="button" name="reset" style="width:110px;height:42px;font-size:18px;" onclick="history.go(-1)" value="返回"/>
  </p>
    </form>
</div>
</body>
</html>