<?php /* Smarty version 2.6.26, created on 2016-01-15 12:39:03
         compiled from admin/price/show.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>在线商城后台管理</title>
    <link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
    <link rel="stylesheet" type="text/css" href="view/admin/style/price.css" />
</head>
<body>

<h2><a href="?a=price&m=add">添加价格区间</a>商品 -- 价格区间列表</h2>

<div id="list">
    <table>
        <tr><th>左区间</th><th>右区间</th><th>操作</th></tr>
        <?php $_from = $this->_tpl_vars['AllPrice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
            <tr><td><?php echo $this->_tpl_vars['value']->price_left; ?>
</td><td><?php echo $this->_tpl_vars['value']->price_right; ?>
</td><td><a href="###" onclick="alert('自行完成修改')"><img src="view/admin/images/edit.gif" alt="编辑" title="编辑" /></a> <a href="###" onclick="alert('自行完成删除')"><img src="view/admin/images/drop.gif" alt="删除" title="删除" /></a></td></tr>
            <?php endforeach; else: ?>
            <tr><td colspan="3">没有价格区间</td></tr>
        <?php endif; unset($_from); ?>
    </table>
</div>
<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>

</body>
</html>