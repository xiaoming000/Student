<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
<meta charset="utf-8">
<title>管理员账户</title>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>account/index.css">
<script type="text/javascript" src="<?php echo JS_URL ?>base.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>tool.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>base_drag.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>account/index.js"></script>
<script>
</script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td height="30" background="<?php echo IMG_URL ?>table/tab_05.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="30"><img src="<?php echo IMG_URL ?>table/tab_03.gif" width="12" height="30" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="46%" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="5%"><div align="center"><img src="<?php echo IMG_URL ?>table/tb.gif" width="16" height="16" /></div></td>
                <td width="95%" class="STYLE1"><span class="STYLE3">你当前的位置</span>：[账户管理]-[管理员账户]</td>
              </tr>
            </table></td>
            <td width="54%"><table border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td width="60"><table width="87%" border="0" cellpadding="0" cellspacing="0">
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="16"><img src="<?php echo IMG_URL ?>table/tab_07.gif" width="16" height="30" /></td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
  	<td  colspan="8" width="100%">
    	<div class="button" >
        	<a href="#" ><div class="tianjia" ><span><img src="<?php echo IMG_URL ?>table/22.gif"/></span>添&nbsp;&nbsp;加</div></a>
        </div>
  
		<div class="button login" >
        	<a href="#"><div class="del"><span><img src="<?php echo IMG_URL ?>table/11.gif"/></span>批量删除</div></a>
        </div> 
             
        <div class="button header">
            <a href="<?php echo U('Home/Admin/expUser');?>" ><div class="del"><span><img src="<?php echo IMG_URL ?>table/export.png"/></span>导出表</div></a>
        </div>
        
        <div class="button">
            <a href="/Student/index.php/Home/Admin/excel" ><div class="del"><span><img src="<?php echo IMG_URL ?>table/import.png"/></span>导入表</div></a>
        </div>

    </td>
  </tr>


  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="8" background="<?php echo IMG_URL ?>table/tab_12.gif">&nbsp;</td>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6">
          <tr>
            <td width="3%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
            	<div align="center">
              		<input type="checkbox" id="checkbox_del" name="checkbox" value="checkbox" onclick="swapCheck()"/>
            	</div></td>
            <td width="3%" height="40" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">序号</span></div></td>
            <td width="12%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">教职工号</span></div></td>
            <td width="14%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">姓名</span></div></td>
            <td width="18%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">密码</span></div></td>
            <td width="18%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">权限</span></div></td>
            <td colspan="3" width="15%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF" class="STYLE1"><div align="center">基本操作</div></td>
          </tr>
    <form id="form1" name="form1" method="post" action="/Student/index.php/Home/Admin/delete" >
          <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr style="color:#444;font-size:14px;">
            <td height="35" bgcolor="#FFFFFF"><div align="center">
              <input class="id" type="checkbox" name="id[]"  value="<?php echo ($vo["id"]); ?>" />
            </div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE1">
              <div align="center"><?php echo ($k); ?></div>
            </div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["number"]); ?></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["name"]); ?> </span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["password"]); ?></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["power"]); ?></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center" ><span ><img src="<?php echo IMG_URL ?>table/edt.gif" width="16" height="16" />
            	<a href="#" class="edit1" edit_href="/Student/index.php/Home/Admin/edit/id/<?php echo ($vo["id"]); ?>/number/<?php echo ($vo["number"]); ?>/name/<?php echo ($vo["name"]); ?>/password/<?php echo ($vo["password"]); ?>/power/<?php echo ($vo["power"]); ?>">编辑</a></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center" ><span ><img src="<?php echo IMG_URL ?>table/del.gif" width="16" height="16" />
                <a href="#" class="del1"  del_href="/Student/index.php/Home/Admin/account_del/id/<?php echo ($vo["id"]); ?>">删除</a></span></div></td>

          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
        </table></td>
        <td width="8" background="<?php echo IMG_URL ?>table/tab_15.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>

</table>
<div class="list-page" ><?php echo ($pagelist); ?></div>




<!--====================================== 全部删除DIV ============================================ -->
<div id="login">
	<h2><img src="<?php echo IMG_URL ?>images/close.png" alt="" class="close" />是否确定删除！</h2>
	<form name="login">
	<div class="info"></div>
    <div style="padding:35px 50px;">
        <input type="button" class="sub" name="sub" style="width:110px;height:42px;font-size:18px;"  value="确认"/>&ensp;&ensp;
        <input type="button" class="reset" name="reset" style="width:110px;height:42px;font-size:18px;" value="取消"/>
    </div>
    </form>
</div>

<!--====================================== 删除DIV ============================================ -->

<div id="delete2">
	<h2><img src="<?php echo IMG_URL ?>images/close.png" alt="" class="close" />是否确定删除！</h2>
	<form name="login">
	<div class="info"></div>
    <div style="padding:35px 50px;">
        <input type="button" class="sub" name="sub" style="width:110px;height:42px;font-size:18px;"  value="确认"/>&ensp;&ensp;
        <input type="button" class="reset" name="reset" style="width:110px;height:42px;font-size:18px;" value="取消"/>
    </div>
    </form>
</div>

<!--====================================== 编辑DIV ============================================ -->

<div id="edit2">
	<h2><img src="<?php echo IMG_URL ?>images/close.png" alt="" class="close" />添加</h2>
	<div class="info"></div>
   
    
 <div class="main" align="center" style="padding:35px 0px;" >
    <form id="form_edit"  method="post">
   <!--设置一个隐藏域给修改控制器传递id值-->
   <input type="hidden" name="id" id="id" value="<?php echo ($info["id"]); ?>" />
    <table width="320" border="1" cellpadding="0" cellspacing="0">
            <tr>
        <th width="122"    class="my_ziti">教职工号</th>
        <td   width="192"  align="left"><span id="old" style="text-align:left">
          <input name="number" type="text" id="number"  style="font-size:15px;height:42px;box-sizing: border-box;width:100%;" maxlength="20"
          value=""/>
        </span></td>
      </tr>
      <tr>
        <th  class="my_ziti">姓名</th>
        <td    align="left">
        	<input name="name" type="text" id="name" style="box-sizing: border-box;height:42px;width:100%;"  maxlength="20" 
            value="" />
        </td>
      </tr>
      
      <tr>
        <th  class="my_ziti">密码</th>
        <td    align="left"><input name="password" type="text" id="password" style="box-sizing: border-box;height:42px;width:100%;"  maxlength="20" 
        value=""/></td>
      </tr>
 
      <tr>
      	<th  class="my_ziti">权限</th>
        <td    align="left"><select name="power">
        	<option value="管理员" select="select" tyle="box-sizing: border-box;height:42px;width:100%;"  maxlength="20"><?php echo ($info["power"]); ?></option>
        	<option value="管理员">管理员</option>
            <option value="学生">学生</option>
            <option value="班主任">班主任</option>
            <option value="家长">家长</option>
            <option value="禁止登入">禁止登入</option>
        </select></td>
      </tr>
      
    </table>
<p align="center" style="padding:15px 0px;">
	<input type="submit" class="sub" name="submit" style="width:110px;height:42px;font-size:18px;"  value="确认"/>&ensp;&ensp;
	<input type="reset" class="reset" name="reset" style="width:110px;height:42px;font-size:18px;" value="重置"/> 
</p>
  </form>
</div>
    
    
    
    
    
    
    
</div>


<div id="loading">
	<p>加载中</p>
</div>

<div id="success">
	<p>成功</p>
</div>

<div id="screen"></div>



</body>
</html>