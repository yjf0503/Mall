<?php /* Smarty version 2.6.26, created on 2016-01-09 14:23:08
         compiled from admin/goods/add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'admin/goods/add.tpl', 19, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城后台管理</title>
<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/admin/style/goods.css" />
</head>
<body>

<h2><a href="?a=goods">返回商品列表</a>商品 -- 添加商品</h2>

<form method="post" name="add" action="?a=nav&m=add">
	<dl class="form">
		<dd>商品类型：<select name="nav">
								<option value="0" selected="selected">--请选择一个商品的类型--</option>	
								<?php $_from = $this->_tpl_vars['addNav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
								<optgroup label="<?php echo $this->_tpl_vars['value']->name; ?>
">
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['value']->child), $this);?>

								</optgroup>
								<?php endforeach; endif; unset($_from); ?>
								</select> <span class="red">[必填]</span>
		</dd> 
		<dd>商品品牌：<select name="brand">
								<option value="0" selected="selected">--请选择一个商品的品牌--</option>	
								</select> <span class="red">[必填]</span>
		</dd>
	</dl>
</form>


</body>
</html>