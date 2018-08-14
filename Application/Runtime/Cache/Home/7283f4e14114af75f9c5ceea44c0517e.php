<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>文件管理</title>
  <style>
  body{background:#e9f7fc;}
  a:link,a:visited {color:#4682B4; text-decoration:none;} 
  table{border-collapse: collapse;margin:0px auto;border:1px solid #b5d6e6; }
  th,td{border:1px solid #b5d6e6;}
  .list-page{padding:20px 0;text-align:center;}
  .list-page a{margin:0 5px;padding:2px 7px;border:1px solid #ccc;background:#f3f3f3;}
  .list-page a:hover{background:#e4e4e4;border:1px solid #908f8f;}
  .list-page .current{margin:0 5px;padding:2px 7px;background:#f60;border:1px solid #fe8101;color:#fff;}
  </style>
  <script>
	window.onload=function(){
		var oTable=document.getElementById("table1");
		for(var i=0;i<oTable.tBodies[0].rows.length;i++)
		{
			var oldColor="";
			 oTable.tBodies[0].rows[i].onmouseover=function()
			{
				oldColor=this.style.background;
				this.style.background="#dbe1e0";
			};
			oTable.tBodies[0].rows[i].onmouseout=function()
			{
				this.style.background=oldColor;
			};	
		}
	}
  </script>
 </head>
 <body>
	<div background="<?php echo IMG_URL ?>table/bg.gif" align="center"><h1>文件列表</h1><hr/></div>
	<table width="80%"  cellspacing="0" cellpadding="6" id="table1" bgcolor="#FFFFFF">
	 <?php if(is_array($result)): $k = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr align="center">
			<td align="left" title="<?php echo ($vo["title"]); ?>">&nbsp;&nbsp;&nbsp;<?php echo ($vo["name"]); ?></td><td>
			<a href="/Student/index.php/Home/File/download/id/<?php echo ($vo["id"]); ?>" title="下载"><img src="<?php echo IMG_URL ?>table/download.png"/>&nbsp;下载</a>|<a onclick="if(confirm('确定删除吗？'))return true;return false;" href="/Student/index.php/Home/File/delete/id/<?php echo ($vo["id"]); ?>" title="删除"><img src="<?php echo IMG_URL ?>table/del.gif"/>&nbsp;删除</a></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
 <br/>
 <div align="center" class="list-page"><?php echo ($list); ?></div>
 </body>
</html>