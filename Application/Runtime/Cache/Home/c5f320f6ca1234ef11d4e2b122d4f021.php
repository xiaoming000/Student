<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>测评删除</title>
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
        }
    </style>


</head>
<body bgcolor="#E8F5FD">
<div class="main" align="center">
    <form action="/student/index.php/Home/Evaluation/delete/id/21" method="post">
        <p>
        <h2 align="center">&ensp;</h2>

        <h3 align="center"></h3>
        </p>
        <!--设置一个隐藏域给修改控制器传递id值-->
        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
        <p>
            <input type="submit" name="submit" style="width:110px;height:42px;font-size:18px;" value="确认"/>&ensp;&ensp;
            <input type="button" name="reset" style="width:110px;height:42px;font-size:18px;" onclick="history.go(-1)"
                   value="返回"/>
        </p>
    </form>
</div>
</body>
</html>