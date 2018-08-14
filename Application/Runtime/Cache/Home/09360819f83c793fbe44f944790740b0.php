<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type content=text/html; charset=utf-8" />
        <link href="<?php echo CSS_URL; ?>admin.css" type="text/css" rel="stylesheet" />
        <script language="javascript">
            function expand(el)
            {
                childobj = document.getElementById("child" + el);

                if (childobj.style.display == 'none')
                {
                    childobj.style.display = 'block';
                }
                else
                {
                    childobj.style.display = 'none';
                }
                return;
            }
        </script>
    </head>
    <body background="<?php echo IMG_URL ?>login/menu_bg.jpg" border="0" >
        <table height="100%" cellspacing="0" cellpadding="0" width="170" 
               background="<?php echo IMG_URL ?>login/menu_bg.jpg" border="0">
               <tr>
                    <td valign="top" align="middle">
                        <table cellspacing="0" cellpadding="0" width="100%" border="0">
    
                            <tr>
                                <td height="10"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
          </table>
<!--=============================================================在校生信息===========================================================================================--> <table cellspacing="0" cellpadding="0" width="150" border="0">
                        <tr height="22">
                            <td style="padding-left: 30px" background="<?php echo IMG_URL ?>login/menu_bt.jpg">
                            <a  class="menuparent" onclick="expand(1)"  href="javascript:void(0);">在校生信息</a></td></tr>
                        <tr height="4">
                            <td></td>
                            </tr>
                            
                      <table id="child1" style="display: none" cellspacing="0" cellpadding="0" 
                           width="150" border="0">
                        <tr height="20">
                            <td align="middle" width="30"><img height="9" src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild"  href="/Student/index.php/Home/Zaixiaosheng/student" target="right">学生信息</a></td></tr>
                                 <tr height="20">
                            <td align="middle" width="30"><img height="9" src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild" href="/Student/index.php/Home/Banji/class2" target="right">班级信息</a></td></tr>
                        <tr height="4">
                            <td colspan="2"></td></tr>
                      </table>
                                   
<!--=============================================================宿舍管理===========================================================================================-->                                                
                    <table cellspacing="0" cellpadding="0" width="150" border="0">
                        <tr height="22">
                            <td style="padding-left: 30px" background="<?php echo IMG_URL ?>login/menu_bt.jpg">
                            	<a class="menuparent" onclick="expand(2)" href="javascript:void(0);">宿舍管理</a></td></tr>
                        <tr height="4">
                            <td></td>
                        </tr>
                    </table>
                    <table id="child2" style="display: none" cellspacing="0" cellpadding="0" width="150" border="0">
                        <tr height="20">
                            <td align="middle" width="30"><img height="9" src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild" href="/Student/index.php/Home/Sushe/dormitory" target="right">宿舍信息</a></td></tr>
                        <tr height="20">
                            <td align="middle" width="30"><img height="9" src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild"  href="/Student/index.php/Home/fangyuan/fangyuan" target="right">房源信息</a></td></tr>
                        <tr height="4">
                            <td colspan="2"></td></tr></table>
<!--=============================================================测评及奖励===========================================================================================-->                                                
                    <table cellspacing="0" cellpadding="0" width="150" border="0">
                        <tr height="22">
                            <td style="padding-left: 30px" background="<?php echo IMG_URL ?>login/menu_bt.jpg">
                            	<a class="menuparent" onclick="expand(3)" href="javascript:void(0);">测评及奖励</a></td></tr>
                        <tr height="4">
                            <td></td></tr></table>
                    <table id="child3" style="display: none" cellspacing="0" cellpadding="0" width="150" border="0">
                        <tr height="20">
                            <td align="middle" width="30"><img height="9" src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild"  href="/Student/index.php/Home/evaluation/evaluation"  target="right">综合测评</a></td></tr>
                        <tr height="20">
                            <td align="middle" width="30"><img height="9" src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild" href="/Student/index.php/Home/Jiangcheng/enter"
                                   target="right">奖惩信息</a></td></tr>
                     </table>              
<!--=============================================================毕业生管理===========================================================================================-->                                                
                    <table cellspacing="0" cellpadding="0" width="150" border="0">
                        <tr height="22">
                            <td style="padding-left: 30px" background="<?php echo IMG_URL ?>login/menu_bt.jpg"><a  class="menuparent" onclick="expand(4)" 
                                    href="javascript:void(0);">毕业生信息</a></td></tr>
                        <tr height="4">
                            <td></td></tr></table>
                    <table id="child4" style="display: none" cellspacing="0" cellpadding="0" 
                           width="150" border="0">
                        <tr height="20">
                            <td align="middle" width="30"><img height="9" src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild" href="/Student/index.php/Home/Graduate/biyesheng" target="right">毕业生信息</a></td></tr>
                        <tr height="4">
                            <td colspan="2"></td></tr></table>
