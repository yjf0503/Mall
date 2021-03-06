<?php /* Smarty version 2.6.26, created on 2016-02-05 12:07:32
         compiled from admin/public/main.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城后台管理</title>
<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/admin/style/main.css" />
</head>
<body>

<h2>起始页 -- 后台管理中心</h2>

<div id="list">
	<table>
		<tr><th colspan="4">订单统计信息</th></tr>
		<tr><td>待发货订单：</td><td><?php echo $this->_tpl_vars['UndeliveredGoodsCount']; ?>
</td><td>未确认订单：</td><td><?php echo $this->_tpl_vars['UnconfirmedGoodsCount']; ?>
</td></tr>
		<tr><td>未支付订单：</td><td><?php echo $this->_tpl_vars['UnpayedGoodsCount']; ?>
</td><td>申请退款订单：</td><td><?php echo $this->_tpl_vars['RefundGoodsCount']; ?>
</td></tr>
	</table>
	
	<table>
		<tr><th colspan="4">商品统计信息</th></tr>
		<tr><td>商品总数量：</td><td><?php echo $this->_tpl_vars['AllGoodsCount']; ?>
</td><td>库存警告量：</td><td><?php echo $this->_tpl_vars['InventoryGoodsCount']; ?>
</td></tr>
		<tr><td>下架商品量：</td><td><?php echo $this->_tpl_vars['DownGoodsCount']; ?>
</td><td>促销商品量：</td><td>0</td></tr>
	</table>
	
	<table>
		<tr><th colspan="4">系统信息</th></tr>
		<tr><td>服务器操作系统：</td><td><?php echo PHP_OS ?></td><td>服务器软件：</td><td><?php echo $_SERVER["SERVER_SOFTWARE"] ?></td></tr>
	</table>
</div>

</body>
</html>