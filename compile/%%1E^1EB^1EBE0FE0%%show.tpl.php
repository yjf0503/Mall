<?php /* Smarty version 2.6.26, created on 2015-12-30 12:46:34
         compiled from admin/nav/show.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城后台管理</title>
<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/admin/style/nav.css" />
</head>
<body>

<h2><a href="?a=nav&m=add">添加导航</a>系统 -- 导航条列表</h2>

<div id="list">
	<table>
		<tr><th>名称</th><th>简介</th><th>子类</th><th>排序</th><th>操作</th></tr>
	</table>
</div>

<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>

</body>
</html>