<!--=============================================================就业信息===========================================================================================-->                                                
                    <table cellspacing="0" cellpadding="0" width="150" border="0">
                        <tr height="22">
                            <td style="padding-left: 30px" background="<?php echo IMG_URL ?>login/menu_bt.jpg">
                            	<a class="menuparent" onclick="expand(5)" href="javascript:void(0);">招聘与就业</a></td></tr>
                        <tr height="4">
                            <td></td></tr></table>
                    <table id="child5" style="display: none" cellspacing="0" cellpadding="0" 
                           width="150" border="0">

                        <tr height="20">
                            <td align="middle" width="30"><img height="9" 
                                                           src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild" 
                                   href="/Student/index.php/Home/Zhaopin/zhaopin" 
                                   target="right">招聘信息</a></td></tr>
                        <tr height="20">
                            <td align="middle" width="30"><img height="9" 
                                                           src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild" 
                                   href="/Student/index.php/Home/Graduate/biyesheng" 
                                   target="right">就业信息</a></td></tr>
                        <tr height="4">
                            <td colspan="2"></td></tr></table>                          
<!--=============================================================资助信息===========================================================================================-->                                                
                    <table cellspacing="0" cellpadding="0" width="150" border="0">
                        <tr height="22">
                            <td style="padding-left: 30px" background="<?php echo IMG_URL ?>login/menu_bt.jpg"><a 
                                    class="menuparent" onclick="expand(6)" 
                                    href="javascript:void(0);">资助信息</a></td></tr>
                        <tr height="4">
                            <td></td></tr></table>
                    <table id="child6" style="display: none" cellspacing="0" cellpadding="0" width="150" border="0">

                        <tr height="20">
                            <td align="middle" width="30"><img height="9" 
                                                           src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild" 
                                   href="/Student/index.php/Home/Subsidy/Subsidy" 
                                   target="right">资助记录</a></td></tr>
                        <tr height="20">
                            <td align="middle" width="30"><img height="9" 
                                                           src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild" 
                                   href="/Student/index.php/Home/Pinkunshengku/pinkunshengku" 
                                   target="right">贫困生库</a></td></tr>
                        <tr height="4">
                            <td colspan="2"></td></tr></table>
<!--=============================================================文件管理===========================================================================================-->                                                
                    <table cellspacing="0" cellpadding="0" width="150" border="0">
                        <tr height="22">
                            <td style="padding-left: 30px" background="<?php echo IMG_URL ?>login/menu_bt.jpg"><a 
                                    class="menuparent" onclick="expand(7)" href="javascript:void(0);">文件管理</a></td></tr>
                        <tr height="4">
                            <td></td></tr></table>
                    <table id="child7" style="display: none" cellspacing="0" cellpadding="0" 
                           width="150" border="0">

                        <tr height="20">
                            <td align="middle" width="30"><img height="9" 
                                                           src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild" 
                                   href="/Student/index.php/Home/File/index" 
                                   target="right">文件列表</a></td></tr>
                        <tr height="20">
                            <td align="middle" width="30"><img height="9" 
                                                           src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild" 
                                   href="/Student/index.php/Home/File/upload" 
                                   target="right">上传文件</a></td></tr>
                        <tr height="4">
                            <td colspan="2"></td></tr></table>
                    
<!--=============================================================账户管理===========================================================================================-->                                                
                    <table cellspacing="0" cellpadding="0" width="150" border="0">
                        <tr height="22">
                            <td style="padding-left: 30px" background="<?php echo IMG_URL ?>login/menu_bt.jpg">
                            	<a class="menuparent" onclick="expand(8)" href="javascript:void(0);">账户管理</a></td></tr>
                        <tr height="4">
                            <td></td></tr></table>
                    <table id="child8" style="display: none" cellspacing="0" cellpadding="0" 
                           width="150" border="0">

                        <tr height="20">
                            <td align="middle" width="30"><img height="9" 
                                                           src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild" 
                                   href="/Student/index.php/Home/Admin/select" 
                                   target="right">账户管理</a></td></tr>
                        <tr height="20">
                            <td align="middle" width="30"><img height="9" 
                                                           src="<?php echo IMG_URL ?>login/menu_icon.gif" width="9"></td>
                            <td><a class="menuchild" 
                                   href="/Student/index.php/Home/Admin/xiugai" 
                                   target="right">修改密码</a></td></tr>
                        <tr height="4">
                            <td colspan="2"></td></tr></table>
                    
</body>
</html>