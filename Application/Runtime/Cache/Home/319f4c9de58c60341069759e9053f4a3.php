<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<title>无标题文档</title>
    <link href="<?php echo CSS_URL ?>style.css" type="text/css" rel="stylesheet"/><!--小窗口样式-->
<link href="<?php echo CSS_URL ?>function.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="../../../../Public/css/style.css" type="text/css">

<script type="text/javascript" src="<?php echo JS_URL ?>tanceng/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>tanceng/popup_layer.js"></script>
<script type="text/javascript" src="<?php echo JS_URL ?>function.js"></script>
<style>
table
  {
  border-collapse:collapse;
  }
table, th, td
  {
  border: 1px solid #2F4056;
  }
input{width:100%;height:35px;border:0px;}
</style>
</head>
<body>
 <div class="box" align="center" >
    <form action="/Student/index.php/Home/Zaixiaosheng/account_query/id/36" method="post">
   <!--设置一个隐藏域给修改控制器传递id值-->
   <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
   <capital><b><h2>学生个人信息查询表</h2></b></capital>
    <table width="900" height="330" border="1" cellpadding="0" cellspacing="0" bgcolor="b5d6e6" >
       
         <tr>
        <th width="122"  class="my_ziti">学号</th>
        <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["number"]); ?></span></div></td>
        <th width="122" class="my_ziti">民族</th>
        <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["nationality"]); ?></span></div></td>
        <th width="122"  class="my_ziti">身份证号</th>
        <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["id_number"]); ?></span></div></td>
        <th width="122" class="my_ziti">英语等级</th>
        <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["e_score"]); ?>-<?php echo ($list["level_name"]); ?></span></div></td>
      </tr>
         <tr>
       <th width="122" class="my_ziti">姓名</th>
       <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["name"]); ?></span></div></td>
       <th width="122" class="my_ziti">政治面貌</th>
       <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["political_status"]); ?></span></div></td>
       <th width="122" class="my_ziti">父亲姓名</th>
       <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["father_name"]); ?></span></div></td>
       <th width="122" class="my_ziti">英语六级</th>
       <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["score"]); ?></span></div></td>
      </tr>
         <tr>
       <th width="122" class="my_ziti">性别</th>
       <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["sex"]); ?></span></div></td>
       <th width="122" class="my_ziti">培养层次</th>
       <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["education_level"]); ?></span></div></td>
       <th width="122" class="my_ziti">母亲姓名</th>
       <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["mother_name"]); ?></span></div></td>
       <th width="122" class="my_ziti">学籍异动</th>
       <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["school_roll"]); ?></span></div></td>
      </tr>
         <tr>
       <th width="122" class="my_ziti">专业</th>
       <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["professional"]); ?></span></div></td>
       <th width="122" class="my_ziti">出生日期</th>
       <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["birthday"]); ?></span></div></td>
       <th width="122" class="my_ziti">家庭地址</th>
       <td colspan="3" bgcolor="#FFFFFF"><div><span ><?php echo ($list["home_address"]); ?></span></div></td>
      </tr>
          <tr>
       <th width="122" class="my_ziti">班级</th>
       <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["class"]); ?></span></div></td>
       <th width="122" class="my_ziti">家庭电话</th>
       <td  bgcolor="#FFFFFF"><div><span ><?php echo ($list["home_tel"]); ?></span></div></td>
       <th width="122" class="my_ziti">父亲单位</th>
       <td colspan="3" bgcolor="#FFFFFF"><div><span ><?php echo ($list["father_unit"]); ?></span></div></td>
      </tr>
        <tr>
       <th width="122" class="my_ziti">计算机等级</th>
       <td colspan="3" bgcolor="#FFFFFF"><div><span ><?php echo ($list["score"]); ?></span></div></td>
       <th width="122" class="my_ziti">母亲单位</th>
       <td colspan="3" bgcolor="#FFFFFF"><div><span ><?php echo ($list["mother_unit"]); ?></span></div></td>
       </tr>
        <tr>
       <th width="122" class="my_ziti">奖学金</th>
       <td colspan="7" bgcolor="#FFFFFF"><div><span ><?php echo ($list["scholar"]); ?></span></div></td>
       </tr>
        <tr>
       <th width="122" class="my_ziti">评优评先</th>
       <td colspan="7" bgcolor="#FFFFFF"><div><span ><?php echo ($list["honorary"]); ?></span></div></td>
        </tr>
          <tr>
       <th width="122" class="my_ziti">竞赛名称</th>
       <td colspan="3" bgcolor="#FFFFFF"><div><span ><?php echo ($list["competition"]); ?></span></div></td>
       <th width="122" class="my_ziti">获奖等级</th>
       <td colspan="3" bgcolor="#FFFFFF"><div><span ><?php echo ($list["award_level"]); ?></span></div></td>
       </tr>
         <tr>
       <th width="122" height="60" class="my_ziti">备注</th>
       <td colspan="7" bgcolor="#FFFFFF"><div><span ><?php echo ($list["remark"]); ?></span></div></td>
        </tr>
             

      </table>
   <p align="center">
		<input type="button" name="reset" style="width:110px;height:42px;font-size:18px;background:#b5d6e6;" onclick="history.go(-1)" value="返回"/> 
</p>
    </form>
</div>
</body>
</html>