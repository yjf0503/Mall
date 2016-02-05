<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城后台管理</title>
<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/admin/style/edit.css" />
</head>
<body>

<h2><a href="###">添加目录</a>系统 -- 目录列表</h2>

<div id="list">
	<table>
		<tr><th>目录名称</th><th>操作</th></tr>
		{foreach from=$DirArr key=key item=value}
		<tr><td>{$value}</td><td><a href="?a=edit&m=file&dir={$smarty.get.dir}&file={$value}">进入目录</a></td></tr>
		{/foreach}
		<tr><td colspan="2"><a href="?a=edit">[返回风格]</a></td></tr>
	</table>
</div>

<p style="margin:10px;color:red;">注意：风格名称创建后可以再次编辑修改，而风格目录创建后不允许修改</p>

</body>
</html>