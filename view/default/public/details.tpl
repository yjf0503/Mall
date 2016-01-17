<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城系统</title>
<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/default/style/details.css" />
<script type="text/javascript" src="view/default/js/attr.js"></script>
<script type="text/javascript" src="view/default/js/channel.js"></script>
</head>
<body>
{include file='default/public/header.tpl'}
<div id="sait">
	当前位置：<a href="./">首页</a>
	{foreach from=$FrontNav[0]->sait key=key item=value}
	 &gt; <a href="?a=list&navid={$key}">{$value}</a>
	{/foreach}
	 &gt; {$FrontGoods[0]->name}
</div>

<div id="sidebar">
	<h2>{$FrontNav[0]->name}</h2>
	<ul style="margin:0 0 10px 0">
		{foreach from=$FrontNav[0]->child key=key item=value}
		<li><a href="?a=list&navid={$value->id}">{$value->name}<span class="gray">(1000)</span></a></li>
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
		<p><a href="###">查看更多</a> <a href="###">清空</a></p>
	</div>
</div>

<div id="main">
	<input type="hidden" id="attrid" name="attrid" value="{$FrontGoods[0]->attr}" />
	<input type="hidden" id="attrtype" name="attrtype" value="{$attrType}" />
	<h2>{$FrontGoods[0]->name}</h2>
	<dl class="pic">
		<dt><a href="###"><img src="{$FrontGoods[0]->thumbnail}" alt="{$FrontGoods[0]->name}" title="{$FrontGoods[0]->name}" /></a></dt>
		<dd>分享至：新浪微博 | 腾讯微博 | 人人网 | 开心网</dd>
	</dl>
	<dl id="text" class="text">
		<dd>售　　价：<span class="sale">￥{$FrontGoods[0]->price_sale}</span><span class="market">￥{$FrontGoods[0]->price_market}</span></dd>
		<dd>商品编号：{$FrontGoods[0]->sn}</dd>
		<dd>所属品牌：{$FrontGoods[0]->brandname}</dd>
		<dd>销 售 量：<span class="sale_num">136</span> {$FrontGoods[0]->unit}</dd>
		<dd>重　　量：{$FrontGoods[0]->weight} kg {if $FrontGoods[0]->is_freight == 1}<span class="gray">(免运费)</span>{/if}</dd>
		<dd>数　　量：<input type="text" value="1" class="num" name="num" /> {$FrontGoods[0]->unit} <span class="gray">(目前库存：{$FrontGoods[0]->inventory}{$FrontGoods[0]->unit})</span></dd>
		<dd class="buy_button"><img src="view/default/images/buy.gif" alt="购买" title="购买" /> <img src="view/default/images/collect.gif" alt="收藏" title="收藏" /></dd>
	</dl>
	<div class="content">
		<ul>
			<li id="button1" onclick="channel(1)" class="first">商品详情</li>
			<li id="button2" onclick="channel(2)">评价列表</li>
			<li id="button3" onclick="channel(3)">成交记录</li>
			<li id="button4" onclick="channel(4)">售后服务</li>
		</ul>
		<div class="c1" id="c1" style="display:block;">
			{$FrontGoods[0]->content}
		</div>
		<div class="c2" id="c2" style="display:none;">
			评价列表
		</div>
		<div class="c3" id="c3" style="display:none;">
			成交记录
		</div>
		<div class="c4" id="c4" style="display:none;">
			售后服务
		</div>
	</div>
</div>
</body>
</html>