<?php /* Smarty version 2.6.26, created on 2016-01-21 11:29:18
         compiled from default/public/member_order_details.tpl */ ?>
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
	<h2>订单详情</h2>
	<table id="cart" cellspacing="1">
		<caption>订单状态</caption>
		<tr><th>订单号</th><th>订单状态</th><th>支付状态</th><th>配送状态</th></tr>
		<tr><td><?php echo $this->_tpl_vars['OneOrder'][0]->ordernum; ?>
</td><td>未确定</td><td>未支付</td><td>未配送</td></tr>
	</table>
	
	<table id="cart" cellspacing="1">
	<caption>商品列表</caption>
	<tr><th>编号</th><th>名称</th><th>属性</th><th class="th">售价</th><th class="th">数量</th><th class="th">小计</th></tr>
	<?php $this->assign('total', 0); ?>
	<?php $_from = $this->_tpl_vars['OneOrder'][0]->goods; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
	<tr><td><?php echo $this->_tpl_vars['value']['sn']; ?>
</td><td><?php echo $this->_tpl_vars['value']['name']; ?>
</td><td>
	<?php $_from = $this->_tpl_vars['value']['attr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k1'] => $this->_tpl_vars['v1']):
?>
	<?php echo $this->_tpl_vars['k1']; ?>
:
	<?php $_from = $this->_tpl_vars['v1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v2']):
?>
	<?php echo $this->_tpl_vars['v2']; ?>

	<?php endforeach; endif; unset($_from); ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['value']['price_sale']*$this->_tpl_vars['value']['num']); ?>
	</td><td class="price"><?php echo $this->_tpl_vars['value']['price_sale']; ?>
/元</td><td><?php echo $this->_tpl_vars['value']['num']; ?>
</td><td class="price"><?php echo $this->_tpl_vars['value']['price_sale']*$this->_tpl_vars['value']['num']; ?>
/元</td></tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
	
	<table id="cart" cellspacing="1">
		<caption>配送信息</caption>
		<tr><th>配送状态</th><th>物流方式</th><th>运单号</th></tr>
		<tr><td>未配送</td><td><?php echo $this->_tpl_vars['OneOrder'][0]->delivery; ?>
</td><td>未支付</td></tr>
	</table>
	
	<table id="cart" cellspacing="1">
		<caption>支付信息</caption>
		<tr><th>支付状态</th><th>支付方式</th><th>总金额</th></tr>
		<tr><td>未付款</td><td><?php echo $this->_tpl_vars['OneOrder'][0]->pay; ?>
</td><td><?php echo $this->_tpl_vars['OneOrder'][0]->price; ?>
</td></tr>
	</table>
	
	<table id="cart" cellspacing="1">
		<caption>备注信息</caption>
		<tr><th>备注信息</th><th>缺货方式</th></tr>
		<tr><td><?php echo $this->_tpl_vars['OneOrder'][0]->text; ?>
</td><td><?php echo $this->_tpl_vars['OneOrder'][0]->ps; ?>
</td></tr>
	</table>

	<p style="text-align:center;padding: 10px;"><a href="?a=member&m=alipay&id=<?php echo $this->_tpl_vars['OneOrder'][0]->id; ?>
"><img src="view/default/images/fu.gif" style="border: none" alt="付款"></a></p>

	<p style="text-align:center"><a href="<?php echo $this->_tpl_vars['prev']; ?>
">[返回]</a></p>
</div>

</body>
</html>