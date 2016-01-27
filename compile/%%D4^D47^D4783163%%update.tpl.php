<?php /* Smarty version 2.6.26, created on 2016-01-27 18:18:29
         compiled from admin/order/update.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城后台管理</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/admin/style/order.css" />
	<script type="text/javascript" src="view/admin/js/order.js"></script>
</head>
<body>

<h2><a href="?a=order">返回订单列表</a>订单 -- 修改订单</h2>

<div id="list">
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
		<caption>备注信息</caption>
		<tr><th>备注信息</th><th>缺货方式</th></tr>
		<tr><td><?php echo $this->_tpl_vars['OneOrder'][0]->text; ?>
</td><td><?php echo $this->_tpl_vars['OneOrder'][0]->ps; ?>
</td></tr>
	</table>

</div>

<form method="post" name="update" action="?a=order&m=update&id=<?php echo $this->_tpl_vars['OneOrder'][0]->id; ?>
">
	<dl class="form">
		<?php if ($this->_tpl_vars['OneOrder'][0]->order_state == '已取消'): ?>
			<dd>订单状态：<span class="red">已取消，此订单已失效，可以删除！</span></dd>
		<?php else: ?>
			<dd>订单状态：
				<input type="radio" name="order_state" <?php if ($this->_tpl_vars['OneOrder'][0]->order_state == '未确认'): ?>checked="checked"<?php endif; ?> value="未确认" /> 未确认
				<input type="radio" name="order_state" <?php if ($this->_tpl_vars['OneOrder'][0]->order_state == '已确认'): ?>checked="checked"<?php endif; ?> value="已确认" /> 已确认
				<input type="radio" name="order_state" <?php if ($this->_tpl_vars['OneOrder'][0]->order_state == '已取消'): ?>checked="checked"<?php endif; ?> value="已取消" /> 已取消
			</dd>
			<dd>支付状态：
				<input type="radio" name="order_pay" <?php if ($this->_tpl_vars['OneOrder'][0]->order_pay == '未付款'): ?>checked="checked"<?php endif; ?> value="未付款" /> 未付款
				<input type="radio" name="order_pay" <?php if ($this->_tpl_vars['OneOrder'][0]->order_pay == '已付款'): ?>checked="checked"<?php endif; ?> value="已付款" /> 已付款
			</dd>
			<dd>配送状态：
				<input type="radio" name="order_delivery" <?php if ($this->_tpl_vars['OneOrder'][0]->order_delivery == '未发货'): ?>checked="checked"<?php endif; ?> value="未发货" /> 未发货
				<input type="radio" name="order_delivery" <?php if ($this->_tpl_vars['OneOrder'][0]->order_delivery == '已配货'): ?>checked="checked"<?php endif; ?> value="已配货" /> 已配货
				<input type="radio" name="order_delivery" <?php if ($this->_tpl_vars['OneOrder'][0]->order_delivery == '已发货'): ?>checked="checked"<?php endif; ?> value="已发货" /> 已发货
			</dd>
			<dd class="delivery">
				物流配送：<select name="delivery_name" onchange="changeDelivery();">
					<option value="0"> -- 请选择一家物流 -- </option>
					<?php $_from = $this->_tpl_vars['AllDelivery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
						<?php if ($this->_tpl_vars['OneOrder'][0]->delivery_name == $this->_tpl_vars['value']->name): ?>
							<option value="<?php echo $this->_tpl_vars['value']->name; ?>
" url="<?php echo $this->_tpl_vars['value']->url; ?>
" selected="selected"><?php echo $this->_tpl_vars['value']->name; ?>
</option>
						<?php else: ?>
							<option value="<?php echo $this->_tpl_vars['value']->name; ?>
" url="<?php echo $this->_tpl_vars['value']->url; ?>
"><?php echo $this->_tpl_vars['value']->name; ?>
</option>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</select> <input type="hidden" value="<?php echo $this->_tpl_vars['OneOrder'][0]->delivery_url; ?>
" name="delivery_url" />
			</dd>
			<dd class="delivery">
				运 单 号：<input type="text" name="delivery_number" class="text" value="<?php echo $this->_tpl_vars['OneOrder'][0]->delivery_number; ?>
" />
			</dd>
			<dd><input type="submit" name="send" class="submit" value="修改订单" /></dd>
		<?php endif; ?>
	</dl>
</form>

</body>
</html>