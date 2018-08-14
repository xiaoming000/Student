<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>学生信息</title>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>student/index.css">
<script type="text/javascript" src="<?php echo JS_URL ?>base.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>tool.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>base_drag.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>getclass.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>student/index.js"></script>
<style type="text/css"></style>
</head>

<style>
</style>
<body>
   

  <tr>
    <td height="30" background="<?php echo IMG_URL ?>table/tab_05.gif">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="30"><img src="<?php echo IMG_URL ?>table/tab_03.gif" width="12" height="30" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="46%" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="5%"><div align="center"><img src="<?php echo IMG_URL ?>table/tb.gif" width="16" height="16" /></div></td>
                <td width="95%" class="STYLE1"><span class="STYLE3">你当前的位置</span>：[在校生基本信息]-[学生信息]</td>
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
    </table>
    </td>
  </tr>
  
  <tr>
  	<td  colspan="9" width="100%">
    	<div class="button" ><a href="/Student/index.php/Home/Zaixiaosheng/add" ><div class="tianjia" ><span><img src="<?php echo IMG_URL ?>table/22.gif"/></span>添&nbsp;&nbsp;加</div></a></div>
		<div class="button login" >	<a href="#"><div class="del"><span><img src="<?php echo IMG_URL ?>table/11.gif"/></span>批量删除</div></a></div> 
             
        <div class="button out"><a href="#"><div class="del"><span><img src="<?php echo IMG_URL ?>table/export.png"/></span>导出表</div></a></div>

<!--            <a href="<?php echo U('Home/Zaixiaosheng/expUser');?>" >
            <div class="del"><span><img src="<?php echo IMG_URL ?>table/export.png"/></span>导出表</div></a>--> 
       
        
        <div class="button"><a href="/Student/index.php/Home/Zaixiaosheng/excel" ><div class="del"><span><img src="<?php echo IMG_URL ?>table/import.png"/></span>导入表</div></a></div>
		 <div class="query"> 
         <form name="form2" id="form2" method="get" action="/Student/index.php/Home/Zaixiaosheng/search">
            <table class="table">
            <tr>
              <td  class="th" width="40" align="center" >年级</td>
                <td  class="td"  align="center"><select class="select" id="grade" name="grade" onchange="getclass('/Student/index.php/Home/Zaixiaosheng/getclass','grade','class')">
					<option value="0" select="select">选择年级</option>
                    <option value="1" select="select">大一</option>
                    <option value="2" select="select">大二</option>
					<option value="3" select="select">大三</option>
					<option value="4" select="select">大四</option>
                </select></td>
                
                <td  class="th" width="40" align="center">班级</td>
                <td  class="td"  align="center"><select class="select" id="class" name="class"> <option value="0" select="select">选择班级</option></select></td>

				<td  class="th" width="40" align="center">学号</td>
                <td  class="td"  align="center"><input type="text" name="number" class="search_input" style="height:23px;"/></td>
                <td class="th"><a href="#" onclick="document.getElementById('form2').submit();"><div class="th">查询</div></a> </td>
      		</tr>
        
            </table>
        </form>     
        </div>
    </td>
  </tr>
   <form id="form1" name="form1" method="post" action="/Student/index.php/Home/Zaixiaosheng/delete" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
      
        <td width="1000"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6">
          <tr>
            <td width="3%" height="22" rowspan="2" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
            	<div align="center">
              		<input type="checkbox" id="checkbox_del" name="checkbox" value="checkbox" onclick="swapCheck()"/>
            	</div></td>
            <td width="2%" rowspan="2" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">序号</span></div></td>
            <td width="4%" rowspan="2" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">姓名</span></div></td>
            <td width="4%" rowspan="2" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">班级</span></div></td>
            <td width="10%" colspan="4" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">学生基本信息</span></div></td>
            <td width="14%" colspan="7" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">学生奖惩信息</span></div></td>
            <td width="7%" rowspan="2" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"> <span class="STYLE1"> 学籍异动</span></div></td>
            <td width="7%" colspan="3" rowspan="2" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">基本操作</span></div></td>
           
          </tr>
          <tr>
           <td width="5%" height="25" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">学号</span></div></td>
            <td width="8%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">专业</span></div></td>
            <td width="3%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">性别</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">身份证号</span></div></td>
            <td width="4%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">奖学金</span></div></td>
            <td width="5%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">英语等级</span></div></td>
            <td width="3%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">NCRE</span></div></td>
            <td width="10%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">竞赛名称</span></div></td>
            <td width="5%"  background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">获奖等级</span></div></td>
            <td width="8%"  background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">评优评先</span></div></td>
            <td width="6%"  background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">处分记录</span></div></td>
             
          </tr>
          
		 
          <?php if(is_array($s)): $k = 0; $__LIST__ = $s;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr style="color:#444;font-size:14px;">
            <td height="15" bgcolor="#FFFFFF"><div align="center">
               <input class="id" type="checkbox" name="id[]"  value="<?php echo ($vo["id"]); ?>" /></div></td>
            <td  bgcolor="#FFFFFF"><div align="center" class="STYLE1"><div align="center"><?php echo ($k); ?></div></div></td>
            <td  bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["name"]); ?></span></div></td>
            <td  bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["class"]); ?> </span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["number"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["professional"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["sex"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["id_number"]); ?></span></div></td>
            <td  bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["scholar"]); ?></span></div></td>
            <td  bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["e_score"]); ?>-<?php echo ($vo["level_name"]); ?></span></div></td>
            <td  bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["score"]); ?></span></div></td>
            <td  bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["competition"]); ?></span></div></td>
            <td  bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["award_level"]); ?></span></div></td>
            <td  bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["honorary"]); ?></span></div></td>
            <td  bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["punish"]); ?></span></div></td>
            <td  bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["school_roll"]); ?></span></div></td>
            <td  bgcolor="#FFFFFF"><div align="center"><span >
            	<a href="/Student/index.php/Home/Zaixiaosheng/account_query/id/<?php echo ($vo["id"]); ?>"><img src="<?php echo IMG_URL ?>table/select.png"  /></a></span></div></td>
            <td  bgcolor="#FFFFFF"><div align="center"><span >
               <a href="/Student/index.php/Home/Zaixiaosheng/edit/number/<?php echo ($vo["number"]); ?>"><img src="<?php echo IMG_URL ?>table/edt.gif"  /></a></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center" ><span >
                <a href="#" class="del1"  del_href="/Student/index.php/Home/Zaixiaosheng/del/id/<?php echo ($vo["id"]); ?>"><img src="<?php echo IMG_URL ?>table/del.gif" width="16" height="16" /></a></span></div></td>
 
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          
        </table></td>
       <!-- <td width="8" background="<?php echo IMG_URL ?>table/tab_15.gif">&nbsp;</td>-->
      </tr>
    </table></td>
  </tr>
  </form>



