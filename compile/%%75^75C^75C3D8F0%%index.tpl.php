<?php /* Smarty version 2.6.26, created on 2016-01-07 14:38:39
         compiled from default/public/index.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>在线商城系统</title>
    <link rel="stylesheet" type="text/css" href="view/default/style/index.css" />
</head>
<body>

<div id="header">
   header
</div>

<div id="nav">
    <ul>
        <li><a href="./">首页</a></li>
        <?php $_from = $this->_tpl_vars['FrontTenNav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
            <li><a href="?a=list&id=<?php echo $this->_tpl_vars['value']->id; ?>
"><?php echo $this->_tpl_vars['value']->name; ?>
</a></li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
</div>

<div id="search">

</div>

</body>
</html>