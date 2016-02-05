<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城后台管理</title>
<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/admin/style/edit.css" />
</head>
<body>

<h2><a href="?a=edit&m=add&dir={$smarty.get.dir}&file={$smarty.get.file}">添加文件</a>系统 -- 文件列表</h2>

<div id="list">
	<table>
		<tr><th>文件名称</th><th>操作</th></tr>
		{foreach from=$File key=key item=value}
		{if $value != '.' && $value != '..'}
		<tr><td>{$value}</td><td><a href="?a=edit&m=update&dir={$smarty.get.dir}&file={$smarty.get.file}&name={$value}">编辑</a> <a href="?a=edit&m=delete&dir={$smarty.get.dir}&file={$smarty.get.file}&name={$value}">删除</a></td></tr>
		{/if}
		{/foreach}
		<tr><td colspan="2"><a href="?a=edit&m=dir&dir={$smarty.get.dir}">[返回风格]</a></td></tr>
	</table>
</div>

<p style="margin:10px;color:red;">注意：风格名称创建后可以再次编辑修改，而风格目录创建后不允许修改</p>

</body>
</html>