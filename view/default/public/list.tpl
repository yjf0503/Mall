<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城系统</title>
	<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/default/style/list.css" />
</head>
<body>
{include file='default/public/header.tpl'}
<div id="sait">
	当前位置：<a href="./">首页</a>
	{foreach from=$FrontNav[0]->sait key=key item=value}
		&gt; <a href="?a=list&navid={$key}">{$value}</a>
	{/foreach}
</div>

<div id="sidebar">
	<h2>{$FrontNav[0]->name}</h2>
	<ul style="margin:0 0 10px 0">
		{foreach from=$FrontNav[0]->child key=key item=value}
			<li><a href="?a=list&navid={$value->id}">{$value->name}<span class="gray">({$value->count})</span></a></li>
		{/foreach}
	</ul>
	<h2>当月热销</h2>
	<div style="margin:0 0 10px 0">
		<dl style="border:none;">
			<dt><a href="###"><img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" /></a></dt>
			<dd class="price">￥158.00</dd>
			<dd class="title"><a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a></dd>
		</dl>
		<dl>
			<dt><a href="###"><img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" /></a></dt>
			<dd class="price">￥158.00</dd>
			<dd class="title"><a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a></dd>
		</dl>
		<dl>
			<dt><a href="###"><img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" /></a></dt>
			<dd class="price">￥158.00</dd>
			<dd class="title"><a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a></dd>
		</dl>
		<p><a href="###">查看更多</a></p>
	</div>
	<h2>浏览记录</h2>
	<div style="margin:0 0 10px 0">
		{foreach from=$FrontRecord key=key item=value}
			{if $key < 2}
				<dl style="border:none;">
					<dt><a href="?a=details&navid={$value.nav}&goodsid={$value.id}" target="_blank"><img src="{$value.thumbnail2}" style="width:100px;height:100px;" alt="连衣裙" title="连衣裙" /></a></dt>
					<dd class="price">￥{$value.price}</dd>
					<dd class="title"><a href="?a=details&navid={$value.nav}&goodsid={$value.id}" target="_blank">{$value.name}</a></dd>
				</dl>
			{/if}
		{/foreach}
		<p><a href="?a=list&m=delRecord">清空记录</a></p>
	</div>
</div>

<div id="main">
	<h2>商品筛选</h2>
	<div class="filter">
		<!--品牌筛选-->
		<p>品牌：{if $smarty.get.brand}<a href="{$url}&brand=">全部</a>{else}<span>全部</span>{/if}
			{foreach from=$FrontBrand key=key item=value}
				{if $smarty.get.brand == $key}
					<span>{$value}</span>
				{else}
					<a href="{$url}&brand={$key}">{$value}</a>
				{/if}
			{/foreach}
		</p>
		<!--属性筛选-->
		{foreach from=$FrontAttr key=key item=value}
			<p>
				{$key}：{if $smarty.get.attr}<a href="{$url}&attr=">全部</a>{else}<span>全部</span>{/if}
				{foreach from=$value key=k item=v}
					{assign var=attr value=$key:$v}
					{if $smarty.get.attr == $attr}
						<span>{$v}</span>
					{else}
						<a href="{$url}&attr={$key}:{$v}">{$v}</a>
					{/if}
				{/foreach}
			</p>
		{/foreach}
		<!--价格区间-->
		{if $FrontPrice[0]->price}
		<p>价格：{if $smarty.get.price}<a href="{$url}&price=">全部</a>{else}<span>全部</span>{/if}
			{/if}
			{foreach from=$FrontPrice[0]->price key=key item=value}
				{if $smarty.get.price == $key}
					<span>{$value}</span>
				{else}
					<a href="{$url}&price={$key}">{$value}</a>
				{/if}
			{/foreach}



		</p>
	</div>
	<h2>商品列表</h2>
	<div class="pro">
		{foreach from=$ListGoods key=key item=value}
			<dl>
				<dt><a href="?a=details&navid={$value->nav}&goodsid={$value->id}" target="_blank"><img src="{$value->thumbnail2}" alt="连衣裙" title="连衣裙" /></a></dt>
				<dd class="price"><strong>￥{$value->price_sale}</strong> <del>￥{$value->price_market}</del></dd>
				<dd class="title"><a href="?a=details&navid={$value->nav}&goodsid={$value->id}" target="_blank">{$value->name}</a></dd>
				<dd class="commend"><a href="###">已有34人评价</a></dd>
				<dd class="buy"><a href="?a=details&navid={$value->nav}&goodsid={$value->id}" target="_blank">购买</a> | <a href="###">收藏</a> | <a href="###">比较</a></dd>
			</dl>
		{/foreach}
		<div id="page">{$page}</div>
	</div>
</div>

{include file='default/public/footer.tpl'}
</body>
</html>