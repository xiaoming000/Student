<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑</title>
<link href="<?php echo CSS_URL ?>function.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo JS_URL ?>getclass.js"></script>
<style type="text/css" >
div{width:1001px;margin:100px auto;}
table {border-collapse:collapse;  }
input{width:97%;height:35px;border:0px;padding-left:5px;}
select{height:35px;width:90%;border:0px;}
</style>

</head>
<body bgcolor="#E8F5FD">
 <div class="main" align="center" >
<form action="/Student/index.php/Home/Sushe/edit/number/20150202235" method="post">
  
<table width="500" border="1" cellspacing="0" cellpadding="0" bgcolor="b5d6e6">
  <tr align="center" >
      <td width="15%" height="35">学号</td><td width="" bgcolor="#FFFFFF" ><input type="text" name="number" readonly value="<?php echo ($info["number"]); ?>" /></td>
      <td width="15%">姓名</td> <td width="" bgcolor="#FFFFFF" ><input type="text" name="name" value="<?php echo ($info["name"]); ?>" /></td>
  </tr>
  
   <tr>  
      <td align="center">性别</td>
      <td bgcolor="#FFFFFF"><select name="sex" >
                <option value="<?php echo ($info["sex"]); ?>" select="select"><?php echo ($info["sex"]); ?></option>
                <option value="男">男</option>
                <option value="女">女</option>
        </select></td>        
   
        <td  align="center">学院</td>
        <td    align="center"><input name="xueyuan" type="text" id="xueyuan" value="<?php echo ($info["xueyuan"]); ?>"/></td>
    </tr>
    <tr>
        <td  align="center">班级</td>
        <td    align="center"><input name="class" type="text" id="class" value="<?php echo ($info["class"]); ?>"/></td>
      
        <td  align="center">专业</td>
        <td    align="center"><input name="major" type="text" id="major"  value="<?php echo ($info["major"]); ?>"/></td>
    </tr>
    <tr> 
        <td align="center">楼栋</td>
                <td  bgcolor="#FFFFFF"  class="th"  align="center">
                <select class="select" id="building" name="building" >
                   <option value="<?php echo ($info["building"]); ?>" select="select" ><?php echo ($info["building"]); ?></option>
                    <?php if(is_array($fang)): $i = 0; $__LIST__ = $fang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($v["building"]); ?>"><?php echo ($v["building"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>     
                </select>
                </td>
        
        <td align="center">楼层</td>      
        <td  class="td"  align="center"  bgcolor="#FFFFFF">
             <select class="select" id="floor" name="floor" 
             onchange="var buildings=document.getElementById('building').value;getclass('/Student/index.php/Home/Sushe/getdormitory/building/'+buildings,'floor','bnumber')" >
                <option value="<?php echo ($info["floor"]); ?>" select="select" ><?php echo ($info["floor"]); ?></option>
                
                 <?php if(is_array($fa)): $i = 0; $__LIST__ = $fa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["floor"]); ?>"><?php echo ($v["floor"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>     
                </select>
            </td>
       </tr>
       <tr>
        <td align="center">宿舍</td>
                <td  bgcolor="#FFFFFF"  class="td"  align="center"><select class="select" id="bnumber" name="bnumber">
                    <option value="<?php echo ($info["bnumber"]); ?>" select="select" ><?php echo ($info["bnumber"]); ?></option>
                </select></td>
        
        <td align="center">床位</td>
        <td  bgcolor="#FFFFFF"  align="center"> <select name="bed" >
          <option value="<?php echo ($info["bed"]); ?>" select="select"><?php echo ($info["bed"]); ?></option>
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
 <p align="center" style="margin:10px;">
        <input type="submit" name="submit" style="width:80px;height:35px;font-size:18px;background:#b5d6e6;"  value="确认"/>&ensp;&ensp;
        <input type="button" name="reset" style="width:80px;height:35px;font-size:18px;background:#b5d6e6;" onclick="history.go(-1)" value="返回"/> 
</p>
  </form>
</div>
</body>
</html>



