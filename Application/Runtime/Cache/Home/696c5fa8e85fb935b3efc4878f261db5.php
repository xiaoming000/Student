<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<title>就业信息</title>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>student/index.css">
<script type="text/javascript" src="<?php echo JS_URL ?>base.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>tool.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>base_drag.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>getclass.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>student/index.js"></script>
<style type="text/css">

.right{display:block;float:right; line-height:25px;margin:5px auto 0;}
.left{display:block;float:left;}
.search_span{height:30px;background:#87CEEB;line-height:30px;position:block;color:red;}
.search_input{height:27px;line-height:27px;width:100px;font-color:#fff;border:none;}
.th{background:#328aa4;height:20px;color:#fff;}
.select{width:100px;height:27px;background:#fff;border:none;font-color:#fff;}
</style>
<script type="text/jscript">
function test()
{
    document.getElementById("form1").submit();
}
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
                <td width="95%" class="STYLE1"><span class="STYLE3">你当前的位置</span>：[毕业生就业信息]</td>
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
        	<a href="/Student/index.php/Home/Graduate/add" ><div class="tianjia" ><span><img src="<?php echo IMG_URL ?>table/22.gif"/></span>添&nbsp;&nbsp;加</div></a>
        </div>
		<!--<div class="button" ><a href="#"><div class="del" onclick="test()" ><span><img src="<?php echo IMG_URL ?>table/11.gif"/></span>批量删除</div></a></div>-->
<!--        <div class="button">
            <a href="<?php echo U('Home/Graduate/expUser');?>" >
            <div class="del"><span><img src="<?php echo IMG_URL ?>table/export.png"/></span>导出表</div></a>
        </div>-->
		<div class="button login" >	<a href="#"><div class="del"><span><img src="<?php echo IMG_URL ?>table/11.gif"/></span>批量删除</div></a></div> 
             
        <div class="button out"><a href="#"><div class="del"><span><img src="<?php echo IMG_URL ?>table/export.png"/></span>导出表</div></a></div>
        
        <div class="button">
            <a href="/Student/index.php/Home/Graduate/excel" ><div class="del"><span><img src="<?php echo IMG_URL ?>table/import.png"/></span>导入表</div></a>
        </div>
<div class="right">
        <form name="form2" id="form2" method="get" action="/Student/index.php/Home/Graduate/search">
        <table class="table" >
            <tr>
                <td  class="th" width="40" align="center" >届别</td>
                <td  class="td"  align="center"><select class="select" name="year" id="year" onchange="getclass('/Student/index.php/Home/Graduate/getclass','year','class')">
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
                </select>
                </td>
                <td  class="th" width="40" align="center">班级</td>
                <td  class="td"  align="center"><select class="select" id="class" name="class">
                <option value="0" select="select">选择班级</option>
                </select></td>

        <td  class="th" width="80" align="center" >就业性质</td>
          <td  width="80"   align="center">
          <select class="select" id="work_type" name="work_type">
            <option value="">选择就业性质</option>
            <option value=" ">            </option>
            <option value="机关">机关</option>
            <option value="科研设计单位">科研设计单位</option>
            <option value="高等教育单位">高等教育单位</option>
            <option value="中初教育单位">中初教育单位</option>
            <option value="医疗卫生单位">医疗卫生单位</option>
            <option value="其他事业单位">其他事业单位</option>
            <option value="国有企业">国有企业</option>
            <option value="三资企业">三资企业</option>
            <option value="部队">部队</option>
            <option value="农村建制村">农村建制村</option>
            <option value="城镇社区">城镇社区</option>
            <option value="其他企业">其他企业</option>
          </select></td>

        <td  class="th" width="40" align="center">学号</td>
                <td   width="40"  align="center">
        <input type="text" name="s_number" class="search_input" placeholder=""/>
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
            <td width="1%" height="15" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center">
              <input type="checkbox" id="checkbox_del" name="checkbox" value="checkbox" onclick="swapCheck()"/>
            	</div></td>
            <td width="3%" height="40" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">序号</span></div></td>
            <td width="4%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">姓名</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">学号</span></div></td>
            <td width="3%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">性别</span></div></td>
            <td width="4%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">班级</span></div></td>
            <td width="10%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">专业</span></div></td>
            <td width="11%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">就业单位</span></div></td>
            <td width="11%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">职务</span></div></td>
            <td width="8%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">单位性质</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">手机号码</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">QQ号</span></div></td>
            <td width="4%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">班主任</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">QQ群号</span></div></td>
            <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">更新时间</span></div></td>
            <td colspan="3" width="5%" height="22" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF" class="STYLE1"><div align="center">基本操作</div></td>
          </tr>

          <form name="form1" id="form1" method="post" action="/Student/index.php/Home/Graduate/delete">
          <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr style="color:#444;font-size:14px;">

            <td height="35" bgcolor="#FFFFFF"><div align="center">
              <input type="checkbox" name="id[]" id="s" value="<?php echo ($vo["id"]); ?>" />
            </div></td>
            <td bgcolor="#FFFFFF"><div align="center" class="STYLE1"><div align="center"><?php echo ($k); ?></div></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["s_name"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["s_number"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["sex"]); ?> </span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["class"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["professional"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["work_unit"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["work_post"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["work_type"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["phone"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["qq"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["name"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["qqq"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><?php echo ($vo["time"]); ?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span ><a href="/Student/index.php/Home/Graduate/edit/id/<?php echo ($vo["id"]); ?>">
                <img src="<?php echo IMG_URL ?>table/edt.gif" width="16" height="16" /></a></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center" ><span ><a href="#" class="del1"  del_href="/Student/index.php/Home/Graduate/del/id/<?php echo ($vo["id"]); ?>">
            	<img src="<?php echo IMG_URL ?>table/del.gif" width="16" height="16" /></a></span></div></td>

          </tr><?php endforeach; endif; else: echo "" ;endif; ?>

          </form>
        </table></td>
        <td width="8" background="<?php echo IMG_URL ?>table/tab_15.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<div class="list-page" ><?php echo ($pagelist); ?></div>
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
         <form name="form_out" id="form_out" method="get" action="/Student/index.php/Home/Graduate/expUser">
	<div class="info"></div>
    <div class="query_out" style="padding:10px 40px 10px 100px;" >
        <table class="table" >
            <tr>
                <td  class="th" width="40" align="center" >届别</td>
                <td  class="td"  align="center"><select class="select" name="year" id="year_out" onchange="getclass('/Student/index.php/Home/Graduate/getclass','year_out','class_out')">
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
                </select>
                </td></tr>
                <tr>
                <td  class="th" width="40" align="center">班级</td>
                <td  class="td"  align="center"><select class="select" id="class_out" name="class">
                <option value="0" select="select">选择班级</option>
                </select></td></tr>
		<tr>
        <td  class="th" width="80" align="center" >就业性质</td>
          <td  width="80" class="td"  align="center">
          <select class="select" id="work_type1" name="work_type">
            <option value="">选择就业性质</option>
            <option value=" ">            </option>
            <option value="机关">机关</option>
            <option value="科研设计单位">科研设计单位</option>
            <option value="高等教育单位">高等教育单位</option>
            <option value="中初教育单位">中初教育单位</option>
            <option value="医疗卫生单位">医疗卫生单位</option>
            <option value="其他事业单位">其他事业单位</option>
            <option value="国有企业">国有企业</option>
            <option value="三资企业">三资企业</option>
            <option value="部队">部队</option>
            <option value="农村建制村">农村建制村</option>
            <option value="城镇社区">城镇社区</option>
            <option value="其他企业">其他企业</option>
          </select></td>
		</tr><tr>
        <td  class="th" width="40" align="center">学号</td>
                <td   width="40"  align="center">
        <input type="text" name="s_number" class="search_input" placeholder=""/>
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