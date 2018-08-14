<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<title>招聘信息</title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>index.css">
    <script type="text/javascript" src="<?php echo JS_URL ?>getclass.js"></script>
    <script type="text/javascript" src="<?php echo JS_URL ?>base.js"></script>
    <script type="text/javascript" src="<?php echo JS_URL ?>tool.js"></script>
    <script type="text/javascript" src="<?php echo JS_URL ?>base_drag.js"></script>
    <script type="text/javascript" src="<?php echo JS_URL ?>index.js"></script>

<script type="text/jscript">
function select1(){ document.getElementById("form_1").submit();}
</script>
<script type="text/jscript">
function test(){ document.getElementById("form1").submit();}
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
                <td width="95%" class="STYLE1"><span class="STYLE3">你当前的位置</span>：[招聘与就业]-[招聘信息]</td>
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
        	<a href="/Student/index.php/Home/Zhaopin/add" ><div class="tianjia" ><span><img src="<?php echo IMG_URL ?>table/22.gif"/></span>添&nbsp;&nbsp;加</div></a>
        </div>
		<div class="button" >
        	<a href="#"><div class="del" onclick="test()" ><span><img src="<?php echo IMG_URL ?>table/11.gif"/></span>批量删除</div></a>
        </div>
    <div class="button">
            <a href="<?php echo U('Home/Zhaopin/expUser');?>" >
            <div class="del"><span><img src="<?php echo IMG_URL ?>table/export.png"/></span>导出表</div></a>
        </div>
        
    <div class="button">
            <a href="/Student/index.php/Home/Zhaopin/excel" ><div class="del"><span><img src="<?php echo IMG_URL ?>table/import.png"/></span>导入表</div></a>
        </div>
    </td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="8" background="<?php echo IMG_URL ?>table/tab_12.gif">&nbsp;</td>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6" >
          <tr>
              <td width="1%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
                  <div align="center">
                      <input type="checkbox" id="checkbox_del" name="checkbox" value="checkbox" onclick="swapCheck()"/>
                  </div></td>
            <td width="2%" height="40" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">序号</span></div></td>
            <td width="6%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">公司名称</span></div></td>
            <td width="3%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">学历要求</span></div></td>
            <td width="6%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">需求专业</span></div></td>
            <td width="5%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">拟安排岗位</span></div></td>
            <td width="3%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">招聘人数</span></div></td>
            <td width="2%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">待遇</span></div></td>
            <td width="4%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">单位联系人</span></div></td>
            <td width="4%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">单位联系方式</span></div></td>
            <td width="10%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">招聘简章</span></div></td>
            <td colspan="3" width="5%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF" class="STYLE1"><div align="center">基本操作</div></td>
          </tr>
          
    <form name="form1" id="form1" method="post" action="/Student/index.php/Home/Zhaopin/delete">
          <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr style="color:#444;font-size:14px;">
          
            <td height="35" bgcolor="#FFFFFF"><div align="center"><input class="id" type="checkbox" name="id[]"  value="<?php echo ($vo["id"]); ?>" /></div></td>
            <td bgcolor="#FFFFFF"><div align="center" class="STYLE1"><div align="center"><?php echo ($k); ?></div></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["company_name"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["degree"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["major"]); ?> </span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["job"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["number"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["pay"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["contact_people"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["tel"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><a href="<?php echo ($vo["zpjz"]); ?>"><?php echo ($vo["zpjz"]); ?></a></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><img src="<?php echo IMG_URL ?>table/edt.gif" width="16" height="16" /><a href="/Student/index.php/Home/Zhaopin/edit/id/<?php echo ($vo["id"]); ?>">编辑</a></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center" ><span ><img src="<?php echo IMG_URL ?>table/del.gif" width="16" height="16" />
              <a href="#" class="del1"  del_href="/Student/index.php/Home/Zhaopin/del/id/<?php echo ($vo["id"]); ?>">删除</a></span></div></td>
            
          </tr><?php endforeach; endif; else: echo "" ;endif; ?></form>
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


<!--====================================== 删除DIV ============================================-->

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







<div id="loading">
    <p>加载中</p>
</div>

<div id="success">
    <p>成功</p>
</div>

<div id="screen"></div>
</body>
</html>