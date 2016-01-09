<?php /* Smarty version 2.6.26, created on 2016-01-09 11:52:13
         compiled from default/public/list.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城系统</title>
<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/default/style/list.css" />
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="sait">
	当前位置：<a href="./">首页</a>
	<?php $_from = $this->_tpl_vars['FrontNav'][0]->site; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
		&gt;<a href="?a=list&id=<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</a>
	<?php endforeach; endif; unset($_from); ?>
</div>

<div id="sidebar">
	<h2><?php echo $this->_tpl_vars['FrontNav'][0]->name; ?>
</h2>
	<ul style="margin: 0 0 10px  0">
		<?php $_from = $this->_tpl_vars['FrontNav'][0]->child; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<li><a href="?a=list&id=<?php echo $this->_tpl_vars['value']->id; ?>
"><?php echo $this->_tpl_vars['value']->name; ?>
<span class="gray">(1000)</span></a></li>
		<?php endforeach; endif; unset($_from); ?>
	</ul>
	<h2>当月热销</h2>
	<div style="margin: 0 0 10px  0">
		<dl>
			<dt><img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙"> </dt>
			<dd class="price">2</dd>
			<dd class="title">3</dd>
		</dl>
		<p><a href="">查看更多</a></p>
	</div>
	<h2>浏览记录</h2>
	<div style="margin: 0 0 10px  0">
		<dl>
			<dt><img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙"> </dt>
			<dd class="price">2</dd>
			<dd class="title">3</dd>
		</dl>
		<p><a href="">查看更多</a> <a href="">清空</a></p>
	</div>
</div>


<div id="main">
	<h2>商品筛选</h2>
	<div class="filter">
		<p>品牌：<span>全部</span> <a href="###">苹果</a> <a href="###">三星</a> <a href="###">索尼</a> <a href="###">小米</a> <a href="###">华为</a></p>
		<p>属性：<span>全部</span></p>
		<p>价格：<span>全部</span></p>

	</div>
	<h2>商品列表</h2>
	<div class="pro">
		<dl>
			<dt><a href="?a=details"><img src="view/default/images/pro_list_demo.jpg" alt="连衣裙"></a></dt>
			<dd class="price"><strong>$158.00</strong><del>$258.00</del></dd>
			<dd class="title"><a href="">连衣裙</a></dd>
			<dd class="comment"><a href="">已有34人评价</a></dd>
			<dd class="buy">购买 | 收藏 | 比较</dd>
		</dl>

	</div>
</div>
</body>
</html>