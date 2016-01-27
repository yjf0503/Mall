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
			<tr><td><a href="?a=member&m=order_details&id={$value->id}">{$value->ordernum}</a></td><td>{$value->date}</td><td>{$value->price}/元</td><td>
					{if $value->order_state == '已取消'}
						<span class="red">已取消</span>
					{else}
						{if $value->order_delivery == '已发货'}
							<span class="green">已发货，等待收货</span>
						{else}
							{if $value->order_delivery == '已配货'}
								<span class="green">已配货，等待发货</span>
							{else}
								{if $value->order_pay == '已付款'}
									<span class="green">已付款，等待配货</span>
								{else}
									{if $value->order_state == '已确认'}
										<span class="green">已确认，等待付款</span>
									{else}
										<span style="color:#666;">未确认</span>
									{/if}
								{/if}
							{/if}
						{/if}
					{/if}
				</td><td>
					{if $value->order_state == '已取消' || $value->order_pay == '已付款' || $value->order_delivery == '已配货' || $value->order_delivery == '已发货'}
						-----
					{else}
						<a href="?a=member&m=alipay&id={$value->id}">在线支付</a> | <a href="?a=member&m=cancel&id={$value->id}">取消订单</a>
					{/if}
				</td></tr>
		{/foreach}
	</table>
	<div id="page">{$page}</div>
</div>

{include file='default/public/footer.tpl'}
</body>
</html>