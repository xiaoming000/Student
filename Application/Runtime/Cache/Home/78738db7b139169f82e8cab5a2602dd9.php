<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
<title>管理员账户</title>
<script type="text/javascript" src="<?php echo JS_URL ?>getclass.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>student/index.css">
<script type="text/javascript" src="<?php echo JS_URL ?>base.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>tool.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>base_drag.js"></script>
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
 <table  width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" background="<?php echo IMG_URL ?>table/tab_05.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="30"><img src="<?php echo IMG_URL ?>table/tab_03.gif" width="12" height="30" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="46%" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="5%"><div align="center"><img src="<?php echo IMG_URL ?>table/tb.gif" width="16" height="16" /></div></td>
                <td width="95%" class="STYLE1"><span class="STYLE3">你当前的位置</span>：[资助信息]-[贫困生库]</td>
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
        	<a href="/Student/index.php/Home/Pinkunshengku/add" ><div class="tianjia" ><span><img src="<?php echo IMG_URL ?>table/22.gif"/></span>添&nbsp;&nbsp;加</div></a>
        </div>
  
		<div class="button login" >	<a href="#"><div class="del"><span><img src="<?php echo IMG_URL ?>table/11.gif"/></span>批量删除</div></a>
		</div> 
             
        <div class="button out"><a href="#"><div class="del"><span><img src="<?php echo IMG_URL ?>table/export.png"/></span>导出表</div></a>
		</div>

        
        <div class="button">
            <a href="/Student/index.php/Home/Pinkunshengku/in" ><div class="del"><span><img src="<?php echo IMG_URL ?>table/import.png"/></span>导入表</div></a>
        </div>

		<div class="right"> 
        <form name="form2" id="form2" method="post" action="/Student/index.php/Home/Pinkunshengku/search">
        <table class="table" >
            <tr>
                 <td  class="th" width="40" align="center" >学年</td>
                <td  class="td"  align="center"><select class="select" name="school_year">
					<option> </option>
                    <option value="<?php echo ($date); ?>-<?php echo ($date+1); ?>" select="select"><?php echo ($date); ?>-<?php echo ($date+1); ?></option>
					<option value="<?php echo ($date-1); ?>-<?php echo ($date); ?>" select="select"><?php echo ($date-1); ?>-<?php echo ($date); ?></option>
					<option value="<?php echo ($date-2); ?>-<?php echo ($date-1); ?>" select="select"><?php echo ($date-2); ?>-<?php echo ($date-1); ?></option>
					<option value="<?php echo ($date-3); ?>-<?php echo ($date-2); ?>" select="select"><?php echo ($date-3); ?>-<?php echo ($date-2); ?></option>
                </select></td>

				<td  class="th" width="40" align="center" >年级</td>
                <td  class="td"  align="center"><select class="select" id="grade" name="grade" onchange="getclass('/Student/index.php/Home/Pinkunshengku/getclass','grade','class')">
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

				<td  class="th" width="40" align="center" >状态</td>
                <td  class="td"  align="center"><select class="select" id="state" name="state">
					<option value="0" select="select">全部</option>
                    <option value="出库" select="select">出库</option>
                    <option value="入库" select="select">入库</option>
                </select></td>

				<td  class="th" width="40" align="center">学号</td>
                <td  class="td"  align="center">
				<input type="text" name="stuid" class="search_input"/>
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
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td width="8" background="<?php echo IMG_URL ?>table/tab_12.gif">&nbsp;</td>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6" >
          <tr>
            <td width="3%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
            	<div align="center">
              		<input type="checkbox" name="checkbox" value="checkbox" onclick="swapCheck()"/>
            	</div></td>
            <td width="3%" height="40" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">序号</span></div></td>
            <td width="8%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">学号</span></div></td>
            <td width="8%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">姓名</span></div></td>
			<td width="3%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">性别</span></div></td>
			<td width="14%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">身份证号</span></div></td>
            <td width="14%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">专业</span></div></td>
            <td width="5%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">班级</span></div></td>
			<td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">认定等次</span></div></td>
			<td width="6%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">在库状态</span></div></td>
			<td width="8%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">入库时间</span></div></td>
			<td width="8%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">出库时间</span></div></td>
            <td colspan="3" width="15%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF" class="STYLE1"><div align="center">基本操作</div></td>
          </tr>
