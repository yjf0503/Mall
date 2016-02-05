<?php /* Smarty version 2.6.26, created on 2016-02-05 19:28:16
         compiled from admin/edit/add.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城后台管理</title>
<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/admin/style/edit.css" />
</head>
<body>

<h2><a href="?a=edit&m=file&dir=<?php echo $_GET['dir']; ?>
&file=<?php echo $_GET['file']; ?>
">返回文件列表</a>系统 -- 添加文件</h2>

<form method="post" name="add" action="?a=edit&m=add&dir=<?php echo $_GET['dir']; ?>
&file=<?php echo $_GET['file']; ?>
">
	<dl class="form">
		<dd>文件名称：<input type="text" name="name" class="text" /> </dd>
		<dd><span class="middle">代码编辑：</span><textarea name="info" style="width:90%;height:500px;"></textarea></dd>
		<dd><input type="submit" name="send"  value="新增文件" class="submit" /></dd>
	</dl>
</form>


</body>
</html>