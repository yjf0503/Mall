<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城后台管理</title>
<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/admin/style/delivery.css" />
<script type="text/javascript" src="view/admin/js/delivery.js"></script>
</head>
<body>

<h2><a href="?a=delivery">返回快递列表</a>订单 -- 修改快递</h2>

<form method="post" name="update" action="?a=delivery&m=update&id={$OneDelivery[0]->id}">
	<dl class="form">
		<dd>快递名称：{$OneDelivery[0]->name}</dd>
		<dd>官方网站：<input type="text" name="url" value="{$OneDelivery[0]->url}" class="text" /> ( * 200内之内)</dd>
		<dd><span class="middle">快递简介：</span><textarea name="info">{$OneDelivery[0]->info}</textarea> <span class="middle">( * 200位以内 )</span></dd>
		<dd><input type="submit" name="send" onclick="return updateDelivery();" value="修改快递" class="submit" /></dd>
	</dl>
</form>

</body>
</html>