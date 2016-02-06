<?php /* Smarty version 2.6.26, created on 2016-02-06 09:48:59
         compiled from admin/pic/show.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城后台管理</title>
<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/admin/style/pic.css" />
</head>
<body>

<h2>系统 -- 图片目录列表</h2>

<div id="list">
	<table>
		<tr><th>时间目录</th><th>图片张数</th><th>操作</th></tr>
		<?php $_from = $this->_tpl_vars['DirArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
		<tr><td><?php echo $this->_tpl_vars['value']; ?>
</td><td><?php echo $this->_tpl_vars['key']; ?>
</td><td><a href="?a=pic&m=file&file=<?php echo $this->_tpl_vars['value']; ?>
">进入目录</a></td></tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
</div>


</body>
</html>