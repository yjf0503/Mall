<?php /* Smarty version 2.6.26, created on 2016-01-09 11:54:13
         compiled from default/public/details.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城系统</title>
<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/default/style/details.css" />
<script type="text/javascript" src="view/default/js/channel.js"></script>
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="sait">
	当前位置：<a href="./">首页</a>
	<?php $_from = $this->_tpl_vars['FrontNav'][0]->sait; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
	 &gt; <a href="?a=list&id=<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</a>
	<?php endforeach; endif; unset($_from); ?>
</div>

<div id="sidebar">
	<h2><?php echo $this->_tpl_vars['FrontNav'][0]->name; ?>
</h2>
	<ul style="margin:0 0 10px 0">
		<?php $_from = $this->_tpl_vars['FrontNav'][0]->child; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
		<li><a href="?a=list&id=<?php echo $this->_tpl_vars['value']->id; ?>
"><?php echo $this->_tpl_vars['value']->name; ?>
<span class="gray">(1000)</span></a></li>
		<?php endforeach; endif; unset($_from); ?>
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
	<h2>春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</h2>
	<dl class="pic">
		<dt><a href="###"><img src="view/default/images/pro_details.jpg" alt="连衣裙" title="连衣裙" /></a></dt>
		<dd>分享至：新浪微博 | 腾讯微博 | 人人网 | 开心网</dd>
	</dl>
	<dl class="text">
		<dd>售　　价：￥158.00</dd>
		<dd>售　　价：￥158.00</dd>
		<dd>售　　价：￥158.00</dd>
		<dd>售　　价：￥158.00</dd>
		<dd>售　　价：￥158.00</dd>
		<dd>售　　价：￥158.00</dd>
		<dd>售　　价：￥158.00</dd>
		<dd>售　　价：￥158.00</dd>
		<dd>售　　价：￥158.00</dd>
		<dd>售　　价：￥158.00</dd>
		<dd><img src="view/default/images/buy.gif" alt="购买" title="购买" /> <img src="view/default/images/collect.gif" alt="收藏" title="收藏" /></dd>
	</dl>
	<div class="content">
		<ul>
			<li id="button1" onclick="channel(1)" class="first">商品详情</li>
			<li id="button2" onclick="channel(2)">评价列表</li>
			<li id="button3" onclick="channel(3)">成交记录</li>
			<li id="button4" onclick="channel(4)">售后服务</li>
		</ul>
		<div class="c1" id="c1" style="display:block;">
			商品详情
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