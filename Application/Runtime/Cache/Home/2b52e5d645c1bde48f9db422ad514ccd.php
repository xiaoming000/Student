<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>奖惩修改</title>
    <style type="text/css">
        table {
            border: 1px solid #fff;
            border-collapse: collapse;
        }

        th {
            background: #328aa4 repeat-x;
            color: #FFF;
            font-size: 15px
        }

        td {
            border: 1px solid #FFF;
            border-collapse: collapse;
            padding: 0;
            margin: 0;

        }

        textarea, input {
            border: 1px solid #AA9FAA;
            padding: 0;
            margin: 0;
        }

        select {
            border: none;
            padding: 0;
            margin: 0;
            width: 200px;
            height: 40px;
        }
    </style>


</head>
<body bgcolor="#E8F5FD">
<div class="main" align="center">
    <form action="/student/index.php/Home/Jiangcheng/edit/id/21" method="post">
        <p>
        <h2 align="center">&ensp;</h2>

        <h3 align="center"></h3>
        </p>
        <!--设置一个隐藏域给修改控制器传递id值-->
        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
        <table width="320" border="1" cellpadding="0" cellspacing="0">
            <tr>
                <th width="122" class="my_ziti">学号</th>
                <td width="192" align="left"><span id="old" style="text-align:left">
       <input name="number" type="text" id="number"
              style="font-size:18px;height:42px;box-sizing: border-box;width:100%;" maxlength="20"
              value="<?php echo ($info["number"]); ?>"/></span></td>
            </tr>
            <tr>
                <th class="my_ziti">学年</th>
                <td align="left">
                    <input name="school_year" type="text" id="scholl_year"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["school_year"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">学期</th>
                <td align="left">
                    <input name="semester" type="text" id="semester"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["semester"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">奖学金</th>
                <td align="left">
                    <input name="scholar" type="text" id="scholar"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["scholar"]); ?>"/></td>
            </tr>
            <!--<tr>
                <th class="my_ziti">英语等级</th>
                <td align="left">
                    <input name="level_name" type="text" id="level_name"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["level_name"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">英语成绩</th>
                <td align="left">
                    <input name="e_score" type="text" id="e_score"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["e_score"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">计算机成绩</th>
                <td align="left">
                    <input name="score" type="text" id="score"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["score"]); ?>"/></td>
            </tr>-->
            <tr>
                <th class="my_ziti">竞赛</th>
                <td align="left">
                    <input name="competition" type="text" id="competition"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["competition"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">获奖等级</th>
                <td align="left">
                    <input name="award_level" type="text" id="award_level"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["award_level"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">评优评先</th>
                <td align="left">
                    <input name="honorary" type="text" id="honorary"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["honorary"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">处分记录</th>
                <td align="left">
                    <input name="punish" type="text" id="punish"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["punish"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">备注</th>
                <td align="left">
                    <input name="remark" type="text" id="remark"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["remark"]); ?>"/></td>
            </tr>

        </table>
        <p align="center">
            <input type="submit" name="submit" style="width:110px;height:42px;font-size:18px;" value="确认"/>&ensp;&ensp;
            <input type="reset" name="reset" style="width:110px;height:42px;font-size:18px;" value="重置"/>
        </p>
    </form>
</div>
</body>
</html>