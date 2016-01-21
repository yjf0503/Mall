<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城系统</title>
	<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/default/style/member.css" />
</head>
<body>
{include file='default/public/header.tpl'}
<div id="sait">
	当前位置：<a href="./">首页</a> &gt; 个人中心
</div>

{include file='default/public/member_sidebar.tpl'}

<div id="main">
	<h2>订单列表</h2>
	<table id="cart" cellspacing="1">
		<tr><th>订单号</th><th>下单时间</th><th>总金额</th><th>订单状态</th><th>操作</th></tr>
		{foreach from=$AllOrder key=key item=value}
			<tr><td><a href="?a=member&m=order_details&id={$value->id}">{$value->ordernum}</a></td><td>{$value->date}</td><td>{$value->price}/元</td><td>{$value->order_state}，
					{if $value->order_pay == '未付款'}
						<span style="color:red;">{$value->order_pay}</span>
					{else}
						<span style="color:green;">{$value->order_pay}</span>
					{/if}
					，
					{$value->order_delivery}</td><td>
					{if $value->order_pay == '未付款'}
						<a href="?a=member&m=alipay&id={$value->id}">在线支付</a> |
					{/if}
					取消</td></tr>
		{/foreach}
	</table>
	<div id="page">{$page}</div>
</div>

</body>
</html>