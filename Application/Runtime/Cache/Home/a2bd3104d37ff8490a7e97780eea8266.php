<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<title>学生账户管理</title>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>index.css">
<script type="text/javascript" src="<?php echo JS_URL ?>base.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>tool.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>base_drag.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>index.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>getclass.js"></script>
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
                <td width="95%" class="STYLE1"><span class="STYLE3">你当前的位置</span>：[账户管理]-[学生账户]</td>
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
        <div class="query" > 
        <form name="form2" id="form2" method="get " action="/Student/index.php/Home/Admin/search_student">
        <table class="table" >
            <tr >                            
                <td  class="th" width="40" align="center" >届别</td>
                <td  class="td"  align="center"><select class="select" name="year" id="year" onchange="getclass('/Student/index.php/Home/Admin/getclass','year','class')">
                    <option value="" select="select">选择届别</option>
                    <option value="<?php echo ($date); ?>" select="select"><?php echo ($date); ?></option>
                    <option value="<?php echo ($date-1); ?>" select="select"><?php echo ($date-1); ?></option>
                    <option value="<?php echo ($date-2); ?>" select="select"><?php echo ($date-2); ?></option>
                    <option value="<?php echo ($date-3); ?>" select="select"><?php echo ($date-3); ?></option>
                    <option value="<?php echo ($date-4); ?>" select="select"><?php echo ($date-4); ?></option>
                    <option value="<?php echo ($date-5); ?>" select="select"><?php echo ($date-5); ?></option>
                    <option value="<?php echo ($date-6); ?>" select="select"><?php echo ($date-6); ?></option>
                    <option value="<?php echo ($date-7); ?>" select="select"><?php echo ($date-7); ?></option>
                    <option value="<?php echo ($date-8); ?>" select="select"><?php echo ($date-8); ?></option>
                    <option value="<?php echo ($date-9); ?>" select="select"><?php echo ($date-9); ?></option>
                    <option value="<?php echo ($date-10); ?>" select="select"><?php echo ($date-10); ?></option>
                </select></td>
                <td  class="th" width="40" align="center">班级</td>
                <td  class="td"  align="center"><select class="select" id="class" name="class">
                    <option value="0" select="select">选择班级</option>
                </select></td>
                <td class="th"><a href="#" onclick="document.getElementById('form2').submit();"><div class="th">查询</div></a></td>
      		</tr>
        
        </table>
        </form>     
        </div>
    </td>
  	
  </tr>
  
  
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="8" background="<?php echo IMG_URL ?>table/tab_12.gif">&nbsp;</td>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6">
          <tr>
            <td width="3%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center">
              <input type="checkbox" name="checkbox" value="checkbox" />
            </div></td>
            <td width="3%" height="40" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">序号</span></div></td>
            <td width="12%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">教职工号</span></div></td>
            <td width="14%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">姓名</span></div></td>
            <td width="18%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">密码</span></div></td>
            <td width="18%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">权限</span></div></td>
            <td colspan="3" width="15%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF" class="STYLE1"><div align="center">基本操作</div></td>
          </tr>
        <form id="form1" name="form1" method="post" action="/Student/index.php/Home/Admin/delete_student" >
          <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr style="color:#444;font-size:14px;">
            <td height="35" bgcolor="#FFFFFF"><div align="center">
              <input type="checkbox" name="id[]" id="s" value="<?php echo ($vo["id"]); ?>" />
            </div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE1">
              <div align="center"><?php echo ($k); ?></div>
            </div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["number"]); ?></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["name"]); ?> </span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["password"]); ?></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["power"]); ?></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span ><img src="<?php echo IMG_URL ?>table/edt.gif" width="16" height="16" />
            	<a href="/Student/index.php/Home/Admin/edit_student/id/<?php echo ($vo["id"]); ?>">编辑</a></span></div></td>

          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
         </form> 
        </table></td>
        <td width="8" background="<?php echo IMG_URL ?>table/tab_15.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>

</table>

<div class="list-page" ><?php echo ($pagelist); ?></div>
</body>
</html>