<div class="list-page" ><?php echo ($page); ?></div>
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
<!--====================================== 导出DIV ============================================ -->

<div id="out">
	<h2><img src="<?php echo IMG_URL ?>images/close.png" alt="" class="close" />请选择需要导出的记录</h2>
         <form name="form_out" id="form_out" method="get" action="/Student/index.php/Home/Zaixiaosheng/expUser">
	<div class="info"></div>
    <div class="query_out">
            <table class="table">
            <tr>
              <td  class="th" width="40" align="center" >年级</td>
                <td  class="td"  align="center"><select class="select" id="grade_out" name="grade" onchange="getclass('/Student/index.php/Home/Zaixiaosheng/getclass','grade_out','class_out')">
					<option value="0" select="select">选择年级</option>
                    <option value="1" select="select">大一</option>
                    <option value="2" select="select">大二</option>
					<option value="3" select="select">大三</option>
					<option value="4" select="select">大四</option>
                </select></td>
            </tr>
            <tr> 
                <td  class="th" width="40" align="center">班级</td>
                <td  class="td"  align="center"><select class="select" id="class_out" name="class"> <option value="0" select="select">选择班级</option></select></td>

			</tr>
            <tr>
            	<td  class="th" width="40" align="center">学号</td>
                <td  class="td"  align="center"><input type="text" name="number" class="search_input" style="height:23px;"/></td>
                <!--<td class="th"><a href="#" onclick="document.getElementById('form2').submit();"><div class="th">查询</div></a> </td>-->
            </tr>
        
            </table>
    </div>
    <div class="sub_out">
        <input type="button" class="sub" name="sub" style="width:80px;height:30px;font-size:18px;"  value="确认"/>&ensp;&ensp;
        <input type="button" class="reset" name="reset" style="width:80px;height:30px;font-size:18px;" value="取消"/>
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