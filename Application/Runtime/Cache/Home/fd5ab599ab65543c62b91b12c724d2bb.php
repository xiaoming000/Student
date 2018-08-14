<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>测评修改</title>
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
    <form action="/Student/index.php/Home/Evaluation/edit/id/1" method="post">
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
                <th class="my_ziti">学习成绩总分</th>
                <td align="left">
                    <input name="sum_score" type="text" id="sum_score"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["sum_score"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">均分</th>
                <td align="left">
                    <input name="avrscore" type="text" id="avrscore"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["avrscore"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">成绩测评分</th>
                <td align="left">
                    <input name="test" type="text" id="test"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["test"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">体育分</th>
                <td align="left">
                    <input name="pe" type="text" id="pe"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["pe"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">体育测评分</th>
                <td align="left">
                    <input name="pe_test" type="text" id="pe_test"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["pe_test"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">操行分</th>
                <td align="left">
                    <input name="morality" type="text" id="morality"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["morality"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">操行测评分</th>
                <td align="left">
                    <input name="mora_test" type="text" id="mora_test"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["mora_test"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">技能分</th>
                <td align="left">
                    <input name="skill" type="text" id="skill"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["skill"]); ?>"/></td>
            </tr>
            <tr>
                <th class="my_ziti">综合测评分</th>
                <td align="left">
                    <input name="com_test" type="text" id="com_test"
                           style="font-size:20px;box-sizing: border-box;height:42px;width:100%;" maxlength="20"
                           value="<?php echo ($info["com_test"]); ?>"/></td>
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