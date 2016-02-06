<?php /* Smarty version 2.6.26, created on 2016-02-06 10:08:05
         compiled from admin/pic/file.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城后台管理</title>
<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/admin/style/pic.css" />
</head>
<body>

<h2>系统 -- 图片文件列表</h2>

<div id="list">
	<table>
		<tr><th>文件名称</th><th>是否冗余</th><th>操作</th></tr>
		<?php $_from = $this->_tpl_vars['File']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
		<?php if ($this->_tpl_vars['value'] != '.' && $this->_tpl_vars['value'] != '..'): ?>
		<tr><td>
		<?php if ($this->_tpl_vars['value']->id): ?>
		<span class="green">./uploads/<?php echo $_GET['file']; ?>
/<?php echo $this->_tpl_vars['value']->pic; ?>
</span>
		<?php else: ?>
		<span class="red">./uploads/<?php echo $_GET['file']; ?>
/<?php echo $this->_tpl_vars['value']; ?>
</span>
		<?php endif; ?>
		</td><td>
		<?php if ($this->_tpl_vars['value']->id): ?>
		<a href="?a=details&navid=<?php echo $this->_tpl_vars['value']->nav; ?>
&goodsid=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><?php echo $this->_tpl_vars['value']->name; ?>
</a>
		<?php else: ?>
		是
		<?php endif; ?>
		</td><td>
		<?php if ($this->_tpl_vars['value']->id): ?>
		---
		<?php else: ?>
		<a href="javascript:alert('自行完成！')">删除</a>
		<?php endif; ?>
		</td></tr>
		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<tr><td colspan="2"><a href="?a=pic">[返回目录]</a></td></tr>
	</table>
</div>


</body>
</html>