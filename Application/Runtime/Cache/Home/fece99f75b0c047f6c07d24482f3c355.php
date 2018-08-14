<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<title>宿舍信息</title>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>student/index.css">
<script type="text/javascript" src="<?php echo JS_URL ?>base.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>tool.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>base_drag.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>getclass.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>student/index.js"></script>

<style>
body{font-size:15px;}
.right{display:block;float:right; line-height:25px;margin:5px auto 0;}
.left{display:block;float:left;}
.search_span{height:30px;background:#87CEEB;line-height:30px;position:block;color:red;}
.search_input{height:27px;line-height:27px;width:80px;font-color:#fff;border:none;}
.th{background:#328aa4;height:20px;color:#fff;}
.select{width:70px;height:27px;background:#fff;border:none;font-color:#fff;}
</style>
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
                <td width="95%" class="STYLE1"><span class="STYLE3">你当前的位置</span>：[宿舍管理]-[宿舍信息]</td>
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
                <a href="/Student/index.php/Home/Sushe/add" ><div class="tianjia" ><span><img src="<?php echo IMG_URL ?>table/22.gif"/></span>添&nbsp;&nbsp;加</div></a>
            </div>
            <div class="button login" >	<a href="#"><div class="del"><span><img src="<?php echo IMG_URL ?>table/11.gif"/></span>批量删除</div></a></div>
            <!--<div class="button" >
                <a href="#"><div class="del" onclick="test()" ><span><img src="<?php echo IMG_URL ?>table/11.gif"/></span>批量删除</div></a>
            </div>-->
             <!--<div class="button"><a href="/Student/index.php/Home/Sushe/out" ><div class="del"><span><img src="<?php echo IMG_URL ?>table/export.png"/></span>导出表</div></a></div>-->
            <div class="button out"><a href="#"><div class="del"><span><img src="<?php echo IMG_URL ?>table/export.png"/></span>导出表</div></a></div>
            <div class="button">
                <a href="/Student/index.php/Home/Sushe/in" ><div class="del"><span><img src="<?php echo IMG_URL ?>table/import.png"/></span>导入表</div></a>
            </div>
         <div class="right"> 
        <form name="form2" id="form2" method="get" action="/Student/index.php/Home/Sushe/search">
       <table class="table">
            <tr>
                <td  class="th" width="40" align="center" >楼栋</td>
                <td  class="td"  align="center"> <div class="content">
                <select class="select" id="building" name="building" >
                    <option value="0" select="select">选择楼栋</option>
                    <?php if(is_array($fang)): $i = 0; $__LIST__ = $fang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["building"]); ?>"><?php echo ($v["building"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>     
                </select></div>
                </td>
          <td  class="th" width="40" align="center" >楼层</td>      
         <td  class="td"  align="center">
             <select class="select" id="floor" name="floor" onchange="var buildings=document.getElementById('building').value;getclass('/Student/index.php/Home/Sushe/getdormitory/building/'+buildings,'floor','bnumber')" >
                <option value="0" select="select">选择楼层</option>
                 <?php if(is_array($fa)): $i = 0; $__LIST__ = $fa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vl["floor"]); ?>"><?php echo ($vl["floor"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>     
                </select></td>
                <td  class="th" width="40" align="center">宿舍</td>
                <td  class="td"  align="center"><select class="select" id="bnumber" name="bnumber">
                    <option value="0" select="select">选择寝室</option>
                </select></td>
                </tr>
                <tr>
              <td  class="th" width="40" align="center" >年级</td>
                <td  class="td"  align="center"><select class="select" id="grade" name="grade" onchange="getclass('/Student/index.php/Home/Sushe/getclass','grade','class')">
                    <option value="0" select="select">选择年级</option>
                    <option value="1" select="select">大一</option>
                    <option value="2" select="select">大二</option>
                    <option value="3" select="select">大三</option>
                    <option value="4" select="select">大四</option>
                </select></td>
                
                <td  class="th" width="40" align="center">班级</td>
                <td  class="td"  align="center"><select class="select" id="class" name="class">
                    <option value="0" select="select">选择班级</option>
                </select></td>

				<td  class="th" width="40" align="center">学号</td>
                <td  class="td"  align="center">
				<input type="text" name="number" class="search_input"/>
				</td>
                    <td class="th">
                	<a href="#" onclick="document.getElementById('form2').submit();"><div class="th">查询</div></a>
                </td>
      		</tr>
        
        </table>
        </form>     
        </div>      
    </td> 
  </tr>
  
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="8" background="<?php echo IMG_URL ?>table/tab_12.gif">&nbsp;</td>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6">
          <tr>
            <td width="3%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center">
              <input type="checkbox" name="checkbox" value="checkbox" />
            	</div></td>
            <td width="3%" height="40" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">序号</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">学院</span></div></td>
            <td width="10%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">专业</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">班级</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">学号</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">姓名</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">性别</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">校区</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">楼栋</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">楼层</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">宿舍</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">床位</span></div></td>
            <td colspan="3" width="10%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF" class="STYLE1"><div align="center">基本操作</div></td>
          </tr>
    <form id="form1" name="form1" method="post" action="/Student/index.php/Home/Sushe/delete" >
         <?php if(is_array($d)): $k = 0; $__LIST__ = $d;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr style="color:#444;font-size:14px;">
            <td height="35" bgcolor="#FFFFFF"><div align="center">
              <input type="checkbox" name="id[]" id="s" value="<?php echo ($vo["id"]); ?>" />
            </div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE1">
              <div align="center"><?php echo ($k); ?></div>
            </div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["xueyuan"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["major"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["class"]); ?> </span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["number"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["name"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["sex"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["school"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["building"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["floor"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["bnumber"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["bed"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><img src="<?php echo IMG_URL ?>table/edt.gif" width="16" height="16" /><a href="/Student/index.php/Home/Sushe/edit/number/<?php echo ($vo["number"]); ?>">编辑</a></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><img src="<?php echo IMG_URL ?>table/del.gif" width="16" height="16" />
            <a  href="#" class="del1"  del_href="/Student/index.php/Home/Sushe/del/id/<?php echo ($vo["id"]); ?>">删除</a></span></div></td>
            
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
       </form>	         
        </table></td>
        <td width="8" background="<?php echo IMG_URL ?>table/tab_15.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
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
    <form name="form_out" id="form_out" method="get" action="/Student/index.php/Home/Sushe/out">
	<div class="info"></div>
    <div class="query_out" style="padding:20px 0px 20px 0px;">
        <table class="table">
            <tr>
                <td  class="th" width="40" align="center" >楼栋</td>
                <td  class="td"  align="center"> <div class="content">
                <select class="select" id="building_out" name="building" >
                    <option value="0" select="select">选择楼栋</option>
                    <?php if(is_array($fang)): $i = 0; $__LIST__ = $fang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v1["building"]); ?>"><?php echo ($v1["building"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>     
                </select></div>
                </td>
              <td  class="th" width="40" align="center" >楼层</td>      
              <td  class="td"  align="center">
                 <select class="select" id="floor_out" name="floor" onchange="var buildings=document.getElementById('building_out').value;getclass('/Student/index.php/Home/Sushe/getdormitory/building/'+buildings,'floor_out','bnumber_out')" >
                    <option value="0" select="select">选择楼层</option>
                 <?php if(is_array($fa)): $i = 0; $__LIST__ = $fa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl1): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vl1["floor"]); ?>"><?php echo ($vl1["floor"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>     
                </select></td>
                <td  class="th" width="40" align="center">宿舍</td>
                <td  class="td"  align="center"><select class="select" id="bnumber_out" name="bnumber_out">
                    <option value="0" select="select">选择寝室</option>
                </select></td>
                </tr>
                <tr>
              <td  class="th" width="40" align="center" >年级</td>
                <td  class="td"  align="center"><select class="select" id="grade_out" name="grade" onchange="getclass('/Student/index.php/Home/Sushe/getclass','grade_out','class_out')">
                    <option value="0" select="select">选择年级</option>
                    <option value="1" select="select">大一</option>
                    <option value="2" select="select">大二</option>
                    <option value="3" select="select">大三</option>
                    <option value="4" select="select">大四</option>
                </select></td>
                
                <td  class="th" width="40" align="center">班级</td>
                <td  class="td"  align="center"><select class="select" id="class_out" name="class">
                    <option value="0" select="select">选择班级</option>
                </select></td>

				<td  class="th" width="40" align="center">学号</td>
                <td  class="td"  align="center">
				<input type="text" name="number" class="search_input"/>
				</td>
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