<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>学生信息</title>
<link href="<?php echo CSS_URL ?>function.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>student/index.css">
<script type="text/javascript" src="<?php echo JS_URL ?>base.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>tool.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>base_drag.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>getclass.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>student/index.js"></script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td height="30" background="<?php echo IMG_URL ?>table/tab_05.gif">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="12" height="30"><img src="<?php echo IMG_URL ?>table/tab_03.gif" width="12" height="30"/>
                    </td>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="46%" valign="middle">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="5%">
                                                <div align="center"><img src="<?php echo IMG_URL ?>table/tb.gif"
                                                                         width="16" height="16"/></div>
                                            </td>
                                            <td width="95%" class="STYLE1"><span class="STYLE3">你当前的位置</span>：[测评及奖励]-[奖惩信息]
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="54%">
                                    <table border="0" align="right" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td width="60">
                                                <table width="87%" border="0" cellpadding="0" cellspacing="0">

                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="16"><img src="<?php echo IMG_URL ?>table/tab_07.gif" width="16" height="30"/></td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="8" width="100%">
            <div class="button">
                <a href="/Student/index.php/Home/Jiangcheng/excel">
                    <div class="del"><span><img src="<?php echo IMG_URL ?>table/import.png"/></span>英语导入</div>
                </a>
            </div>
            <div class="button">
                <a href="/Student/index.php/Home/Jiangcheng/excel1">
                    <div class="del"><span><img src="<?php echo IMG_URL ?>table/import.png"/></span>计算机导入</div>
                </a>
            </div>

            <div class="button">
                <a href="/Student/index.php/Home/Jiangcheng/excel2">
                    <div class="del"><span><img src="<?php echo IMG_URL ?>table/import.png"/></span>奖惩导入</div>
                </a>
            </div>
            <div class="button">
                <a href="<?php echo U('Home/Jiangcheng/expUser');?>">
                    <div class="del"><span><img src="<?php echo IMG_URL ?>table/export.png"/></span>导出信息</div>
                </a>
            </div>

            <div class="button">

                <a href="#">
                    <div class="del" onclick="test()"><span><img src="<?php echo IMG_URL ?>table/11.gif"/></span>批量删除
                    </div>
                </a>

            </div>

		 <div class="query"> 
         <form name="form2" id="form2" method="get" action="/Student/index.php/Home/Jiangcheng/search_jiangcheng">
            <table class="table">
            <tr>

               <td class="th" width="40" align="center">学年</td>
               <td class="td" align="center"><select class="select" name="school_year">
               	   <option value=""></option>
                   <?php if(is_array($data1)): $v = 0; $__LIST__ = $data1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($v % 2 );++$v;?><option value="<?php echo ($v["school_year"]); ?>" select="select"><?php echo ($v["school_year"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select></td>
               <td class="th" width="40" align="center">学期</td>
               <td class="td" align="center"><select class="select1" name="semester">
               		<option value=""></option>
                    <option value="1" select="select">1</option>
                    <option value="2">2</option>
                </select></td>             
            
              <td  class="th" width="40" align="center" >年级</td>
                <td  class="td"  align="center"><select class="select" id="grade" name="grade" onchange="getclass('/Student/index.php/Home/Jiangcheng/getclass','grade','class')">
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
				<input type="text" name="number" class="search_input" style="height:23px;"/>
				</td>
                    <td class="th">
                	<a href="#" onclick="document.getElementById('form2').submit();"><div class="th">查询</div></a>
                </td>
      		</tr>
        
            </table>
            </form>     
            </div>
            <div class="clear"></div>

        </td>

    </tr>


    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="8" background="<?php echo IMG_URL ?>table/tab_12.gif">&nbsp;</td>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6">
                            <tr>
                                <td width="2%" height="22" background="<?php echo IMG_URL ?>table/bg.gif"
                                    bgcolor="#FFFFFF">
                                    <div align="center">
                                        <input type="checkbox" name="checkbox" value="checkbox"/>
                                    </div>
                                </td>
                                <td width="3%" height="40" background="<?php echo IMG_URL ?>table/bg.gif"
                                    bgcolor="#FFFFFF">
                                    <div align="center"><span class="STYLE1">序号</span></div>
                                </td>
                                <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
                                    <div align="center"><span class="STYLE1">学号</span></div>
                                </td>
                                <td width="5%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
                                    <div align="center"><span class="STYLE1">姓名</span></div>
                                </td>
                                <td width="5%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
                                    <div align="center"><span class="STYLE1">班级</span></div>
                                </td>
                                <td width="5%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
                                    <div align="center"><span class="STYLE1">奖学金</span></div>
                                </td>
                                <td width="5%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
                                    <div align="center"><span class="STYLE1">英语等级</span></div>
                                </td>
                                <td width="6%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
                                    <div align="center"><span class="STYLE1">计算机等级</span></div>
                                </td>
                                <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
                                    <div align="center"><span class="STYLE1">竞赛</span></div>
                                </td>
                                <td width="7%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
                                    <div align="center"><span class="STYLE1">获奖等级</span></div>
                                </td>
                                <td width="5%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
                                    <div align="center"><span class="STYLE1">评优评先</span></div>
                                </td>
                                <td width="6%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
                                    <div align="center"><span class="STYLE1">处分记录</span></div>
                                </td>
                                <td width="5%" background="<?php echo IMG_URL ?>table/bg.gif" bgcolor="#FFFFFF">
                                    <div align="center"><span class="STYLE1">备注</span></div>
                                </td>
                                <td colspan="3" width="10%" height="22" background="<?php echo IMG_URL ?>table/bg.gif"
                                    bgcolor="#FFFFFF" class="STYLE1">
                                    <div align="center">基本操作</div>
                                </td>
                            </tr>


                            <form name="form1" id="form1" method="post" action="/Student/index.php/Home/Jiangcheng/deleteAll">
                                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
                                        <td height="35" bgcolor="#FFFFFF">
                                            <div align="center">
                                                <input type="checkbox" name="id[]" id="s" value="<?php echo ($vo["id"]); ?>"/>
                                            </div>
                                        </td>
                                        <td bgcolor="#FFFFFF">
                                            <div align="center" class="STYLE1">
                                                <div align="center"><?php echo ($k); ?></div>
                                            </div>
                                        </td>
                                        <td bgcolor="#FFFFFF">
                                            <div align="center"><span><?php echo ($vo["number"]); ?></span></div>
                                        </td>
                                        <td bgcolor="#FFFFFF">
                                            <div align="center"><span><?php echo ($vo["name"]); ?> </span></div>
                                        </td>
                                        <td bgcolor="#FFFFFF">
                                            <div align="center"><span><?php echo ($vo["class"]); ?></span></div>
                                        </td>
                                        <td bgcolor="#FFFFFF">
                                            <div align="center"><span><?php echo ($vo["scholar"]); ?></span></div>
                                        </td>
                                        <td bgcolor="#FFFFFF">
                                            <div align="center"><span><?php echo ($vo["e_score"]); ?>-<?php echo ($vo["level_name"]); ?></span></div>
                                        </td>
                                        <td bgcolor="#FFFFFF">
                                            <div align="center"><span><?php echo ($vo["score"]); ?></span></div>
                                        </td>
                                        <td bgcolor="#FFFFFF">
                                            <div align="center"><span><?php echo ($vo["competition"]); ?></span></div>
                                        </td>
                                        <td bgcolor="#FFFFFF">
                                            <div align="center"><span><?php echo ($vo["award_level"]); ?></span></div>
                                        </td>
                                        <td bgcolor="#FFFFFF">
                                            <div align="center"><span><?php echo ($vo["honorary"]); ?></span></div>
                                        </td>
                                        <td bgcolor="#FFFFFF">
                                            <div align="center"><span><?php echo ($vo["punish"]); ?></span></div>
                                        </td>
                                        <td bgcolor="#FFFFFF">
                                            <div align="center"><span><?php echo ($vo["remark"]); ?></span></div>
                                        </td>
                                        <td bgcolor="#FFFFFF">
                                            <div align="center"><span><img src="<?php echo IMG_URL ?>table/edt.gif"
                                                                           width="16" height="16"/><a
                                                    href="/Student/index.php/Home/Jiangcheng/edit/id/<?php echo ($vo["id"]); ?>">编辑</a></span></div>
                                        </td>
                                        <td bgcolor="#FFFFFF">
                                            <div align="center"><span><img src="<?php echo IMG_URL ?>table/del.gif"
                                                                           width="16" height="16"/><a
                                                    href="/Student/index.php/Home/Jiangcheng/delete/id/<?php echo ($vo["id"]); ?>">删除</a></span></div>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </form>

                        </table>
                    </td>
                    <td width="8" background="<?php echo IMG_URL ?>table/tab_15.gif">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>

</table>
<div class="list-page"><?php echo ($page); ?></div>
</body>
</html>