<form id="form1" name="form1" method="get" action="/Student/index.php/Home/Pinkunshengku/del" >         
          <?php if(is_array($pin)): $k = 0; $__LIST__ = $pin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr >
            <td height="35" bgcolor="#FFFFFF"><div align="center">
              <input type="checkbox" name="id[]" id="s" value="<?php echo ($vo["id"]); ?>" />
            </div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE1">
              <div align="center"><?php echo ($k); ?></div>
            </div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["stuid"]); ?></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["name"]); ?> </span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["sex"]); ?></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["id_number"]); ?></span></div></td>
			<td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["professional"]); ?></span></div></td>
			<td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["class"]); ?></span></div></td>
			<td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["grade"]); ?></span></div></td>
			<td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["state"]); ?></span></div></td>
			<td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["in_time"]); ?></span></div></td>
			<td height="20" bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["out_time"]); ?></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span ><img src="<?php echo IMG_URL ?>table/edt.gif" width="16" height="16" />
            	<a href="/Student/index.php/Home/Pinkunshengku/edit/id/<?php echo ($vo["id"]); ?>">编辑</a></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span ><img src="<?php echo IMG_URL ?>table/del.gif" width="16" height="16" />
            <a href="#" class="del1"  del_href="/Student/index.php/Home/Pinkunshengku/del/id/<?php echo ($vo["id"]); ?>">删除</span></div></td>

          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</form>        
        </table></td>
        <td width="8" background="<?php echo IMG_URL ?>table/tab_15.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>

</table>
<div class="list-page" ><?php echo ($list); ?></div>



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
  <form name="form_out" id="form_out" method="get" action="/Student/index.php/Home/Pinkunshengku/out">
    <div class="query_out" style="padding:10px 40px 10px 125px;">
        <table class="table"  >
            <tr>
                 <td  class="th" width="40" align="center" >学年</td>
                <td  class="td"  align="center"><select class="select" name="school_year">
					<option> </option>
                    <option value="<?php echo ($date); ?>-<?php echo ($date+1); ?>" select="select"><?php echo ($date); ?>-<?php echo ($date+1); ?></option>
					<option value="<?php echo ($date-1); ?>-<?php echo ($date); ?>" select="select"><?php echo ($date-1); ?>-<?php echo ($date); ?></option>
					<option value="<?php echo ($date-2); ?>-<?php echo ($date-1); ?>" select="select"><?php echo ($date-2); ?>-<?php echo ($date-1); ?></option>
					<option value="<?php echo ($date-3); ?>-<?php echo ($date-2); ?>" select="select"><?php echo ($date-3); ?>-<?php echo ($date-2); ?></option>
                </select></td>
			</tr>
			<tr>
				<td  class="th" width="40" align="center" >年级</td>
                <td  class="td"  align="center"><select class="select" id="grade2" name="grade2" onchange="getclass('/Student/index.php/Home/Pinkunshengku/getclass','grade2','class2')">
					<option value="" >选择年级</option>
                    <option value="1" >大一</option>
                    <option value="2" >大二</option>
					<option value="3" >大三</option>
					<option value="4" >大四</option>
                </select></td>
             </tr> 
			 <tr>
                <td  class="th" width="40" align="center">班级</td>
                <td  class="td"  align="center"><select class="select" id="class2" name="class2">
                    <option value="" >选择班级</option>
                </select></td>
			 </tr>
			 <tr>
				<td  class="th" width="40" align="center" >状态</td>
                <td  class="td"  align="center"><select class="select" id="state2" name="state2">
					<option value="" >全部</option>
                    <option value="出库" >出库</option>
                    <option value="入库" >入库</option>
                </select></td>
			 </tr>
			 <tr>
				<td  class="th" width="40" align="center">学号</td>
                <td  class="td"  align="center">
				<input type="text" name="stuid" class="search_input"/>
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