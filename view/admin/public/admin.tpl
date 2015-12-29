<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城后台管理</title>
<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/admin/style/admin.css" />
<script type="text/javascript" src="view/admin/js/iframe.js"></script>
<script type="text/javascript" src="view/admin/js/channel.js"></script>
</head>
<body>

<div id="header">
	<p>您好，admin [超级管理员] [去首页] [退出]</p>
	<ul>
		<li class="first"><a href="?a=admin&m=main" target="in">起始页</a></li>
		<li><a href="javascript:channel(0)">商品</a></li>
		<li><a href="javascript:channel(1)">订单</a></li>
		<li><a href="javascript:channel(2)">会员</a></li>
		<li><a href="javascript:channel(3)">系统</a></li>
	</ul>
</div>

<div id="sidebar">
	<dl style="display:block">
		<dt>商品</dt>
		<dd><a href="###">商品1</a></dd>
		<dd><a href="###">商品2</a></dd>
		<dd><a href="###">商品3</a></dd>
	</dl>
	<dl style="display:none">
		<dt>订单</dt>
		<dd><a href="###">订单1</a></dd>
		<dd><a href="###">订单2</a></dd>
		<dd><a href="###">订单3</a></dd>
	</dl>
	<dl style="display:none">
		<dt>会员</dt>
		<dd><a href="###">会员1</a></dd>
		<dd><a href="###">会员2</a></dd>
		<dd><a href="###">会员3</a></dd>
	</dl>
	<dl style="display:none">
		<dt>系统</dt>
		<dd><a href="?a=manage" target="in">管理员列表</a></dd>
		<dd><a href="###">等级列表（自行完成）</a></dd>
		<dd><a href="###">权限管理（自行完成）</a></dd>
	</dl>
</div>

<div id="main">
	<iframe src="?a=admin&m=main" frameborder="0" name="in"></iframe>
</div>

</body>
</html>