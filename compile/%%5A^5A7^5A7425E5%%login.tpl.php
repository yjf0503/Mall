<?php /* Smarty version 2.6.26, created on 2016-01-25 19:06:32
         compiled from default/public/login.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城系统</title>
<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/default/style/reg.css" />
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="sait">
	当前位置：<a href="./">首页</a> &gt; 会员登录
</div>


<div id="reg">
	<form action="" method="post">
		<dl>
			<dd>用 户 名：<input type="text" name="user" class="text" /></dd>
			<dd>密　　码：<input type="password" name="pass" class="text" /></dd>
			<dd>　　　　　<input type="checkbox" name="keep" /> 请保留这次登录信息</dd>
			<dd><input type="submit" name="send" value="登录" class="submit" /></dd>
		</dl>
	</form>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>