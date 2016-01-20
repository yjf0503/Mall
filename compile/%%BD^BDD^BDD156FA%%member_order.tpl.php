<?php /* Smarty version 2.6.26, created on 2016-01-20 18:46:01
         compiled from default/public/member_order.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城系统</title>
<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/default/style/member.css" />
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="sait">
	当前位置：<a href="./">首页</a> &gt; 个人中心
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/member_sidebar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="main">
	<h2>订单列表</h2>
	<table id="cart" cellspacing="1">
		<tr><th>订单号</th><th>下单时间</th><th>总金额</th><th>订单状态</th><th>操作</th></tr>
		<?php $_from = $this->_tpl_vars['AllOrder']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
		<tr><td><a href="?a=member&m=order_details&id=<?php echo $this->_tpl_vars['value']->id; ?>
"><?php echo $this->_tpl_vars['value']->ordernum; ?>
</a></td><td><?php echo $this->_tpl_vars['value']->date; ?>
</td><td><?php echo $this->_tpl_vars['value']->price; ?>
/元</td><td><?php echo $this->_tpl_vars['value']->order_state; ?>
，<?php echo $this->_tpl_vars['value']->order_pay; ?>
，<?php echo $this->_tpl_vars['value']->order_delivery; ?>
</td><td>取消</td></tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
	<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
</div>

</body>
</html>