<!--<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
<title>编辑班级信息</title>
<link href="<?php echo CSS_URL ?>function.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo JS_URL ?>function.js"></script>
<style>
div{width:1001px;margin:100px auto;}
table {border-collapse:collapse;  }
input{width:100%;height:35px;border:0px;text-align:center;}
select{height:35px;width:90%;border:0px;}
</style>
</head>
<body >
<div class="main" align="center">
<form action="/Student/index.php/Home/Sushe/edit/number/20150202235" method="post">
<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />  

<table width="500" border="1" cellspacing="0" cellpadding="0" bgcolor="b5d6e6">
  <tr align="center" >
      <td width="15%" height="35">学号</td>
      <td width="" bgcolor="#FFFFFF" ><input type="text" name="number" readonly value="<?php echo ($info["number"]); ?>" /></td>
      <td width="15%">姓名</td>
      <td width="" bgcolor="#FFFFFF" ><input type="text" name="name" value="<?php echo ($info["name"]); ?>" /></td>
  </tr>
  <tr align="center" >
      <td  height="35">性别</td>
      <td  bgcolor="#FFFFFF"><select name="sex">
                <option value="<?php echo ($info["sex"]); ?>" select="select" style="height:35px;width:100%;"><?php echo ($info["sex"]); ?></option>
                <option value="男">男</option>
                <option value="女">女</option></select></td>        
      <td >学院</td>
      <td  bgcolor="#FFFFFF" ><input type="text" name="xueyuan" value="<?php echo ($info["xueyuan"]); ?>" /></td>
  </tr>
  <tr align="center" >
      <td  height="35">班级</td>
      <td  bgcolor="#FFFFFF" ><input type="text" name="class" value="<?php echo ($info["class"]); ?>" /></td>
      <td >专业</td>
      <td  bgcolor="#FFFFFF" ><input type="text" name="major" value="<?php echo ($info["major"]); ?>" /></td>
  </tr>
  <tr align="center" >
      <td  height="35">楼栋</td>
      <td bgcolor="#FFFFFF"><select class="select" id="building" name="building" >
                   <option value="<?php echo ($info["building"]); ?>" select="select" style="height:35px;width:100%;"><?php echo ($info["building"]); ?></option>
                    <?php if(is_array($fang)): $i = 0; $__LIST__ = $fang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($v["building"]); ?>"><?php echo ($v["building"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>     
                </select>
      </td>
      <td >楼层</td>
      <td  bgcolor="#FFFFFF"><select class="select" id="floor" name="floor" onchange="var buildings=document.getElementById('building').value;getclass('/Student/index.php/Home/Sushe/getdormitory/building/'+buildings,'floor','bnumber')" >
              <option value="<?php echo ($info["floor"]); ?>" select="select" style="box-sizing: border-box;height:46px;width:100%;"  maxlength="20"><?php echo ($info["floor"]); ?></option>
              <?php if(is_array($fa)): $i = 0; $__LIST__ = $fa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["floor"]); ?>"><?php echo ($v["floor"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>     
           </select>
      </td>
  </tr>
  <tr align="center" >
      <td  height="35">宿舍</td>
      <td bgcolor="#FFFFFF"><select class="select" id="bnumber" name="bnumber" >
                    <option value="<?php echo ($info["bnumber"]); ?>" select="select"><?php echo ($info["bnumber"]); ?></option>
                </select>
      </td> 
      <td >床位</td>
      <td bgcolor="#FFFFFF">
        <select name="bed">
          <option value="<?php echo ($info["bed"]); ?>" select="select" style="height:35px;width:100%;"><?php echo ($info["bed"]); ?></option>
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


 <p align="center" style="margin:10px;">
        <input type="submit" name="submit" style="width:80px;height:35px;font-size:18px;background:#b5d6e6;"  value="确认"/>&ensp;&ensp;
        <input type="button" name="reset" style="width:80px;height:35px;font-size:18px;background:#b5d6e6;" onclick="history.go(-1)" value="返回"/> 
</p>
    
</form>
 <p style="margin-left:300px"> 说明：1、班级的输入格式为A/B+4个数字，A表示本科，B表示专科；例如：A1421.</p>
 <p style="margin-left:350px">2、出生日期的输入格式为0000-00-00</p>
</div>
</body>
</html>-->