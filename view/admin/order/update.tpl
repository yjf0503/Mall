<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城后台管理</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/admin/style/order.css" />
</head>
<body>

<h2><a href="?a=order">返回订单列表</a>订单 -- 修改订单</h2>

<div id="list">
	<table id="cart" cellspacing="1">
		<caption>商品列表</caption>
		<tr><th>编号</th><th>名称</th><th>属性</th><th class="th">售价</th><th class="th">数量</th><th class="th">小计</th></tr>
		{assign var=total value=0}
		{foreach from=$OneOrder[0]->goods key=key item=value}
			<tr><td>{$value.sn}</td><td>{$value.name}</td><td>
					{foreach from=$value.attr key=k1 item=v1}
						{$k1}:
						{foreach from=$v1 item=v2}
							{$v2}
						{/foreach}
					{/foreach}
					{assign var=total value=$total+$value.price_sale*$value.num}
				</td><td class="price">{$value.price_sale}/元</td><td>{$value.num}</td><td class="price">{$value.price_sale*$value.num}/元</td></tr>
		{/foreach}
	</table>

	<table id="cart" cellspacing="1">
		<caption>备注信息</caption>
		<tr><th>备注信息</th><th>缺货方式</th></tr>
		<tr><td>{$OneOrder[0]->text}</td><td>{$OneOrder[0]->ps}</td></tr>
	</table>

</div>

<form method="post" name="update" action="?a=order&m=update&id={$OneOrder[0]->id}">
	<dl class="form">
		{if $OneOrder[0]->order_state == '已取消'}
			<dd>订单状态：<span class="red">已取消，此订单已失效，可以删除！</span></dd>
		{else}
			<dd>订单状态：
				<input type="radio" name="order_state" {if $OneOrder[0]->order_state == '未确认'}checked="checked"{/if} value="未确认" /> 未确认
				<input type="radio" name="order_state" {if $OneOrder[0]->order_state == '已确认'}checked="checked"{/if} value="已确认" /> 已确认
				<input type="radio" name="order_state" {if $OneOrder[0]->order_state == '已取消'}checked="checked"{/if} value="已取消" /> 已取消
			</dd>
			<dd>支付状态：
				<input type="radio" name="order_pay" {if $OneOrder[0]->order_pay == '未付款'}checked="checked"{/if} value="未付款" /> 未付款
				<input type="radio" name="order_pay" {if $OneOrder[0]->order_pay == '已付款'}checked="checked"{/if} value="已付款" /> 已付款
			</dd>
			<dd>配送状态：
				<input type="radio" name="order_delivery" {if $OneOrder[0]->order_delivery == '未发货'}checked="checked"{/if} value="未发货" /> 未发货
				<input type="radio" name="order_delivery" {if $OneOrder[0]->order_delivery == '已配货'}checked="checked"{/if} value="已配货" /> 已配货
				<input type="radio" name="order_delivery" {if $OneOrder[0]->order_delivery == '已发货'}checked="checked"{/if} value="已发货" /> 已发货
			</dd>
			<dd><input type="submit" name="send" class="submit" value="修改订单" /></dd>
		{/if}
	</dl>
</form>

</body>
</html>